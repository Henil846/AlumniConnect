// ===========================
// Login Page JavaScript
// ===========================

document.addEventListener('DOMContentLoaded', () => {

  // ---- Role Tabs ----
  const tabs = document.querySelectorAll('.role-tab');
  let activeRole = 'student';

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => { t.classList.remove('active'); t.setAttribute('aria-selected', 'false'); });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');
      activeRole = tab.dataset.role;

      // Update email placeholder based on role
      const emailInput = document.getElementById('loginEmail');
      if (activeRole === 'admin') {
        emailInput.placeholder = 'name@university.edu';
      } else if (activeRole === 'alumni') {
        emailInput.placeholder = 'name@alumni.edu';
      } else {
        emailInput.placeholder = 'name@college.edu';
      }
    });
  });

  // ---- Form Validation & Submit ----
  const form = document.getElementById('loginForm');
  const emailInput = document.getElementById('loginEmail');
  const passwordInput = document.getElementById('loginPassword');
  const emailError = document.getElementById('loginEmailError');
  const passwordError = document.getElementById('loginPasswordError');
  const submitBtn = document.getElementById('loginSubmitBtn');

  function clearErrors() {
    emailError.textContent = '';
    passwordError.textContent = '';
  }

  function validateForm() {
    let valid = true;
    clearErrors();

    if (!emailInput.value.trim()) {
      emailError.textContent = 'Email address is required.';
      shakeEl(emailInput.closest('.input-wrap'));
      valid = false;
    } else if (!isValidEmail(emailInput.value.trim())) {
      emailError.textContent = 'Please enter a valid email address.';
      shakeEl(emailInput.closest('.input-wrap'));
      valid = false;
    }

    if (!passwordInput.value) {
      passwordError.textContent = 'Password is required.';
      shakeEl(passwordInput.closest('.input-wrap'));
      valid = false;
    } else if (passwordInput.value.length < 6) {
      passwordError.textContent = 'Password must be at least 6 characters.';
      shakeEl(passwordInput.closest('.input-wrap'));
      valid = false;
    }

    return valid;
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (!validateForm()) return;

    // Simulate loading
    submitBtn.disabled = true;
    submitBtn.textContent = 'Signing in...';
    submitBtn.style.opacity = '0.7';

    const formData = new FormData(form);
    
    try {
      const response = await fetch('/login', {
        method: 'POST',
        body: formData
      });
      const data = await response.json();
      
      if (data.success) {
        showToast(data.message, 'success');
        sessionStorage.setItem('userEmail', emailInput.value.trim());
        sessionStorage.setItem('userRole', document.getElementById('loginRoleInput').value);
        setTimeout(() => {
          window.location.href = data.redirect;
        }, 1500);
      } else {
        if (data.errors) {
          if (data.errors.email) emailError.textContent = data.errors.email;
          if (data.errors.password) passwordError.textContent = data.errors.password;
        } else if (data.message) {
          showToast(data.message, 'error');
        }
        submitBtn.disabled = false;
        submitBtn.textContent = 'Continue';
        submitBtn.style.opacity = '1';
      }
    } catch (err) {
      showToast('An error occurred. Please try again.', 'error');
      submitBtn.disabled = false;
      submitBtn.textContent = 'Continue';
      submitBtn.style.opacity = '1';
    }
  });

  // Clear errors on input
  emailInput.addEventListener('input', () => { emailError.textContent = ''; });
  passwordInput.addEventListener('input', () => { passwordError.textContent = ''; });

  // ---- Google Login ----
  const googleBtn = document.getElementById('googleLoginBtn');
  googleBtn.addEventListener('click', () => {
    showToast('Google sign-in is not connected yet. Please use email & password.', 'info');
  });

});
