// Auth Pages JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
            }
        });
    });

    // Password visibility toggle
    const passwordToggles = document.querySelectorAll('.password-toggle');
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const icon = this;
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = '👁️‍🗨️';
            } else {
                input.type = 'password';
                icon.textContent = '👁️';
            }
        });
    });

    // Auto-hide error messages after 5 seconds
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => {
        setTimeout(() => {
            msg.style.animation = 'slideUp 0.3s ease-out forwards';
            setTimeout(() => msg.remove(), 300);
        }, 5000);
    });
});

function validateForm(form) {
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;

    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#E74C3C';
            isValid = false;
        } else {
            input.style.borderColor = '#E0E0E0';
        }

        // Email validation
        if (input.type === 'email' && input.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value)) {
                input.style.borderColor = '#E74C3C';
                isValid = false;
            }
        }

        // Password validation
        if (input.type === 'password' && input.name === 'password' && input.value) {
            if (input.value.length < 8) {
                input.style.borderColor = '#E74C3C';
                isValid = false;
            }
        }
    });

    return isValid;
}

// Add input event listeners for real-time validation
document.querySelectorAll('.form-input').forEach(input => {
    input.addEventListener('input', function() {
        if (this.value.trim()) {
            this.style.borderColor = '#E0E0E0';
        }
    });
});
