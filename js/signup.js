

const signupAsJobSeekerButton = document.getElementById("signup-as-job-seeker-button")
signupAsJobSeekerButton.addEventListener('click', () => {
    document.getElementById('signup-as').value = "job-seeker"
    signupAsEmployerButton.classList.remove("signup-as-selected")
    signupAsJobSeekerButton.classList.add("signup-as-selected")
})

const signupAsEmployerButton = document.getElementById("signup-as-employer-button")
signupAsEmployerButton.addEventListener('click', () => {
    document.getElementById('signup-as').value = "employer"
    signupAsJobSeekerButton.classList.remove("signup-as-selected")
    signupAsEmployerButton.classList.add("signup-as-selected")
})