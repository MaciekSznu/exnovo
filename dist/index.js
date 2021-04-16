/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./scripts/index.js":
/*!**************************!*\
  !*** ./scripts/index.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

/* BASE FUNCTIONS */

var click = function click(target, callback) {
  target.addEventListener("click", function (e) {
    return callback(e);
  });
};
/* BURGER MENU */


var hamburgerButton = document.querySelector(".hamburger-wrapper");
var mainMenu = document.querySelector(".nav");

var showMainMenu = function showMainMenu() {
  mainMenu.classList.toggle("visible");
};

var hamburgerActive = function hamburgerActive() {
  hamburgerButton.classList.toggle("hamburger-active");
};

hamburgerButton.addEventListener("click", function (e) {
  showMainMenu();
  hamburgerActive();
});
var menuItems = document.querySelectorAll(".nav-list--item-link");
menuItems.forEach(function (menuItem) {
  menuItem.addEventListener("click", function (e) {
    showMainMenu();
    hamburgerActive();
  });
});
var menuItemsExpandable = document.querySelectorAll(".nav-list--item.expandable");
menuItemsExpandable.forEach(function (menuItemExpandable) {
  menuItemExpandable.addEventListener("click", function (e) {
    e.preventDefault();
  });
});
var secondaryMenuItems = document.querySelectorAll(".nav-list--item.secondary");
secondaryMenuItems.forEach(function (secondaryMenuItem) {
  secondaryMenuItem.addEventListener("click", function (e) {
    e.stopPropagation();
  });
}); // INPUTS TYPE NUMBER

var stepUp = function stepUp(element, step) {
  var el = document.querySelector("[name=\"".concat(element, "\"]"));
  el.value = parseInt(el.value) + step;
};

var stepDown = function stepDown(element, step) {
  var el = document.querySelector("[name=\"".concat(element, "\"]"));

  if (parseInt(el.value) > 0) {
    el.value = parseInt(el.value) - step;
  }
};

var stepUpButtons = document.querySelectorAll(".step-up");
var stepDownButtons = document.querySelectorAll(".step-down");
stepUpButtons.forEach(function (stepUpButton) {
  stepUpButton.addEventListener("click", function (e) {
    var input;

    if (e.target.tagName === "div") {
      input = e.target.parentNode.querySelector("[type=number]");
    } else {
      input = e.target.parentNode.parentNode.querySelector("[type=number]");
    }

    input.value = input.value === "" ? 0 + parseInt(input.dataset.step) : parseInt(input.value) + parseInt(input.dataset.step);
  });
});
stepDownButtons.forEach(function (stepDownButton) {
  stepDownButton.addEventListener("click", function (e) {
    var input;

    if (e.target.tagName === "div") {
      input = e.target.parentNode.querySelector("[type=number]");
    } else {
      input = e.target.parentNode.parentNode.querySelector("[type=number]");
    }

    if (input.value === "" || input.value == parseInt(input.min)) {
      input.value = parseInt(input.min);
    } else if (input.value >= parseInt(input.min) && input.value <= parseInt(input.dataset.step) + parseInt(input.min)) {
      input.value = parseInt(input.min);
    } else {
      input.value = parseInt(input.value) - parseInt(input.dataset.step);
    }
  });
});

/***/ }),

/***/ "./styles/blog/blog.scss":
/*!*******************************!*\
  !*** ./styles/blog/blog.scss ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/home/style.scss":
/*!********************************!*\
  !*** ./styles/home/style.scss ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/kontakt/kontakt.scss":
/*!*************************************!*\
  !*** ./styles/kontakt/kontakt.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/kredyty/kredyty.scss":
/*!*************************************!*\
  !*** ./styles/kredyty/kredyty.scss ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/o-nas/o-nas.scss":
/*!*********************************!*\
  !*** ./styles/o-nas/o-nas.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/oferty/oferty.scss":
/*!***********************************!*\
  !*** ./styles/oferty/oferty.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/pierwotny/pierwotny.scss":
/*!*****************************************!*\
  !*** ./styles/pierwotny/pierwotny.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/single-blog/single-blog.scss":
/*!*********************************************!*\
  !*** ./styles/single-blog/single-blog.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/single-offer/single-offer.scss":
/*!***********************************************!*\
  !*** ./styles/single-offer/single-offer.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/single-pierwotny/single-pierwotny.scss":
/*!*******************************************************!*\
  !*** ./styles/single-pierwotny/single-pierwotny.scss ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/specjalista/specjalista.scss":
/*!*********************************************!*\
  !*** ./styles/specjalista/specjalista.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./styles/uslugi/uslugi.scss":
/*!***********************************!*\
  !*** ./styles/uslugi/uslugi.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./scripts/index.js ./styles/home/style.scss ./styles/o-nas/o-nas.scss ./styles/kredyty/kredyty.scss ./styles/uslugi/uslugi.scss ./styles/oferty/oferty.scss ./styles/pierwotny/pierwotny.scss ./styles/single-pierwotny/single-pierwotny.scss ./styles/single-blog/single-blog.scss ./styles/single-offer/single-offer.scss ./styles/blog/blog.scss ./styles/kontakt/kontakt.scss ./styles/specjalista/specjalista.scss ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\scripts\index.js */"./scripts/index.js");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\home\style.scss */"./styles/home/style.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\o-nas\o-nas.scss */"./styles/o-nas/o-nas.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\kredyty\kredyty.scss */"./styles/kredyty/kredyty.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\uslugi\uslugi.scss */"./styles/uslugi/uslugi.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\oferty\oferty.scss */"./styles/oferty/oferty.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\pierwotny\pierwotny.scss */"./styles/pierwotny/pierwotny.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\single-pierwotny\single-pierwotny.scss */"./styles/single-pierwotny/single-pierwotny.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\single-blog\single-blog.scss */"./styles/single-blog/single-blog.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\single-offer\single-offer.scss */"./styles/single-offer/single-offer.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\blog\blog.scss */"./styles/blog/blog.scss");
__webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\kontakt\kontakt.scss */"./styles/kontakt/kontakt.scss");
module.exports = __webpack_require__(/*! C:\Wordpress\Xampp\htdocs\exnovo_clone\wp-content\themes\exnovo\styles\specjalista\specjalista.scss */"./styles/specjalista/specjalista.scss");


/***/ })

/******/ });