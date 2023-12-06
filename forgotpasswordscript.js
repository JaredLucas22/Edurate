document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const togglePasswordCheckbox = document.getElementById('togglePassword');
    const togglePasswordIcon = document.querySelector('.toggle-password-icon');

    togglePasswordIcon.addEventListener('click', function () {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
    });
});