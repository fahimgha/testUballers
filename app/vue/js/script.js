let secondName = document.getElementById("signup-secondname");
let firstName = document.getElementById("signup-firstname");
let email = document.getElementById("signup-email");
let confirmEmail = document.getElementById("signup-confirm-email");
let password = document.getElementById("signup-password");
let form = document.getElementById("form");

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
  if (email.value.trim() === "") {
    onError(email, "Le mail ne peut pas être vide");
  } else {
    onSuccess(email);
  }
  if (confirmEmail.value.trim() !== email.value) {
    onError(confirmEmail, "Vous devez confirmer votre mail");
  } else {
    onSuccess(confirmEmail);
  }
  if (password.value.trim() === "") {
    onError(password, "Le mot de passe ne peut pas être vide");
  } else {
    onSuccess(password);
  }
}
//sign up success
function submit() {
  console.log("test");
  if (
    secondName.value.trim() !== "" &&
    firstName.value.trim() !== "" &&
    email.value.trim() !== "" &&
    confirmEmail.value.trim() == email.value &&
    password.value.trim() !== ""
  ) {
    console.log("Inscription réussite");
  } else {
    console.log("Vous devez renseigner les champs manquant");
  }
}

document.addEventListener("click", () => {
  //event.preventDefault();
  validateInput();
});

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
