document.addEventListener('DOMContentLoaded', function () {
    const newPasswordInput = document.getElementById('newPassword');
    const toggleNewPasswordCheckbox = document.getElementById('toggleNewPassword');
    const toggleNewPasswordIcon = document.querySelector('.toggle-new-password-icon');

    const confirmPasswordInput = document.getElementById('confirmPassword');
    const toggleConfirmPasswordCheckbox = document.getElementById('toggleConfirmPassword');
    const toggleConfirmPasswordIcon = document.querySelector('.toggle-confirm-password-icon');

    console.log(newPasswordInput);  // Log the element to the console

    if (toggleNewPasswordCheckbox) {
        toggleNewPasswordCheckbox.addEventListener('click', function () {
            const type = newPasswordInput.type === 'password' ? 'text' : 'password';
            newPasswordInput.type = type;
        });
    } else {
        console.error("toggleNewPasswordCheckbox is null or undefined");
    }

    if (toggleConfirmPasswordCheckbox) {
        toggleConfirmPasswordCheckbox.addEventListener('click', function () {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;
        });
    } else {
        console.error("toggleConfirmPasswordCheckbox is null or undefined");
    }
});
