const newPasswordInput = document.getElementById('new-password')
const confirmNewPasswordInput = document.getElementById('confirm-new-password')

confirmNewPasswordInput.addEventListener('input', () => {
    if (confirmNewPasswordInput.value != newPasswordInput.value) {
        confirmNewPasswordInput.setCustomValidity("Konfirmasi kata sandi tidak sesuai")
        confirmNewPasswordInput.reportValidity()
    } else {
        confirmNewPasswordInput.setCustomValidity("")
    }
})