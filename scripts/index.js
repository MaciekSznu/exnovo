"use strict";

/* BASE FUNCTIONS */
const click = (target, callback) => {
  target.addEventListener("click", (e) => {
    return callback(e);
  });
};

/* BURGER MENU */
const hamburgerButton = document.querySelector(".hamburger-wrapper");
const mainMenu = document.querySelector(".nav");

const showMainMenu = () => {
  mainMenu.classList.toggle("visible");
};

const hamburgerActive = () => {
  hamburgerButton.classList.toggle("hamburger-active");
};

hamburgerButton.addEventListener("click", (e) => {
  showMainMenu();
  hamburgerActive();
});

const menuItems = document.querySelectorAll(".nav-list--item-link");

menuItems.forEach((menuItem) => {
  menuItem.addEventListener("click", (e) => {
    showMainMenu();
    hamburgerActive();
  });
});

const menuItemsExpandable = document.querySelectorAll(".nav-list--item.expandable");
menuItemsExpandable.forEach((menuItemExpandable) => {
  menuItemExpandable.addEventListener("click", (e) => {
    e.preventDefault();
  });
});

const secondaryMenuItems = document.querySelectorAll(".nav-list--item.secondary");
secondaryMenuItems.forEach((secondaryMenuItem) => {
  secondaryMenuItem.addEventListener("click", (e) => {
    e.stopPropagation();
  });
});

/* INPUTS TYPE NUMBER */
const stepUp = (element, step) => {
  let el = document.querySelector(`[name="${element}"]`);
  el.value = parseInt(el.value) + step;
};

const stepDown = (element, step) => {
  let el = document.querySelector(`[name="${element}"]`);
  if (parseInt(el.value) > 0) {
    el.value = parseInt(el.value) - step;
  }
};

const stepUpButtons = document.querySelectorAll(".step-up");
const stepDownButtons = document.querySelectorAll(".step-down");

stepUpButtons.forEach((stepUpButton) => {
  stepUpButton.addEventListener("click", (e) => {
    let input;
    if (e.target.tagName === "div") {
      input = e.target.parentNode.querySelector("[type=number]");
    } else {
      input = e.target.parentNode.parentNode.querySelector("[type=number]");
    }
    input.value =
      input.value === "" ? 0 + parseInt(input.dataset.step) : parseInt(input.value) + parseInt(input.dataset.step);
  });
});

stepDownButtons.forEach((stepDownButton) => {
  stepDownButton.addEventListener("click", (e) => {
    let input;
    if (e.target.tagName === "div") {
      input = e.target.parentNode.querySelector("[type=number]");
    } else {
      input = e.target.parentNode.parentNode.querySelector("[type=number]");
    }

    if (input.value === "" || input.value == parseInt(input.min)) {
      input.value = parseInt(input.min);
    } else if (
      input.value >= parseInt(input.min) &&
      input.value <= parseInt(input.dataset.step) + parseInt(input.min)
    ) {
      input.value = parseInt(input.min);
    } else {
      input.value = parseInt(input.value) - parseInt(input.dataset.step);
    }
  });
});

/* CITIES BUTTONS */

const citiesButtons = document.querySelectorAll(".city-button");
const allCities = document.querySelector("#allCities");

const initSessionStorage = () => {
  let activeButton = sessionStorage.getItem("city");
  if (!activeButton) {
    activeButton = allCities;
    sessionStorage.setItem("city", allCities.id);
  }
};

citiesButtons.forEach((cityButton) => {
  cityButton.addEventListener("click", (e) => {
    let activeButton = sessionStorage.getItem("city");
    if (activeButton) {
      let newActiveButton = e.target.id;
      sessionStorage.setItem("city", newActiveButton);
    }
  });
});

document.addEventListener("DOMContentLoaded", (e) => {
  initSessionStorage();
  const presentActiveButtonId = sessionStorage.getItem("city");
  const setActiveButton = presentActiveButtonId
    ? document.getElementById(`${presentActiveButtonId}`)
    : document.getElementById(`${allCities}`);
  citiesButtons.forEach((cityButton) => {
    cityButton.classList.remove("selected");
  });
  setActiveButton.classList.add("selected");
});
