// ===========================
// Forgot Password Page JavaScript
// ===========================

document.addEventListener('DOMContentLoaded', () => {

  const form = document.getElementById('forgotForm');
  const emailInput = document.getElementById('forgotEmail');
  const emailError = document.getElementById('forgotEmailError');
  const submitBtn = document.getElementById('forgotSubmitBtn');

  const defaultView = document.getElementById('forgotDefault');
  const successView = document.getElementById('forgotSuccess');
  const sentToEmail = document.getElementById('sentToEmail');

  // Form submission
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    emailError.textContent = '';

    const email = emailInput.value.trim();

    if (!email) {
      emailError.textContent = 'Email address is required.';
      shakeEl(emailInput.closest('.input-wrap'));
      return;
    }

    if (!isValidEmail(email)) {
      emailError.textContent = 'Please enter a valid email address.';
      shakeEl(emailInput.closest('.input-wrap'));
      return;
    }

    // Loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Sending...<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" style="animation:spin 1s linear infinite"><path d="M21 12a9 9 0 1 1-6.219-8.56"/></svg>';

    const spinStyle = document.createElement('style');
    spinStyle.textContent = '@keyframes spin { to { transform: rotate(360deg); } }';
    document.head.appendChild(spinStyle);

    try {
        const formData = new FormData(form);
        const response = await fetch('/forgot-password', {
            method: 'POST',
            body: formData,
            headers: { 'Accept': 'application/json' }
        });
        const data = await response.json();

        if (data.success) {
            // Show success
            if (sentToEmail) sentToEmail.textContent = email;
            defaultView.style.display = 'none';
            successView.style.display = 'block';
            showToast(data.message || 'Password reset link sent! Check your inbox.', 'success');
        } else {
            showToast(data.message || 'An error occurred', 'error');
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Send Reset Link <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
        }
    } catch (err) {
        showToast('An unexpected error occurred.', 'error');
        submitBtn.disabled = false;
        submitBtn.innerHTML = 'Send Reset Link <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
    }
  });

  // Clear error on input
  emailInput.addEventListener('input', () => { emailError.textContent = ''; });

  // Resend from success view
  const resendResetBtn = document.getElementById('resendResetBtn');
  if (resendResetBtn) {
    resendResetBtn.addEventListener('click', async () => {
      resendResetBtn.disabled = true;
      resendResetBtn.style.opacity = '0.5';
      
      try {
          const formData = new FormData(form);
          const response = await fetch('/forgot-password', {
              method: 'POST',
              body: formData,
              headers: { 'Accept': 'application/json' }
          });
          const data = await response.json();
          if (data.success) {
              showToast('Reset link resent! Please check your inbox.', 'info');
          } else {
              showToast('Failed to resend link.', 'error');
          }
      } catch (err) {
          showToast('An error occurred.', 'error');
      }

      setTimeout(() => {
        resendResetBtn.disabled = false;
        resendResetBtn.style.opacity = '1';
      }, 30000);
    });
  }

  // Prevent default on hash links
  document.querySelectorAll('a[href="#"]').forEach(a => a.addEventListener('click', e => e.preventDefault()));

});
