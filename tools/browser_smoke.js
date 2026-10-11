const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');

const BASE_URL = 'http://127.0.0.1:8000';
const SCREENSHOT_DIR = path.join(__dirname, '..', 'docs', 'screenshots');

if (!fs.existsSync(SCREENSHOT_DIR)) {
  fs.mkdirSync(SCREENSHOT_DIR, { recursive: true });
}

const ROLES = [
  {
    role: 'student',
    email: 'student@alumni.test',
    password: 'Password123!',
    dashboard: '/dashboard',
    pages: [
      '/dashboard',
      '/profile',
      '/directory',
      '/mentorship',
      '/jobs',
      '/events',
      '/community',
      '/messages',
      '/referral-request',
      '/marketplace',
      '/donations',
      '/settings'
    ]
  },
  {
    role: 'alumni',
    email: 'alumni@alumni.test',
    password: 'Password123!',
    dashboard: '/dashboard',
    pages: [
      '/dashboard',
      '/profile',
      '/directory',
      '/mentorship',
      '/jobs',
      '/events',
      '/community',
      '/messages',
      '/referral-request',
      '/marketplace',
      '/donations',
      '/settings'
    ]
  },
  {
    role: 'college_admin',
    email: 'admin@alumni.test',
    password: 'Password123!',
    dashboard: '/admin/dashboard',
    pages: [
      '/admin/dashboard',
      '/admin/moderation',
      '/events-admin',
      '/admin/payments',
      '/admin/analytics',
      '/settings'
    ]
  },
  {
    role: 'super_admin',
    email: 'superadmin@alumni.test',
    password: 'Password123!',
    dashboard: '/super-admin/dashboard',
    pages: [
      '/super-admin/dashboard',
      '/super-admin/institutions',
      '/super-admin/analytics',
      '/super-admin/revenue',
      '/super-admin/settings'
    ]
  }
];

async function runSmoke() {
  console.log('=== STARTING BROWSER SMOKE TEST (PLAYWRIGHT) ===');
  const browser = await chromium.launch({ headless: true });
  let totalErrors = 0;
  let totalChecks = 0;

  try {
    // 1. Public Pages (Landing, Login, Signup) at 1280px and 375px
    const publicPages = [
      { name: 'landing', url: '/' },
      { name: 'login', url: '/login' },
      { name: 'signup', url: '/signup' }
    ];

    for (const p of publicPages) {
      for (const width of [1280, 375]) {
        totalChecks++;
        const page = await browser.newPage({ viewport: { width, height: 800 } });
        const errors = [];
        page.on('console', msg => {
          if (msg.type() === 'error') errors.push(msg.text());
        });
        page.on('pageerror', err => errors.push(err.message));

        try {
          const resp = await page.goto(BASE_URL + p.url, { waitUntil: 'domcontentloaded', timeout: 15000 });
          const status = resp ? resp.status() : 'none';
          const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
          const screenshotName = `${p.name}_${width}px.png`;
          await page.screenshot({ path: path.join(SCREENSHOT_DIR, screenshotName), fullPage: true });

          if (errors.length > 0 || overflow) {
            totalErrors++;
            console.log(`[FAIL] ${p.name} (${width}px) - HTTP ${status} | Overflow: ${overflow} | Errors: ${JSON.stringify(errors)}`);
          } else {
            console.log(`[PASS] ${p.name} (${width}px) - HTTP ${status} | Overflow: false | Saved: ${screenshotName}`);
          }
        } catch (e) {
          totalErrors++;
          console.log(`[FAIL] ${p.name} (${width}px) - Exception: ${e.message}`);
        } finally {
          await page.close();
        }
      }
    }

    // 2. Dashboards at 1280px & 375px and Sidebar Pages at 375px per role
    for (const r of ROLES) {
      console.log(`\n--- Authenticating as ${r.role} (${r.email}) ---`);
      const context = await browser.newContext({ viewport: { width: 1280, height: 800 } });
      // Cleanly fulfill SSE route so single-threaded PHP built-in server does not block
      await context.route('**/messages/stream*', route => {
        route.fulfill({
          status: 200,
          contentType: 'text/event-stream',
          body: 'data: {"status":"connected"}\n\n'
        });
      });

      const authPage = await context.newPage();
      await authPage.goto(BASE_URL + '/login', { waitUntil: 'domcontentloaded', timeout: 15000 });
      await authPage.fill('input[name="email"]', r.email);
      await authPage.fill('input[name="password"]', r.password);
      await Promise.all([
        authPage.waitForNavigation({ waitUntil: 'domcontentloaded', timeout: 15000 }),
        authPage.click('button[type="submit"]')
      ]);

      // Capture main dashboard at 1280px
      const dash1280Name = `${r.role}_dashboard_1280px.png`;
      await authPage.screenshot({ path: path.join(SCREENSHOT_DIR, dash1280Name), fullPage: true });
      console.log(`[PASS] ${r.role} main dashboard (1280px) saved: ${dash1280Name}`);
      await authPage.close();

      // Now test each page in sidebar at 375px
      for (const p of r.pages) {
        totalChecks++;
        const page = await context.newPage({ viewport: { width: 375, height: 800 } });
        const errors = [];
        page.on('console', msg => {
          if (msg.type() === 'error') {
            errors.push(msg.text());
          }
        });
        page.on('pageerror', err => errors.push(err.message));

        try {
          const resp = await page.goto(BASE_URL + p, { waitUntil: 'domcontentloaded', timeout: 15000 });
          const status = resp ? resp.status() : 'none';
          const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth);
          const safeName = p.replace(/\//g, '_').replace(/^_/, '');
          const screenshotName = `${r.role}_${safeName}_375px.png`;
          await page.screenshot({ path: path.join(SCREENSHOT_DIR, screenshotName), fullPage: true });

          if (errors.length > 0 || overflow) {
            totalErrors++;
            console.log(`  [FAIL] ${p} (375px) - HTTP ${status} | Overflow: ${overflow} | Errors: ${JSON.stringify(errors)}`);
          } else {
            console.log(`  [PASS] ${p} (375px) - HTTP ${status} | Overflow: false | Saved: ${screenshotName}`);
          }
        } catch (e) {
          totalErrors++;
          console.log(`  [FAIL] ${p} (375px) - Exception: ${e.message}`);
        } finally {
          await page.close();
        }
      }

      await context.close();
    }

  } finally {
    await browser.close();
  }

  console.log(`\n========================================================`);
  console.log(`BROWSER SMOKE TEST SUMMARY: ${totalChecks - totalErrors}/${totalChecks} Passed | Failed: ${totalErrors}`);
  console.log(`Screenshots saved to: ${SCREENSHOT_DIR}`);
  console.log(`========================================================`);
  if (totalErrors > 0) {
    process.exit(1);
  }
}

runSmoke().catch(err => {
  console.error('FATAL BROWSER SMOKE ERROR:', err);
  process.exit(1);
});
