const loginForm = document.querySelector("#login-form");
const signupForm = document.querySelector("#signup-form");
const signupLink = document.querySelector("#signup-link");

signupLink.addEventListener("click", function(event) {
  event.preventDefault();
  loginForm.style.display = "none";
  signupForm.style.display = "block";
});
