"use strict";

/* FORM VALIDATION */
const inputName = document.querySelector("#input-name");
const inputEmail = document.querySelector("#input-email");
const inputPhone = document.querySelector("#input-phone");
const contactForm = document.querySelector("#contact-form");
const emailRegEx = /\S+@\S+\.\S+/;
const phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

contactForm.addEventListener("submit", (e) => {
  let errors = [];
  if (inputName.value.trim() == "" || inputName.value == null) {
    inputName.parentNode.classList.add("incorrect");
    errors.push("name error");
  } else {
    inputName.parentNode.classList.remove("incorrect");
  }
  if (!emailRegEx.test(inputEmail.value)) {
    inputEmail.parentNode.classList.add("incorrect");
    errors.push("mail error");
  } else {
    inputEmail.parentNode.classList.remove("incorrect");
  }
  if (!phoneRegEx.test(inputPhone.value)) {
    inputPhone.parentNode.classList.add("incorrect");
    errors.push("phone error");
  } else {
    inputPhone.parentNode.classList.remove("incorrect");
  }
  if (errors.length > 0) {
    e.preventDefault();
  }
});
