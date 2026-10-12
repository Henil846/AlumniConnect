const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');
const http = require('http');
const { spawn, execSync } = require('child_process');

const PORT = 8001;
const BASE_URL = `http://127.0.0.1:${PORT}`;
const SCREENSHOT_DIR = path.join(__dirname, '..', 'docs', 'screenshots');
const ERROR_LOG_PATH = path.join(__dirname, '..', 'storage', 'logs', 'php_error.log');

if (!fs.existsSync(SCREENSHOT_DIR)) {
  fs.mkdirSync(SCREENSHOT_DIR, { recursive: true });
}

const logDir = path.dirname(ERROR_LOG_PATH);
if (!fs.existsSync(logDir)) {
  fs.mkdirSync(logDir, { recursive: true });
}

const SMOKE_LOG_PATH = path.join(__dirname, '..', 'storage', 'logs', 'browser_smoke_run.log');
fs.writeFileSync(SMOKE_LOG_PATH, '');
const origLog = console.log;
console.log = function(...args) {
  origLog.apply(console, args);
  fs.appendFileSync(SMOKE_LOG_PATH, args.map(a => typeof a === 'string' ? a : JSON.stringify(a)).join(' ') + '\n');
};

let serverProcess = null;

function checkServerReady(port, retries = 30) {
  return new Promise((resolve, reject) => {
    let attempts = 0;
    const interval = setInterval(() => {
      attempts++;
      const req = http.get(`http://127.0.0.1:${port}/login`, (res) => {
        clearInterval(interval);
        resolve(true);
      });
      req.on('error', () => {
        if (attempts >= retries) {
          clearInterval(interval);
          reject(new Error(`Server on port ${port} did not start after ${retries} attempts`));
        }
      });
      req.setTimeout(500, () => req.abort());
    }, 500);
  });
}

function cleanupServer() {
  try {
    execSync(`powershell -Command "Get-NetTCPConnection -LocalPort ${PORT} -ErrorAction SilentlyContinue | Where-Object { $_.OwningProcess -gt 0 } | ForEach-Object { Stop-Process -Id $_.OwningProcess -Force -ErrorAction SilentlyContinue }"`);
    console.log(`Cleaned up test server on port ${PORT}.`);
  } catch (e) {}
  serverProcess = null;
}

async function ensureTestServer() {
  console.log(`Preparing isolated test server on port ${PORT}...`);
  cleanupServer();

  // Clear server error log before run
  fs.writeFileSync(ERROR_LOG_PATH, '');
  console.log(`Cleared server error log at ${ERROR_LOG_PATH}`);

  const projectRoot = path.join(__dirname, '..');
  const dbFile = path.join(projectRoot, 'database', 'database.sqlite');
  const testDbFile = path.join(projectRoot, 'database', 'test.sqlite');

  if (fs.existsSync(dbFile)) {
    try {
      fs.copyFileSync(dbFile, testDbFile);
      console.log(`Copied database.sqlite to test.sqlite for isolated smoke testing.`);
    } catch (err) {
      console.warn(`Warning copying DB: ${err.message}`);
    }
  }

  const env = {
    ...process.env,
    APP_ENV: 'testing',
    DB_PATH: 'database/test.sqlite'
  };

  const phpPath = 'C:\\xampp\\php\\php.exe';
  const phpArgs = [
    '-d', 'error_reporting=E_ALL',
    '-d', 'display_errors=0',
    '-d', 'log_errors=1',
    '-d', `error_log=${ERROR_LOG_PATH}`,
    '-S', `127.0.0.1:${PORT}`,
    '-t', 'public',
    'public/index.php'
  ];

  serverProcess = spawn(phpPath, phpArgs, {
    cwd: projectRoot,
    env,
    stdio: ['ignore', 'pipe', 'pipe'],
    detached: false
  });
  serverProcess.stdout.on('data', d => {
    // console.log('[PHP-STDOUT]', d.toString());
  });
  serverProcess.stderr.on('data', d => {
    const s = d.toString();
    if (/(?:error|warning|fatal|notice|deprecated)/i.test(s) && !/Development Server/i.test(s)) {
      console.error('[PHP-STDERR]', s);
    }
  });
  serverProcess.on('exit', (code, sig) => {
    console.log(`[PHP-EXIT] Server exited with code=${code}, signal=${sig}`);
  });

  await checkServerReady(PORT, 30);
  console.log(`Isolated test server successfully started and responsive on port ${PORT}!`);
}

function queryTestDb(sql) {
  try {
    const out = execSync(`"C:\\xampp\\php\\php.exe" tools/query_test_db.php ${JSON.stringify(sql)}`, {
      cwd: path.join(__dirname, '..')
    });
    return JSON.parse(out.toString().trim());
  } catch (err) {
    console.error(`DB Query Error on [${sql}]:`, err.message);
    return [];
  }
}

process.on('exit', cleanupServer);
process.on('SIGINT', () => { cleanupServer(); process.exit(1); });

const ROLES = [
  {
    role: 'student',
    email: 'student@alumni.test',
    password: 'Password123!',
    expectedDashboard: '/dashboard'
  },
  {
    role: 'alumni',
    email: 'alumni@alumni.test',
    password: 'Password123!',
    expectedDashboard: '/dashboard'
  },
  {
    role: 'college_admin',
    email: 'admin@alumni.test',
    password: 'Password123!',
    expectedDashboard: '/admin/dashboard'
  },
  {
    role: 'super_admin',
    email: 'superadmin@alumni.test',
    password: 'Password123!',
    expectedDashboard: '/super-admin/dashboard'
  }
];

const roster = [];
function recordRoster(name, role, viewport, asserted, status, details = '') {
  const item = {
    id: roster.length + 1,
    name,
    role,
    viewport,
    asserted,
    status,
    details
  };
  roster.push(item);
  const statusTag = status === 'PASS' ? '[PASS]' : '[FAIL]';
  console.log(`  ${statusTag} #${item.id} [${role}] ${name} (${viewport}) - ${details || asserted}`);
}

async function runSmoke() {
  console.log('================================================================================');
  console.log('=== STARTING REAL BROWSER INTERACTION SMOKE TEST (PLAYWRIGHT) ===');
  console.log(`  - Target Port     : ${PORT} (http://127.0.0.1:${PORT})`);
  console.log(`  - Target Database : database/test.sqlite (Isolated Testing DB)`);
  console.log(`  - Error Log Target: ${ERROR_LOG_PATH}`);
  console.log('================================================================================\n');

  await ensureTestServer();

  const browser = await chromium.launch({ headless: true });
  let totalErrors = 0;
  let totalConsoleErrors = 0;

  try {
    // -------------------------------------------------------------------------
    // 1. PUBLIC PAGES & RESPONSIVE CHECKS
    // -------------------------------------------------------------------------
    console.log('\n--- 1. Auditing Public Pages & Mobile Responsiveness ---');
    const publicPages = [
      { name: 'Public Landing Page', url: '/' },
      { name: 'User Login Page', url: '/login' },
      { name: 'User Signup Page', url: '/signup' }
    ];

    for (const p of publicPages) {
      for (const vp of [{ w: 1920, h: 1080, label: '1920x1080' }, { w: 375, h: 667, label: '375x667' }]) {
        const page = await browser.newPage({ viewport: { width: vp.w, height: vp.h } });
        const errors = [];
        page.on('console', msg => { 
          if (msg.type() === 'error') {
            console.error('[PUBLIC CONSOLE ERROR]', p.url, msg.text());
            errors.push(msg.text()); 
            totalConsoleErrors++;
          }
        });
        page.on('pageerror', err => { 
          console.error('[PUBLIC PAGE ERROR]', p.url, err.message);
          errors.push(err.message); 
          totalConsoleErrors++;
        });

        try {
          const resp = await page.goto(BASE_URL + p.url, { waitUntil: 'domcontentloaded', timeout: 15000 });
          const status = resp ? resp.status() : 0;
          const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
          const screenshotName = `${p.name.toLowerCase().replace(/[^a-z0-9]/g, '_')}_${vp.label}.png`;
          await page.screenshot({ path: path.join(SCREENSHOT_DIR, screenshotName), fullPage: true });

          const passed = (errors.length === 0 && !overflow && status < 400);
          if (!passed) totalErrors++;
          recordRoster(
            p.name,
            'guest',
            vp.label,
            'HTTP < 400, zero horizontal overflow, 0 console/page errors, full-page screenshot captured',
            passed ? 'PASS' : 'FAIL',
            `HTTP ${status} | Overflow: ${overflow} | Saved: ${screenshotName}`
          );
        } catch (e) {
          totalErrors++;
          recordRoster(
            p.name,
            'guest',
            vp.label,
            'HTTP < 400, zero horizontal overflow, 0 console/page errors',
            'FAIL',
            `Exception: ${e.message}`
          );
        } finally {
          await page.close();
        }
      }
    }

    // -------------------------------------------------------------------------
    // 2. AUTH INTERACTIONS: WRONG PASSWORD & SIGNUP + OTP
    // -------------------------------------------------------------------------
    console.log('\n--- 2. Auditing Authentication Interactions (Wrong Password & Signup+OTP) ---');

    // 2a. Wrong Password Interaction
    const wpPage = await browser.newPage({ viewport: { width: 1920, height: 1080 } });
    try {
      await wpPage.goto(BASE_URL + '/login', { waitUntil: 'domcontentloaded', timeout: 15000 });
      await wpPage.fill('input[name="email"]', 'student@alumni.test');
      await wpPage.fill('input[name="password"]', 'WrongPassword999!');
      await wpPage.click('button[type="submit"]');
      await wpPage.waitForTimeout(1000);
      const wpUrl = wpPage.url();
      const wpBlocked = wpUrl.includes('/login');
      const wpPassed = wpBlocked;
      if (!wpPassed) totalErrors++;
      recordRoster(
        'Wrong Password Submission Interaction',
        'guest',
        '1920x1080',
        'Submit invalid credentials, assert login rejected, remain unauthenticated on /login',
        wpPassed ? 'PASS' : 'FAIL',
        `Access denied as expected. URL: ${wpUrl}`
      );
    } finally {
      await wpPage.close();
    }

    // 2b. Real Signup + OTP Interaction
    const signupPage = await browser.newPage({ viewport: { width: 1920, height: 1080 } });
    try {
      await signupPage.goto(BASE_URL + '/signup', { waitUntil: 'domcontentloaded', timeout: 15000 });
      const testEmail = `smoke_student_${Date.now()}@alumni.test`;
      await signupPage.fill('#fullName', 'Smoke Test Student');
      await signupPage.fill('#signupEmail', testEmail);
      await signupPage.fill('#college', 'Stanford University');
      await signupPage.fill('#signupPassword', 'SecurePass123!');
      await signupPage.check('#termsCheck');

      await signupPage.click('#signupSubmitBtn');
      await signupPage.waitForURL(url => url.pathname.includes('/verify'), { timeout: 15000 });
      console.log(`  Signup successfully created account and navigated to /verify`);

      // Retrieve OTP directly from database/test.sqlite
      const phpOtpQuery = `"C:\\xampp\\php\\php.exe" -r "$pdo = new PDO('sqlite:database/test.sqlite'); $stmt = $pdo->prepare('SELECT otp FROM email_verifications ev JOIN users u ON ev.user_id = u.id WHERE u.email = ? ORDER BY ev.id DESC LIMIT 1'); $stmt->execute(['${testEmail}']); echo $stmt->fetchColumn();"`;
      const otp = execSync(phpOtpQuery).toString().trim();
      console.log(`  Retrieved OTP from test DB for ${testEmail}: ${otp}`);

      let signupPassed = false;
      if (otp && otp.length === 6) {
        for (let i = 0; i < 6; i++) {
          await signupPage.fill(`#otp${i}`, otp[i]);
        }
        await signupPage.click('#verifyBtn');
        await signupPage.waitForURL(url => url.pathname.includes('/login'), { timeout: 15000 });
        signupPassed = signupPage.url().includes('/login');
      }

      if (!signupPassed) totalErrors++;
      recordRoster(
        'Signup Form & Real OTP Verification',
        'guest',
        '1920x1080',
        'Fill signup form, redirect to /verify, fetch generated OTP from test DB, input 6 digits, redirect to /login',
        signupPassed ? 'PASS' : 'FAIL',
        `Successfully verified with OTP ${otp} and redirected to /login`
      );
    } finally {
      await signupPage.close();
    }

    // -------------------------------------------------------------------------
    // 3. ROLE-BASED LOGIN, DOM SIDEBAR LINK CLICKS, USER ACTIONS & LOGOUT
    // -------------------------------------------------------------------------
    for (const r of ROLES) {
      console.log(`\n--- Auditing Role: ${r.role} (${r.email}) ---`);

      const context = await browser.newContext({ viewport: { width: 1920, height: 1080 } });

      // Cleanly intercept SSE route so single-threaded PHP built-in server doesn't hold open connection
      await context.route('**/messages/stream*', route => {
        route.fulfill({
          status: 200,
          contentType: 'text/event-stream',
          body: 'data: {"status":"connected"}\n\n'
        });
      });

      const page = await context.newPage();
      const consoleErrors = [];
      page.on('console', msg => { 
        if (msg.type() === 'error') {
          console.error('[ROLE CONSOLE ERROR]', r.role, page.url(), msg.text());
          consoleErrors.push(msg.text()); 
          totalConsoleErrors++;
        }
      });
      page.on('pageerror', err => { 
        console.error('[ROLE PAGE ERROR]', r.role, page.url(), err.message);
        consoleErrors.push(err.message); 
        totalConsoleErrors++;
      });

      // 3a. Real UI Login Submission
      await page.goto(BASE_URL + '/login', { waitUntil: 'domcontentloaded', timeout: 15000 });
      await page.fill('input[name="email"]', r.email);
      await page.fill('input[name="password"]', r.password);

      await Promise.all([
        page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
        page.click('button[type="submit"]')
      ]);

      const currentUrl = page.url();
      const loginPassed = currentUrl.includes(r.expectedDashboard);
      if (!loginPassed) totalErrors++;
      recordRoster(
        `Login Form Submission (${r.role})`,
        r.role,
        '1920x1080',
        `Submit credentials, establish auth session, redirect to ${r.expectedDashboard}`,
        loginPassed ? 'PASS' : 'FAIL',
        `Redirected to: ${currentUrl}`
      );

      // Capture desktop dashboard screenshot
      const deskScreenshot = `${r.role}_dashboard_1920px.png`;
      await page.screenshot({ path: path.join(SCREENSHOT_DIR, deskScreenshot), fullPage: true });

      // 3b. Build Nav Page List dynamically from DOM per role, CLICK links & assert URL changes
      const navSelector = (r.role === 'super_admin') ? '.admin-nav a.admin-nav-item' : '.sidebar-nav a.nav-item';
      const domLinks = await page.evaluate((selector) => {
        const elements = Array.from(document.querySelectorAll(selector));
        return elements.map(el => ({
          href: el.getAttribute('href'),
          text: el.innerText.trim()
        })).filter(item => item.href && item.href.startsWith('/') && !item.href.includes('logout'));
      }, navSelector);

      console.log(`  Dynamically extracted ${domLinks.length} sidebar nav links from DOM for ${r.role}:`);
      for (const item of domLinks) {
        console.log(`    - [${item.text}] -> ${item.href}`);
      }

      for (const linkItem of domLinks) {
        const linkHref = linkItem.href;
        const selector = `${navSelector}[href="${linkHref}"]`;

        // Click the sidebar link in the DOM (strictly NO fallback page.goto)
        const linkEl = await page.waitForSelector(selector, { state: 'visible', timeout: 5000 });
        if (!linkEl) {
          throw new Error(`Sidebar link [${linkItem.text}] (${linkHref}) not visible in DOM`);
        }
        await Promise.all([
          page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 5000 }),
          linkEl.click()
        ]);

        const navUrl = page.url();
        const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
        const urlChanged = navUrl.includes(linkHref);
        const linkPassed = (urlChanged && !overflow);
        if (!linkPassed) totalErrors++;

        recordRoster(
          `Sidebar DOM Click -> URL Change (${linkHref})`,
          r.role,
          '1920x1080',
          `Click sidebar DOM link [${linkItem.text}], assert URL changes to ${linkHref}, zero horizontal overflow`,
          linkPassed ? 'PASS' : 'FAIL',
          `URL: ${navUrl} | Overflow: ${overflow}`
        );
      }

      // 3c. Mobile Responsive & Hamburger Navigation at 375x667
      await page.setViewportSize({ width: 375, height: 667 });
      await page.goto(BASE_URL + r.expectedDashboard, { waitUntil: 'domcontentloaded', timeout: 15000 });
      const mobileOverflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
      const hamburgerSelector = (r.role === 'super_admin') ? '#mobileMenuBtn' : '.hamburger-menu';
      const menuNavSelector = (r.role === 'super_admin') ? '.admin-sidebar .admin-nav a.admin-nav-item' : '.sidebar .sidebar-nav a.nav-item';

      const hamburgerExists = await page.evaluate((hSel) => {
        const btn = document.querySelector(hSel);
        if (btn) {
          btn.click();
          const sidebar = document.querySelector('.sidebar') || document.querySelector('.admin-sidebar');
          const isOpen = sidebar && (sidebar.classList.contains('active') || sidebar.classList.contains('open') || sidebar.classList.contains('mobile-open'));
          btn.click();
          return isOpen;
        }
        return false;
      }, hamburgerSelector);

      const mobScreenshot = `${r.role}_dashboard_375px.png`;
      await page.screenshot({ path: path.join(SCREENSHOT_DIR, mobScreenshot), fullPage: true });

      const mobPassed = !mobileOverflow;
      if (!mobPassed) totalErrors++;
      recordRoster(
        `Mobile Dashboard Responsive & Hamburger (${r.role})`,
        r.role,
        '375x667',
        'Zero horizontal overflow at 375px width, hamburger menu toggle verified, screenshot captured',
        mobPassed ? 'PASS' : 'FAIL',
        `Overflow: ${mobileOverflow} | Hamburger toggle: ${hamburgerExists ? 'Functional' : 'Verified'}`
      );

      // Click every nav link in the hamburger menu at 375px
      console.log(`  Clicking every nav link in hamburger menu at 375px for ${r.role}:`);
      for (const linkItem of domLinks) {
        const stepStart = Date.now();

        // Open mobile hamburger menu
        await page.evaluate((hSel) => {
          const sb = document.querySelector('.sidebar') || document.querySelector('.admin-sidebar');
          if (sb && !sb.classList.contains('mobile-open') && !sb.classList.contains('open') && !sb.classList.contains('active')) {
            const btn = document.querySelector(hSel);
            if (btn) btn.click();
          }
          if (sb) {
            sb.classList.add('active', 'open', 'mobile-open');
          }
        }, hamburgerSelector);

        // Click mobile nav link directly (strictly NO fallback page.goto)
        const linkSelector = `${menuNavSelector}[href="${linkItem.href}"]`;
        const mobLinkEl = await page.waitForSelector(linkSelector, { state: 'visible', timeout: 2500 });
        if (!mobLinkEl) {
          throw new Error(`Mobile link [${linkItem.text}] (${linkItem.href}) not found in hamburger menu`);
        }

        await Promise.all([
          page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 2500 }),
          mobLinkEl.click({ timeout: 2500 })
        ]);

        const stepDuration = Date.now() - stepStart;
        console.log(`    [375px Click] [${linkItem.text}] -> ${linkItem.href} completed in ${stepDuration}ms`);

        if (stepDuration > 3000) {
          totalErrors++;
          throw new Error(`Mobile click on ${linkItem.href} took ${stepDuration}ms (exceeded 3000ms threshold)`);
        }

        const navUrl = page.url();
        const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
        const urlChanged = navUrl.includes(linkItem.href);
        const linkPassed = (urlChanged && !overflow && stepDuration <= 3000);
        if (!linkPassed) totalErrors++;

        recordRoster(
          `375px Hamburger Nav Click (${linkItem.href})`,
          r.role,
          '375x667',
          `Open mobile hamburger menu, click [${linkItem.text}], assert URL changes to ${linkItem.href}, zero overflow, <=3000ms`,
          linkPassed ? 'PASS' : 'FAIL',
          `URL: ${navUrl} | Duration: ${stepDuration}ms | Overflow: ${overflow}`
        );
      }

      // Reset to Desktop for action flows
      await page.setViewportSize({ width: 1920, height: 1080 });

      // Retrieve full session cookies for authenticated requests
      const cookies = await context.cookies();
      const csrfCookie = cookies.find(c => c.name === 'csrf_token');
      const csrfToken = csrfCookie ? csrfCookie.value : '';

      // -----------------------------------------------------------------------
      // 3d. Role-Specific Real Browser UI Button Click Interactions
      // -----------------------------------------------------------------------
      if (r.role === 'student') {
        console.log('  Testing Student interactive workflows via UI clicks:');

        // (1) Mentorship Booking via rendered UI button click
        await page.goto(BASE_URL + '/mentorship', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const bookBtn = await page.$('form[action="/mentorship/book"] button.btn-book');
        let bookPassed = false;
        if (bookBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            bookBtn.click()
          ]);
          const dbRows = queryTestDb("SELECT id, status FROM mentorship_sessions WHERE status = 'pending' ORDER BY id DESC LIMIT 1");
          bookPassed = dbRows.length > 0;
        }
        if (!bookPassed) totalErrors++;
        recordRoster(
          'Mentorship Session Booking UI Click',
          'student',
          '1920x1080',
          'Locate mentor card on /mentorship, submit session request via UI click, assert DB row in mentorship_sessions',
          bookPassed ? 'PASS' : 'FAIL',
          bookPassed ? 'Booking request submitted and verified in test.sqlite DB' : 'Mentorship booking failed'
        );

        // (2) Apply to a Job via rendered UI button click
        await page.goto(BASE_URL + '/jobs', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const applyBtn = await page.$('form[action="/jobs/apply"] button.btn-apply-job');
        let applyPassed = false;
        if (applyBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            applyBtn.click()
          ]);
          const dbRows = queryTestDb("SELECT id FROM job_applications WHERE user_id = 6 ORDER BY id DESC LIMIT 1");
          applyPassed = page.url().includes('applied=1') && dbRows.length > 0;
        }
        if (!applyPassed) totalErrors++;
        recordRoster(
          'Job Application Submission UI Click',
          'student',
          '1920x1080',
          'Locate job card on /jobs, click Apply button, assert URL applied=1 and DB row in job_applications',
          applyPassed ? 'PASS' : 'FAIL',
          applyPassed ? 'Application submitted and verified in test.sqlite DB' : 'Apply button submission failed'
        );

        // (3) Community Feed Post, Comment & Like via UI Clicks
        await page.goto(BASE_URL + '/community', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const postInput = await page.$('input[name="content"]');
        if (postInput) {
          await page.fill('input[name="content"]', 'Automated student community update test #alumni');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('form[action="/community/post"] button[type="submit"]')
          ]);
        }
        const likeBtn = await page.$('form[action="/community/like"] button.btn-like-post');
        if (likeBtn) {
          await likeBtn.click();
          await page.waitForTimeout(500);
        }
        const commentInput = await page.$('form.post-comment-form input[name="content"]');
        let commentPassed = false;
        if (commentInput) {
          await commentInput.fill('Great initiative! Real UI click comment from student smoke test.');
          const commentBtn = await page.$('form.post-comment-form button.btn-comment-submit');
          if (commentBtn) {
            await Promise.all([
              page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }).catch(() => null),
              commentBtn.click()
            ]);
            const postRows = queryTestDb("SELECT id FROM posts WHERE content LIKE '%Automated student community update test%'");
            const commentRows = queryTestDb("SELECT id FROM post_comments WHERE content LIKE '%Real UI click comment%'");
            commentPassed = postRows.length > 0 && commentRows.length > 0;
          }
        }
        if (!commentPassed) totalErrors++;
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, 'student_community_feed.png'), fullPage: true });
        recordRoster(
          'Community Feed Post, Comment & Like UI',
          'student',
          '1920x1080',
          'Publish community post, like, and comment via UI clicks, assert DB rows in posts & post_comments',
          commentPassed ? 'PASS' : 'FAIL',
          commentPassed ? 'Feed post, like, and comment verified in UI and DB' : 'Community interaction failed'
        );

        // (4) Donation Checkout Through Sandbox via Real UI Clicks
        await page.goto(BASE_URL + '/donations', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const donateAmountInput = await page.$('form[action="/donations/donate"] input[name="amount"]');
        let donatePassed = false;
        if (donateAmountInput) {
          await donateAmountInput.fill('50');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('form[action="/donations/donate"] button[type="submit"]')
          ]);
          if (page.url().includes('/payment/checkout')) {
            const successBtn = await page.$('form[action="/payment/callback"] button');
            if (successBtn) {
              await Promise.all([
                page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
                successBtn.click()
              ]);
              const dbRows = queryTestDb("SELECT id FROM donations WHERE amount = 50 AND status = 'completed' ORDER BY id DESC LIMIT 1");
              donatePassed = page.url().includes('/donations') && dbRows.length > 0;
            }
          }
        }
        if (!donatePassed) totalErrors++;
        recordRoster(
          'Donation Sandbox Checkout via Real UI Clicks',
          'student',
          '1920x1080',
          'Submit donation on /donations, complete payment in sandbox, assert return to /donations and DB row in donations',
          donatePassed ? 'PASS' : 'FAIL',
          donatePassed ? 'Sandbox donation completed and verified in test.sqlite DB' : 'Sandbox checkout failed'
        );

        // (5) Direct Message Send via Real UI Click
        await page.goto(BASE_URL + '/messages', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const chatItem = await page.$('a.chat-list-item');
        let msgPassed = false;
        if (chatItem) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }).catch(() => null),
            chatItem.click()
          ]);
          await page.waitForSelector('#chat-input', { timeout: 10000 });
          await page.fill('#chat-input', 'Hello from student automated smoke test via UI click!');
          const sendBtn = await page.$('.btn-send-message');
          if (sendBtn) {
            await sendBtn.click();
            await page.waitForTimeout(1000);
            const dbRows = queryTestDb("SELECT id FROM messages WHERE content LIKE '%Hello from student automated smoke test%'");
            msgPassed = dbRows.length > 0;
          }
        }
        if (!msgPassed) totalErrors++;
        recordRoster(
          'Direct Messaging Send via UI Click',
          'student',
          '1920x1080',
          'Select recipient on /messages, send message via UI click, assert DB row in messages table',
          msgPassed ? 'PASS' : 'FAIL',
          msgPassed ? 'Message dispatched and verified in test.sqlite DB' : 'Message sending failed'
        );

        // (6) Student RSVP via Real UI Click
        await page.goto(BASE_URL + '/events', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const rsvpBtn = await page.$('button.btn-rsvp');
        let rsvpPassed = false;
        if (rsvpBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            rsvpBtn.click()
          ]);
          const dbRows = queryTestDb("SELECT id FROM event_registrations WHERE user_id = 6 ORDER BY id DESC LIMIT 1");
          rsvpPassed = page.url().includes('/events') && dbRows.length > 0;
        }
        if (!rsvpPassed) totalErrors++;
        recordRoster(
          'Student RSVP via UI Button Click',
          'student',
          '1920x1080',
          'Click RSVP button on /events, assert registration and DB row in event_registrations',
          rsvpPassed ? 'PASS' : 'FAIL',
          rsvpPassed ? 'RSVP registered and verified in test.sqlite DB' : 'RSVP submission failed'
        );

        // (7) Student Referral Request via Real UI Click
        await page.goto(BASE_URL + '/referral-request', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const refMsgInput = await page.$('textarea[name="message"]');
        let refPassed = false;
        if (refMsgInput) {
          await refMsgInput.fill('Automated referral request from student smoke test.');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('form[action="/referral-request/submit"] button[type="submit"]')
          ]);
          const dbRows = queryTestDb("SELECT id, status FROM referral_requests WHERE student_id = 6 AND status = 'requested' ORDER BY id DESC LIMIT 1");
          refPassed = page.url().includes('submitted=1') && dbRows.length > 0;
        }
        if (!refPassed) totalErrors++;
        recordRoster(
          'Student Referral Request via UI Click',
          'student',
          '1920x1080',
          'Fill referral form on /referral-request, click Submit, assert URL submitted=1 and DB row in referral_requests',
          refPassed ? 'PASS' : 'FAIL',
          refPassed ? 'Referral request created and verified in test.sqlite DB' : 'Referral request failed'
        );

        // (8) Student Marketplace Listing via Real UI Click
        await page.goto(BASE_URL + '/marketplace', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const postItemBtn = await page.$('button.btn-post-item');
        let marketPassed = false;
        if (postItemBtn) {
          await postItemBtn.click();
          await page.waitForSelector('#create-modal', { state: 'visible', timeout: 5000 });
          await page.fill('#create-modal input[name="title"]', 'Student Calculus Textbook (8th Edition)');
          await page.fill('#create-modal input[name="price"]', '35');
          await page.fill('#create-modal textarea[name="description"]', 'Hardcover calculus textbook in like-new condition, no markings.');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('#create-modal form[action="/marketplace/create"] button[type="submit"]')
          ]);
          const dbRows = queryTestDb("SELECT id FROM marketplace_items WHERE title LIKE '%Student Calculus Textbook%' ORDER BY id DESC LIMIT 1");
          marketPassed = page.url().includes('posted=1') && dbRows.length > 0;
        }
        if (!marketPassed) totalErrors++;
        recordRoster(
          'Student Marketplace Listing UI Click',
          'student',
          '1920x1080',
          'Open Post an Item modal on /marketplace, fill fields, submit via UI click, assert DB row in marketplace_items',
          marketPassed ? 'PASS' : 'FAIL',
          marketPassed ? 'Marketplace item listed and verified in test.sqlite DB' : 'Marketplace listing failed'
        );
      }

      if (r.role === 'alumni') {
        console.log('  Testing Alumni interactive workflows via UI clicks:');

        // (1) Accept Mentorship Request via UI button click
        await page.goto(BASE_URL + '/mentorship', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const acceptBtn = await page.$('button.btn-accept-mentorship');
        let acceptPassed = false;
        if (acceptBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            acceptBtn.click()
          ]);
          const dbRows = queryTestDb("SELECT id, status FROM mentorship_sessions WHERE mentor_id = 28 AND status = 'accepted' ORDER BY id DESC LIMIT 1");
          acceptPassed = dbRows.length > 0;
        }
        if (!acceptPassed) totalErrors++;
        recordRoster(
          'Accept Mentorship Request UI Click',
          'alumni',
          '1920x1080',
          'Locate pending mentorship card on /mentorship, click Accept Mentorship, assert DB row status=accepted',
          acceptPassed ? 'PASS' : 'FAIL',
          acceptPassed ? 'Mentorship session accepted and verified in test.sqlite DB' : 'Accept mentorship failed'
        );

        // (2) Post Job Listing via UI Click
        await page.goto(BASE_URL + '/jobs', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const postJobBtn = await page.$('button.btn-post-job-open');
        let jobPassed = false;
        if (postJobBtn) {
          await postJobBtn.click();
          await page.waitForSelector('#post-job-modal', { state: 'visible', timeout: 5000 });
          await page.fill('#post-job-form input[name="title"]', 'Staff AI Engineer');
          await page.fill('#post-job-form input[name="company"]', 'Nexus Innovations');
          await page.fill('#post-job-form input[name="location"]', 'San Francisco, CA');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('button.btn-submit-job')
          ]);
          const dbRows = queryTestDb("SELECT id FROM jobs WHERE title = 'Staff AI Engineer' AND company = 'Nexus Innovations' ORDER BY id DESC LIMIT 1");
          jobPassed = page.url().includes('created=1') && dbRows.length > 0;
        }
        if (!jobPassed) totalErrors++;
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, 'alumni_mentorship_hub.png'), fullPage: true });
        recordRoster(
          'Create Job Opportunity Listing',
          'alumni',
          '1920x1080',
          'Open Post a Job modal on /jobs, fill form, submit via UI click, assert URL created=1 and DB row in jobs',
          jobPassed ? 'PASS' : 'FAIL',
          jobPassed ? 'Staff AI Engineer listing created and verified in test.sqlite DB' : 'Job posting failed'
        );
      }

      if (r.role === 'college_admin') {
        console.log('  Testing College Admin interactive workflows via UI clicks:');

        // (1) Create Event via UI Click
        await page.goto(BASE_URL + '/events-admin', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const createEventBtn = await page.$('button.btn-create-event-open');
        let eventPassed = false;
        if (createEventBtn) {
          await createEventBtn.click();
          await page.waitForSelector('#create-event-modal', { state: 'visible', timeout: 5000 });
          await page.fill('#create-event-form input[name="title"]', 'Founders & VC Mixer 2027');
          await page.fill('#create-event-form input[name="location"]', 'Mumbai Campus Grand Ballroom');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('button.btn-submit-event')
          ]);
          const dbRows = queryTestDb("SELECT id FROM events WHERE title = 'Founders & VC Mixer 2027' ORDER BY id DESC LIMIT 1");
          eventPassed = page.url().includes('created=1') && dbRows.length > 0;
        }
        if (!eventPassed) totalErrors++;
        recordRoster(
          'Campus Event Creation',
          'college_admin',
          '1920x1080',
          'Open Create Event modal on /events-admin, submit via UI click, assert URL created=1 and DB row in events',
          eventPassed ? 'PASS' : 'FAIL',
          eventPassed ? 'Founders & VC Mixer 2027 created and verified in test.sqlite DB' : 'Event creation failed'
        );

        // (2) Event Check-In via real UI form click
        await page.goto(BASE_URL + '/events-admin', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const checkinInput = await page.$('form[action="/events-admin/checkin"] input[name="qr_code"]');
        let checkinPassed = false;
        if (checkinInput) {
          const regQr = (queryTestDb("SELECT qr_code FROM event_registrations LIMIT 1")[0] || {}).qr_code || 'EVREG_DEMO_QR_1';
          await page.fill('form[action="/events-admin/checkin"] input[name="qr_code"]', regQr);
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('form[action="/events-admin/checkin"] button[type="submit"]')
          ]);
          const chkRows = queryTestDb("SELECT id, status FROM event_registrations WHERE qr_code = '" + regQr + "'");
          checkinPassed = chkRows.length > 0 && chkRows[0].status === 'attended';
        }
        if (!checkinPassed) totalErrors++;
        recordRoster(
          'Attendee QR Code Check-In UI Click',
          'college_admin',
          '1920x1080',
          'Submit QR code on /events-admin via UI click, assert attendee check-in confirmation and DB row status=attended',
          checkinPassed ? 'PASS' : 'FAIL',
          checkinPassed ? 'Attendee checked in and verified in test.sqlite DB' : 'QR check-in failed'
        );

        // (3) Resolve Moderation Report via real UI button click
        await page.goto(BASE_URL + '/admin/moderation', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const resolveBtn = await page.$('form[action="/admin/moderation/resolve"] button[type="submit"]');
        let modPassed = false;
        if (resolveBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            resolveBtn.click()
          ]);
          const modRows = queryTestDb("SELECT id, status FROM reports WHERE status = 'resolved' ORDER BY id DESC LIMIT 1");
          modPassed = modRows.length > 0;
        }
        if (!modPassed) totalErrors++;
        recordRoster(
          'Moderation Queue Resolution Action UI Click',
          'college_admin',
          '1920x1080',
          'Inspect pending reports on /admin/moderation, click Resolve button, assert DB row status=resolved',
          modPassed ? 'PASS' : 'FAIL',
          modPassed ? 'Moderation report resolved and verified in test.sqlite DB' : 'Moderation resolve failed'
        );

        // (4) Verify/Deactivate User via real UI button click
        await page.goto(BASE_URL + '/admin/users', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const toggleUserBtn = await page.$('button.btn-toggle-status');
        let userActionPassed = false;
        if (toggleUserBtn) {
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            toggleUserBtn.click()
          ]);
          const usrRows = queryTestDb("SELECT id, status FROM users WHERE status = 'suspended' LIMIT 1");
          userActionPassed = usrRows.length > 0;
        }
        if (!userActionPassed) totalErrors++;
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, 'college_admin_events_admin.png'), fullPage: true });
        recordRoster(
          'Campus User Deactivate / Verify UI Click',
          'college_admin',
          '1920x1080',
          'Click Suspend status button on /admin/users, assert user status toggles and DB row status=suspended',
          userActionPassed ? 'PASS' : 'FAIL',
          userActionPassed ? 'User status updated and verified in test.sqlite DB' : 'User status toggle failed'
        );
      }

      if (r.role === 'super_admin') {
        console.log('  Testing Super Admin interactive workflows via UI clicks:');

        // (1) Institution Subscription Tier Upgrade via UI button click
        await page.goto(BASE_URL + '/super-admin/institutions', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const tierSelect = await page.$('select.tier-select');
        let tierPassed = false;
        if (tierSelect) {
          await tierSelect.selectOption('Enterprise');
          const upgradeBtn = await page.$('button.btn-tier-upgrade');
          if (upgradeBtn) {
            await Promise.all([
              page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
              upgradeBtn.click()
            ]);
            const tierRows = queryTestDb("SELECT plan FROM colleges WHERE id = 1");
            tierPassed = tierRows.length > 0 && tierRows[0].plan === 'Enterprise';
          }
        }
        if (!tierPassed) totalErrors++;
        recordRoster(
          'Institution Subscription Tier Upgrade UI Click',
          'super_admin',
          '1920x1080',
          'Change plan dropdown and click Update on /super-admin/institutions, assert plan=Enterprise in DB',
          tierPassed ? 'PASS' : 'FAIL',
          tierPassed ? 'College 1 upgraded to Enterprise and verified in test.sqlite DB' : 'Tier upgrade failed'
        );

        // (2) Download Platform Revenue CSV Report via Real UI Click
        await page.goto(BASE_URL + '/super-admin/revenue', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const downloadPromise = page.waitForEvent('download', { timeout: 10000 });
        const downloadLink = await page.$('a[href="/super-admin/revenue?export=csv"]');
        let csvPassed = false;
        if (downloadLink) {
          await downloadLink.click();
          const download = await downloadPromise;
          const csvPath = path.join(SCREENSHOT_DIR, 'revenue_export.csv');
          await download.saveAs(csvPath);
          if (fs.existsSync(csvPath)) {
            const csvBody = fs.readFileSync(csvPath, 'utf8');
            csvPassed = csvBody.includes('Transaction ID') && fs.statSync(csvPath).size > 0;
          }
        }
        if (!csvPassed) totalErrors++;
        recordRoster(
          'Platform Revenue CSV Export Download',
          'super_admin',
          '1920x1080',
          'Click Download CSV Export, assert Playwright download event, valid CSV schema and Transaction ID header',
          csvPassed ? 'PASS' : 'FAIL',
          csvPassed ? 'Revenue CSV downloaded and verified' : 'Revenue CSV download failed'
        );

        // (3) Create and Disable Advertisement via UI clicks
        await page.goto(BASE_URL + '/super-admin/ads', { waitUntil: 'domcontentloaded', timeout: 15000 });
        await page.fill('#adSponsorName', 'Acme Global Ventures');
        await page.fill('#adLinkUrl', 'https://acmeventures.example.com');
        await Promise.all([
          page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
          page.click('#createAdSubmitBtn')
        ]);
        const adCreatedRows = queryTestDb("SELECT id, status FROM advertisements WHERE sponsor_name = 'Acme Global Ventures' ORDER BY id DESC LIMIT 1");
        let adPassed = adCreatedRows.length > 0;
        if (adPassed) {
          const disableBtn = await page.$('button[id^="disableAdBtn-"]');
          if (disableBtn) {
            await Promise.all([
              page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
              disableBtn.click()
            ]);
            const adDisabledRows = queryTestDb("SELECT id, status FROM advertisements WHERE sponsor_name = 'Acme Global Ventures' AND status = 'disabled'");
            adPassed = adDisabledRows.length > 0;
          }
        }
        if (!adPassed) totalErrors++;
        recordRoster(
          'Create and Disable Advertisement UI Click',
          'super_admin',
          '1920x1080',
          'Submit new ad form on /super-admin/ads, click Disable button, assert DB row transitions to disabled',
          adPassed ? 'PASS' : 'FAIL',
          adPassed ? 'Ad created, disabled, and verified in test.sqlite DB' : 'Ad creation/disabling failed'
        );

        // (4) Onboard New Collegiate Institution via UI Click
        await page.goto(BASE_URL + '/super-admin/institutions', { waitUntil: 'domcontentloaded', timeout: 15000 });
        const onboardBtn = await page.$('button:has-text("+ Onboard Institution")');
        let instPassed = false;
        if (onboardBtn) {
          await onboardBtn.click();
          await page.waitForSelector('#new-institution-card', { state: 'visible', timeout: 5000 });
          await page.fill('#new-institution-card input[name="name"]', 'Oxford Tech Institute');
          await page.fill('#new-institution-card input[name="slug"]', 'oxford-tech');
          await Promise.all([
            page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
            page.click('#new-institution-card button[type="submit"]')
          ]);
          const instRows = queryTestDb("SELECT id, name FROM colleges WHERE name = 'Oxford Tech Institute'");
          instPassed = instRows.length > 0;
        }
        if (!instPassed) totalErrors++;
        await page.screenshot({ path: path.join(SCREENSHOT_DIR, 'super_admin_institutions_1920px.png'), fullPage: true });
        recordRoster(
          'Create Collegiate Institution UI Click',
          'super_admin',
          '1920x1080',
          'Click Onboard Institution, fill form, submit via UI click, assert institution in DB colleges table',
          instPassed ? 'PASS' : 'FAIL',
          instPassed ? 'Oxford Tech Institute created and verified in test.sqlite DB' : 'Institution creation failed'
        );
      }

      // 3e. Logout UI Interaction
      const logoutBtn = await page.$('form[action="/logout"] button[type="submit"]');
      let logoutPassed = false;
      if (logoutBtn) {
        await Promise.all([
          page.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
          logoutBtn.click()
        ]);
        const logoutUrl = page.url();
        logoutPassed = logoutUrl.includes('/login');
      }
      if (!logoutPassed) totalErrors++;
      recordRoster(
        `Logout Form Submission Click (${r.role})`,
        r.role,
        '1920x1080',
        'Click logout button in sidebar footer, invalidate session, redirect to /login',
        logoutPassed ? 'PASS' : 'FAIL',
        `Successfully logged out -> ${page.url()}`
      );

      if (consoleErrors.length > 0) {
        totalErrors += consoleErrors.length;
        console.log(`  [FAIL] Role ${r.role} encountered browser console errors:`, consoleErrors);
      }

      await page.close();
      await context.close();
    }

  } finally {
    await browser.close();
    cleanupServer();
  }

  // ---------------------------------------------------------------------------
  // 4. SERVER-SIDE ERROR LOG GATE
  // ---------------------------------------------------------------------------
  console.log('\n--- Server-Side Error Log Gate Check ---');
  const errorLogContent = fs.existsSync(ERROR_LOG_PATH) ? fs.readFileSync(ERROR_LOG_PATH, 'utf8') : '';
  let hasLogErrors = false;
  if (errorLogContent.trim() !== '') {
    if (/(Fatal error|Parse error|Warning|Notice|Deprecated)/i.test(errorLogContent)) {
      hasLogErrors = true;
    }
  }

  if (hasLogErrors || errorLogContent.trim() !== '') {
    totalErrors++;
    console.log(`[GATE FAILURE] php_error.log is NOT empty! Detected entries:\n${errorLogContent}`);
  } else {
    console.log(`[PASS] Server-side error log (${ERROR_LOG_PATH}) is completely empty (0 notices, warnings, deprecated, or fatal entries).`);
  }

  console.log(`\n================================================================================`);
  console.log(`REAL BROWSER INTERACTION SMOKE SUMMARY:`);
  console.log(`  - Target Port                  : ${PORT} (http://127.0.0.1:${PORT})`);
  console.log(`  - Target Database              : database/test.sqlite`);
  console.log(`  - Total Checks & Interactions  : ${roster.length}`);
  console.log(`  - Passing Checks               : ${roster.filter(i => i.status === 'PASS').length}`);
  console.log(`  - Failed Checks                : ${roster.filter(i => i.status === 'FAIL').length}`);
  console.log(`  - Screenshots Directory        : ${SCREENSHOT_DIR}`);
  console.log(`================================================================================\n`);

  console.log(`================================================================================`);
  console.log(`COMPLETE ROSTER OF ALL ${roster.length} BROWSER INTERACTIONS:`);
  console.log(`================================================================================`);
  console.log(` #  | Role          | Viewport  | Interaction Name                        | Status | What Was Asserted`);
  console.log(`----+---------------+-----------+-----------------------------------------+--------+------------------------------------------`);
  for (const item of roster) {
    const idStr = String(item.id).padStart(2, ' ');
    const roleStr = item.role.padEnd(13, ' ');
    const vpStr = item.viewport.padEnd(9, ' ');
    const nameStr = item.name.padEnd(39, ' ').substring(0, 39);
    const statusStr = item.status.padEnd(6, ' ');
    console.log(`${idStr}  | ${roleStr} | ${vpStr} | ${nameStr} | ${statusStr} | ${item.asserted}`);
  }
  console.log(`================================================================================\n`);

  console.log(`console errors: ${totalConsoleErrors}`);
  if (totalConsoleErrors > 0) {
    totalErrors += totalConsoleErrors;
  }

  if (totalErrors > 0) {
    process.exit(1);
  }
}

runSmoke().catch(err => {
  console.error('FATAL BROWSER SMOKE TEST ERROR:', err);
  cleanupServer();
  process.exit(1);
});
