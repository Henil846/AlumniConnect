// ===========================
// Signup Page JavaScript
// ===========================

document.addEventListener('DOMContentLoaded', () => {

  // ---- Join As Toggle ----
  const joinBtns = document.querySelectorAll('.join-as-btn');
  joinBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      joinBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  // ---- College Search ----
  const colleges = [
    'Harvard University', 'MIT', 'Stanford University', 'Yale University',
    'Princeton University', 'Columbia University', 'University of Oxford',
    'University of Cambridge', 'Caltech', 'University of Chicago',
    'Duke University', 'Johns Hopkins University', 'Northwestern University',
    'Cornell University', 'Dartmouth College', 'Brown University',
    'University of Pennsylvania', 'Carnegie Mellon University',
    'Georgia Tech', 'UC Berkeley', 'UCLA', 'University of Michigan',
    'NYU', 'Boston University', 'Vanderbilt University',
    'Rice University', 'Emory University', 'Notre Dame',
    'University of Toronto', 'McGill University', 'IIT Bombay',
    'IIT Delhi', 'IIT Madras', 'NIT Trichy', 'Delhi University',
    'Manipal University', 'VIT University', 'Anna University',
    'Bits Pilani', 'Jadavpur University',
  ];

  const collegeInput = document.getElementById('college');
  const dropdown = document.getElementById('collegeDropdown');

  collegeInput.addEventListener('input', () => {
    const val = collegeInput.value.trim().toLowerCase();
    if (!val) { dropdown.classList.remove('open'); return; }

    const matches = colleges.filter(c => c.toLowerCase().includes(val)).slice(0, 6);
    if (matches.length === 0) { dropdown.classList.remove('open'); return; }

    dropdown.innerHTML = matches.map(c => {
      const idx = c.toLowerCase().indexOf(val);
      const before = c.slice(0, idx);
      const match = c.slice(idx, idx + val.length);
      const after = c.slice(idx + val.length);
      return `<div class="college-option" role="option" tabindex="0"><span>${before}<strong>${match}</strong>${after}</span></div>`;
    }).join('');

    dropdown.classList.add('open');

    dropdown.querySelectorAll('.college-option').forEach(opt => {
      opt.addEventListener('click', () => {
        collegeInput.value = opt.textContent;
        dropdown.classList.remove('open');
        collegeInput.focus();
      });
      opt.addEventListener('keydown', e => {
        if (e.key === 'Enter') opt.click();
      });
    });
  });

  // Close dropdown on outside click
  document.addEventListener('click', (e) => {
    if (!collegeInput.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.remove('open');
    }
  });

  // ---- Password Strength ----
  const passwordInput = document.getElementById('signupPassword');
  const strengthWrap = document.getElementById('passwordStrength');
  const strengthBars = [
    document.getElementById('sb1'),
    document.getElementById('sb2'),
    document.getElementById('sb3'),
    document.getElementById('sb4'),
  ];
  const strengthLabel = document.getElementById('strengthLabel');

  function calcStrength(pw) {
    let score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    return score;
  }

  const strengthClasses = ['', 'weak', 'fair', 'good', 'strong'];
  const strengthLabels = ['', 'Weak', 'Fair', 'Good', 'Strong'];

  passwordInput.addEventListener('input', () => {
    const pw = passwordInput.value;
    if (!pw) { strengthWrap.style.display = 'none'; return; }
    strengthWrap.style.display = 'flex';
    const score = calcStrength(pw);
    const cls = strengthClasses[score] || 'weak';
    strengthBars.forEach((bar, i) => {
      bar.className = 'strength-bar';
      if (i < score) bar.classList.add(cls);
    });
    strengthLabel.textContent = strengthLabels[score] || 'Weak';
    strengthLabel.style.color = score <= 1 ? '#ef4444' : score === 2 ? '#f59e0b' : '#10b981';
  });

  // ---- Form Validation ----
  const form = document.getElementById('signupForm');
  const fullNameInput = document.getElementById('fullName');
  const emailInput = document.getElementById('signupEmail');
  const fullNameError = document.getElementById('fullNameError');
  const emailError = document.getElementById('signupEmailError');
  const passwordError = document.getElementById('signupPasswordError');
  const termsCheck = document.getElementById('termsCheck');
  const submitBtn = document.getElementById('signupSubmitBtn');

  function clearErrors() {
    [fullNameError, emailError, passwordError].forEach(e => e.textContent = '');
  }

  function validateStep1() {
    let valid = true;
    clearErrors();

    if (!fullNameInput.value.trim() || fullNameInput.value.trim().length < 2) {
      fullNameError.textContent = 'Please enter your full name (min. 2 characters).';
      shakeEl(fullNameInput.closest('.input-wrap'));
      valid = false;
    }

    if (!emailInput.value.trim()) {
      emailError.textContent = 'Email address is required.';
      shakeEl(emailInput.closest('.input-wrap'));
      valid = false;
    } else if (!isValidEmail(emailInput.value.trim())) {
      emailError.textContent = 'Please enter a valid email address.';
      shakeEl(emailInput.closest('.input-wrap'));
      valid = false;
    }

    if (!passwordInput.value || passwordInput.value.length < 8) {
      passwordError.textContent = 'Password must be at least 8 characters.';
      shakeEl(passwordInput.closest('.input-wrap'));
      valid = false;
    }

    if (!termsCheck.checked) {
      showToast('Please agree to the Terms of Service and Privacy Policy.', 'error');
      shakeEl(termsCheck);
      valid = false;
    }

    return valid;
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (!validateStep1()) return;

    // Loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Saving... <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';

    const spinStyle = document.createElement('style');
    spinStyle.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
    document.head.appendChild(spinStyle);

    const formData = new FormData(form);
    
    try {
      const response = await fetch('/signup', {
        method: 'POST',
        body: formData
      });
      const data = await response.json();
      
      if (data.success) {
        showToast(data.message, 'success');
        setTimeout(() => {
          window.location.href = data.redirect;
        }, 1500);
      } else {
        if (data.errors) {
          if (data.errors.fullName) fullNameError.textContent = data.errors.fullName;
          if (data.errors.email) emailError.textContent = data.errors.email;
          if (data.errors.password) passwordError.textContent = data.errors.password;
        } else if (data.message) {
          showToast(data.message, 'error');
        }
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Continue to Academic Details <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
      }
    } catch (err) {
      showToast('An error occurred. Please try again.', 'error');
      submitBtn.disabled = false;
      submitBtn.innerHTML = 'Continue to Academic Details <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
    }
  });

  // Clear errors on type
  fullNameInput.addEventListener('input', () => { fullNameError.textContent = ''; });
  emailInput.addEventListener('input', () => { emailError.textContent = ''; });
  passwordInput.addEventListener('input', () => { passwordError.textContent = ''; });

  // Prevent terms link default
  document.querySelectorAll('a[href="#"]').forEach(a => a.addEventListener('click', e => e.preventDefault()));
});
