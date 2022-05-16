// Login
let emailLogin = document.getElementById("email");
let passwordLogin = document.getElementById("login-password");

let buttonLogin = document.getElementById("login-submit");
// Sign Up
let secondName = document.getElementById("signup-secondname");
let firstName = document.getElementById("signup-firstname");
let emailSignUp = document.getElementById("signup-email");
let confirmEmail = document.getElementById("signup-confirm-email");
let passwordSignUp = document.getElementById("signup-password");
let birthday = document.getElementById("date");

let form = document.getElementById("form");

let buttonSignUp = document.getElementById("signup-submit");

function validateInput() {
  //check input is empty
  if (secondName.value.trim() === "") {
    onError(secondName, "Le prénom ne peut pas être vide");
  } else {
    onSuccess(secondName);
  }
  if (firstName.value.trim() === "") {
    onError(firstName, "Le nom ne peut pas être vide");
  } else {
    onSuccess(firstName);
  }
  if (emailSignUp.value.trim() === "") {
    onError(emailSignUp, "Le mail ne peut pas être vide");
  } else {
    onSuccess(emailSignUp);
  }
  if (
    confirmEmail.value.trim() !== emailSignUp.value ||
    confirmEmail.value.trim() === ""
  ) {
    onError(confirmEmail, "Vous devez confirmer votre mail");
    console.log(confirmEmail.value);
    console.log(emailSignUp.value);
  } else {
    onSuccess(confirmEmail);
  }
  if (passwordSignUp.value.trim() === "") {
    onError(passwordSignUp, "Le mot de passe ne peut pas être vide");
  } else {
    onSuccess(passwordSignUp);
  }
}

function validateInputLogin() {
  //check input is empty
  if (emailLogin.value.trim() === "") {
    onError(emailLogin, "Le mail ne peut pas être vide");
  } else {
    onSuccess(emailLogin);
  }
  if (passwordLogin.value.trim() === "") {
    onError(passwordLogin, "Le mot de passe ne peut pas être vide");
  } else {
    onSuccess(passwordLogin);
  }
}
buttonSignUp.onclick = function signUp(event) {
  if (
    secondName.value.trim() !== "" &&
    firstName.value.trim() !== "" &&
    emailSignUp.value.trim() !== "" &&
    confirmEmail.value.trim() == emailSignUp.value &&
    passwordSignUp.value.trim() !== ""
  ) {
    validateInput();
    alert("Inscription réussite");
  } else {
    validateInput();
    alert("Vous devez renseigner les champs manquant");
    event.preventDefault();
  }
  //   event.preventDefault();
};

buttonLogin.onclick = function login(event) {
  if (emailLogin.value.trim() !== "" && passwordLogin.value.trim() !== "") {
    validateInputLogin();
    // alert("Connexion réussite");
  } else {
    validateInputLogin();
    alert("Vous devez renseigner les champs manquant");
    event.preventDefault();
  }
};

function onError(input, message) {
  parent = input.parentElement;
  let messageSmall = parent.querySelector("small");
  messageSmall.style.visibility = "visible";
  messageSmall.innerText = message;
  parent.classList.add("error");
  parent.classList.remove("success");
}
function onSuccess(input) {
  parent = input.parentElement;
  let messageSmall = parent.querySelector("small");
  messageSmall.style.visibility = "hidden";
  parent.classList.add("success");
  parent.classList.remove("error");
}
