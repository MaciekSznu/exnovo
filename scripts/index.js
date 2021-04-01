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
