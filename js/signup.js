const signupAsJobSeekerButton = document.getElementById("signup-as-job-seeker-button")
const companiesLabel = document.getElementById("companies-label")
const companies = document.getElementById("companies")

signupAsJobSeekerButton.addEventListener('click', () => {
    document.getElementById('signup-as').value = "1"
    signupAsEmployerButton.classList.remove("signup-as-selected")
    companiesLabel.classList.add("hidden")
    companies.classList.add("hidden")
    companies.disabled = true
    signupAsJobSeekerButton.classList.add("signup-as-selected")
})

const signupAsEmployerButton = document.getElementById("signup-as-employer-button")
signupAsEmployerButton.addEventListener('click', () => {
    document.getElementById('signup-as').value = "2"
    signupAsJobSeekerButton.classList.remove("signup-as-selected")
    companiesLabel.classList.remove("hidden")
    companies.classList.remove("hidden")
    companies.disabled = false
    signupAsEmployerButton.classList.add("signup-as-selected")
})

const passwordInput = document.getElementById('password');
const passwordConfirmInput = document.getElementById('password-confirm');

passwordConfirmInput.addEventListener('input', () => {
    if (passwordConfirmInput.value != passwordInput.value) {
        passwordConfirmInput.setCustomValidity("Konfirmasi kata sandi tidak sesuai")
        passwordConfirmInput.reportValidity()
    } else {
        passwordConfirmInput.setCustomValidity("")
    }
})