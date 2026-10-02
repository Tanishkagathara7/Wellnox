/**
 * WELLNOX ADMIN CMS - JAVASCRIPT
 */
document.addEventListener('DOMContentLoaded', function () {
    // 1. Password Visibility Toggle
    const togglePasswordBtns = document.querySelectorAll('.toggle-password-btn');
    togglePasswordBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const targetSelector = this.getAttribute('data-target');
            const targetInput = document.querySelector(targetSelector);
            if (targetInput) {
                const icon = this.querySelector('i');
                if (targetInput.type === 'password') {
                    targetInput.type = 'text';
                    if (icon) {
                        icon.classList.remove('bi-eye');
                        icon.classList.add('bi-eye-slash');
                    }
                } else {
                    targetInput.type = 'password';
                    if (icon) {
                        icon.classList.remove('bi-eye-slash');
                        icon.classList.add('bi-eye');
                    }
                }
            }
        });
    });

    // 2. Real-time Image Preview on file input change
    const imageInputs = document.querySelectorAll('.admin-image-input');
    imageInputs.forEach(input => {
        input.addEventListener('change', function () {
            const previewId = this.getAttribute('data-preview');
            const previewImg = document.getElementById(previewId);
            if (previewImg && this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('d-none');
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // 3. Auto-dismiss alerts after 5 seconds
    const autoAlerts = document.querySelectorAll('.alert-dismissible:not(.alert-permanent)');
    autoAlerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            if (bsAlert) {
                bsAlert.close();
            }
        }, 5000);
    });

    // 4. Form Submit Loading Indicator
    const submitBtns = document.querySelectorAll('button[type="submit"]:not(.no-spin)');
    submitBtns.forEach(btn => {
        const form = btn.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                if (form.checkValidity()) {
                    btn.disabled = true;
                    const originalText = btn.innerHTML;
                    btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Saving...`;
                }
            });
        }
    });
});
