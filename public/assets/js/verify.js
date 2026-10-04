// ===========================
// Verify Page JavaScript
// ===========================

document.addEventListener('DOMContentLoaded', () => {

  // ---- Show user's email ----
  const storedEmail = sessionStorage.getItem('userEmail') || sessionStorage.getItem('signupEmail') || 'm.jordan@stanford.edu';
  const emailEl = document.getElementById('verifyEmail');
  if (emailEl) emailEl.textContent = storedEmail;

  // ---- OTP Input Logic ----
  const otpInputs = Array.from(document.querySelectorAll('.otp-input'));

  otpInputs.forEach((input, i) => {
    // Only allow digits
    input.addEventListener('keydown', (e) => {
      const allowed = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete'];
      if (!allowed.includes(e.key) && !/^\d$/.test(e.key)) {
        e.preventDefault();
      }
    });

    input.addEventListener('input', (e) => {
      const val = input.value.replace(/\D/g, '');
      input.value = val ? val[val.length - 1] : '';

      if (input.value) {
        input.classList.add('filled');
        // Move to next
        if (i < otpInputs.length - 1) {
          otpInputs[i + 1].focus();
        }
      } else {
        input.classList.remove('filled');
      }
    });

    input.addEventListener('keydown', (e) => {
      if (e.key === 'Backspace' && !input.value && i > 0) {
        otpInputs[i - 1].focus();
        otpInputs[i - 1].value = '';
        otpInputs[i - 1].classList.remove('filled');
      }
    });

    input.addEventListener('paste', (e) => {
      e.preventDefault();
      const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '');
      if (pasted.length >= 6) {
        otpInputs.forEach((inp, idx) => {
          inp.value = pasted[idx] || '';
          if (inp.value) inp.classList.add('filled');
          else inp.classList.remove('filled');
        });
        otpInputs[Math.min(pasted.length, 5)].focus();
      }
    });

    input.addEventListener('focus', () => input.select());
  });

  // Focus first input
  if (otpInputs[0]) otpInputs[0].focus();

  // ---- Countdown Timer ----
  let timeLeft = 120; // 2 minutes
  const timerDisplay = document.getElementById('timerDisplay');
  const resendBtn = document.getElementById('resendBtn');
  let timerInterval;

  function formatTime(s) {
    const m = Math.floor(s / 60);
    const sec = s % 60;
    return `${String(m).padStart(2, '0')}:${String(sec).padStart(2, '0')}`;
  }

  function startTimer() {
    clearInterval(timerInterval);
    timerInterval = setInterval(() => {
      timeLeft--;
      if (timerDisplay) timerDisplay.textContent = formatTime(timeLeft);
      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        if (timerDisplay) {
          timerDisplay.textContent = '00:00';
          timerDisplay.style.color = 'var(--color-error)';
        }
        if (resendBtn) resendBtn.disabled = false;
        showToast('Code expired. Please resend.', 'error');
      }
    }, 1000);
  }

  timerDisplay.textContent = formatTime(timeLeft);
  startTimer();

  // ---- Resend Code ----
  if (resendBtn) {
    resendBtn.addEventListener('click', () => {
      // Reset
      timeLeft = 120;
      timerDisplay.style.color = '';
      otpInputs.forEach(inp => { inp.value = ''; inp.classList.remove('filled', 'error'); });
      otpInputs[0].focus();
      startTimer();
      showToast('Verification code resent! Check your inbox.', 'info');
      resendBtn.disabled = true;
      setTimeout(() => { resendBtn.disabled = false; }, 30000); // allow resend after 30s
    });
  }

  // ---- Form Submit / Verify ----
  const otpForm = document.getElementById('otpForm');
  const verifyBtn = document.getElementById('verifyBtn');

  otpForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const code = otpInputs.map(inp => inp.value).join('');
    if (code.length < 6) {
      otpInputs.forEach(inp => inp.classList.add('error'));
      showToast('Please enter all 6 digits of your verification code.', 'error');
      shakeEl(document.getElementById('otpRow'));
      return;
    }

    otpInputs.forEach(inp => inp.classList.remove('error'));

    // Simulate verification
    verifyBtn.disabled = true;
    verifyBtn.innerHTML = 'Verifying...<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';

    const spinStyle = document.createElement('style');
    spinStyle.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
    document.head.appendChild(spinStyle);

    await new Promise(r => setTimeout(r, 1400));

    // Demo: any 6-digit code works
    clearInterval(timerInterval);
    showToast('Email verified successfully! Welcome to Alumni Connect 🎉', 'success');

    // Mark verified
    sessionStorage.setItem('emailVerified', 'true');

    // Redirect based on role
    const role = sessionStorage.getItem('userRole') || sessionStorage.getItem('signupRole') || 'student';
    setTimeout(() => {
      if (role === 'admin') {
        window.location.href = 'super-admin-dashboard.html';
      } else {
        window.location.href = 'dashboard.html';
      }
    }, 2000);
  });

});
