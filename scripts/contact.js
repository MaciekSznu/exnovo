"use strict";

/* FORM VALIDATION */
const inputName = document.querySelector("#input-name");
const inputEmail = document.querySelector("#input-email");
const inputPhone = document.querySelector("#input-phone");
const checkbox_01 = document.querySelector("#rodo-01");
const checkbox_02 = document.querySelector("#rodo-02");
const submitButton = document.querySelector(".contact-form--input-submit");
const contactForm = document.querySelector("#contact-form");

const emailRegEx = /\S+@\S+\.\S+/;
const phoneRegEx = /^(?:\(?\?)?(?:[-\.\(\)\s]*(\d)){9}\)?$/;

if (contactForm !== null && contactForm !== undefined) {
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
    if (!checkbox_01.checked) {
      checkbox_01.parentNode.classList.add("incorrect");
      errors.push("checkbox_01 error");
    } else {
      checkbox_01.parentNode.classList.remove("incorrect");
    }
    if (!checkbox_02.checked) {
      checkbox_02.parentNode.classList.add("incorrect");
      errors.push("checkbox_02 error");
    } else {
      checkbox_02.parentNode.classList.remove("incorrect");
    }
    if (errors.length > 0) {
      e.preventDefault();
    }
  });
}
