function showProfileToast(msg, color) {
    const t = document.getElementById('profileToast');
    if (!t) return;
    t.innerHTML = (color === 'green' ? '✓' : 'ℹ') + ' ' + msg;
    t.style.background = color === 'green' ? '#15803d' : '#0f172a';
    t.style.opacity = '1';
    t.style.transform = 'translateY(0)';
    setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateY(10px)'; }, 3000);
}

// Save Changes
const form = document.getElementById('profileForm');
const btnSave = document.querySelector('.btn-save');
if (form && btnSave) {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        btnSave.textContent = 'Saving...';
        btnSave.disabled = true;

        const formData = new FormData(form);
        
        try {
            const response = await fetch('/profile/update', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            
            if (data.success) {
                btnSave.textContent = 'Saved ✓';
                btnSave.style.background = '#15803d';
                showProfileToast('Profile saved successfully!', 'green');
                setTimeout(() => {
                    btnSave.textContent = 'Save Changes';
                    btnSave.style.background = '';
                    btnSave.disabled = false;
                }, 2500);
            } else {
                showProfileToast(data.message || 'Error saving profile', 'red');
                btnSave.textContent = 'Save Changes';
                btnSave.disabled = false;
            }
        } catch (err) {
            showProfileToast('Network error', 'red');
            btnSave.textContent = 'Save Changes';
            btnSave.disabled = false;
        }
    });
}

// Cancel
const btnCancel = document.querySelector('.profile-actions .btn-cancel');
if (btnCancel) {
    btnCancel.addEventListener('click', function() {
        window.location.href = '/dashboard';
    });
}

// Skill chip removal
document.querySelectorAll('.skill-chip button').forEach(btn => {
    btn.addEventListener('click', function() {
    this.closest('.skill-chip').remove();
    showProfileToast('Skill removed.', 'info');
    });
});

// + Add Skill
const btnAddSkill = document.querySelector('.add-link');
if (btnAddSkill) {
    btnAddSkill.addEventListener('click', function() {
        const skill = prompt('Enter new skill:');
        if (skill && skill.trim()) {
        const chip = document.createElement('div');
        chip.className = 'skill-chip';
        chip.innerHTML = skill.trim() + ' <button><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>';
        chip.querySelector('button').addEventListener('click', () => chip.remove());
        const container = document.querySelector('.chips-container');
        if (container) container.appendChild(chip);
        showProfileToast('Skill added!', 'green');
        }
    });
}

// Browse Files (resume)
const btnUpload = document.querySelector('.upload-box .btn-cancel');
if (btnUpload) {
    btnUpload.addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = '.pdf,.docx';
        input.onchange = () => {
        const nameEl = document.querySelector('.file-item h6');
        if (nameEl) nameEl.textContent = input.files[0].name;
        showProfileToast('Resume uploaded: ' + input.files[0].name, 'green');
        };
        input.click();
    });
}

// Photo edit
const btnPhotoEdit = document.querySelector('.photo-edit-btn');
if (btnPhotoEdit) {
    btnPhotoEdit.addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = () => {
        const url = URL.createObjectURL(input.files[0]);
        const img = document.querySelector('.profile-photo');
        if (img) img.src = url;
        showProfileToast('Profile photo updated!', 'green');
        };
        input.click();
    });
}
