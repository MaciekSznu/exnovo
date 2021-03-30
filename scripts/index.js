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

const secondaryMenus = document.querySelectorAll(".nav-list--secondary");

const showSecondaryMenus = () => {
  menuItemExpandable.classList.toggle("expanded");
};

menuItemsExpandable.forEach((menuItemExpandable) => {
  menuItemExpandable.addEventListener("click", (e) => {
    e.preventDefault();
    menuItemExpandable.classList.toggle("expanded");
  });
});

const desktopMenuItemsExpandable = document.querySelectorAll(".nav-desktop-list--item.expandable");

const desktopSecondaryMenus = document.querySelectorAll(".nav-desktop-list--secondary");

const showDesktopSecondaryMenus = () => {
  menuItemExpandable.classList.toggle("expanded");
};

desktopMenuItemsExpandable.forEach((desktopMenuItemExpandable) => {
  desktopMenuItemExpandable.addEventListener("click", (e) => {
    e.preventDefault();
    desktopMenuItemExpandable.classList.toggle("expanded");
  });
});

// secondaryMenus.forEach((secondaryMenu) => {
//   secondaryMenu.addEventListener("click", (e) => {
//     e.stopPropagation();
//     secondaryMenu.classList.toggle("expanded");
//   });
// });

// navigation AOS
// const nav = document.querySelector(".nav");
// const windowWidth = window.innerWidth;

// window.document.addEventListener('DOMContentLoaded', () => {
//   windowWidth >= 1280 ? nav.dataset.aos = 'fade-down' : nav.dataset.aos = '';
// });

// window.addEventListener('resize', (e) => {

//   windowWidth >= 1280 ? nav.dataset.aos = 'fade-down' : nav.dataset.aos = '';

// })
