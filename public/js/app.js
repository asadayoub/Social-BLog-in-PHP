document.addEventListener("DOMContentLoaded", (event) => {
    const actions = document.querySelectorAll(".password-wrap")
    for (let i = 0; i < actions.length; i++) {
        const passwordInput = actions[i].querySelector(".password")
        const action = actions[i].querySelector(".toggle-button")
        action.addEventListener("click", (actionEvent) => {
            if (passwordInput.type == "password") {
                passwordInput.type = "text"
            }
            else {
                passwordInput.type = "password"
            }
        })
    }
    
});
