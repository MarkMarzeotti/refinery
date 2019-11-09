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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


__webpack_require__(1);

__webpack_require__(2);

__webpack_require__(3);

/***/ }),
/* 1 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


__webpack_require__(4);

__webpack_require__(5);

__webpack_require__(11);

(function ($) {
	$(document).ready(function () {});
})(jQuery);

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function () {
	var container, button, menu, links, i, len;

	container = document.getElementById('site-navigation');
	if (!container) {
		return;
	}

	button = container.getElementsByTagName('button')[0];
	if ('undefined' === typeof button) {
		return;
	}

	menu = container.getElementsByTagName('ul')[0];

	// Hide menu toggle button if menu is empty and return early.
	if ('undefined' === typeof menu) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute('aria-expanded', 'false');
	if (-1 === menu.className.indexOf('nav-menu')) {
		menu.className += ' nav-menu';
	}

	button.onclick = function () {
		if (-1 !== container.className.indexOf('toggled')) {
			container.className = container.className.replace(' toggled', '');
			button.setAttribute('aria-expanded', 'false');
			menu.setAttribute('aria-expanded', 'false');
		} else {
			container.className += ' toggled';
			button.setAttribute('aria-expanded', 'true');
			menu.setAttribute('aria-expanded', 'true');
		}
	};

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName('a');

	// Each time a menu link is focused or blurred, toggle focus.
	for (i = 0, len = links.length; i < len; i++) {
		links[i].addEventListener('focus', toggleFocus, true);
		links[i].addEventListener('blur', toggleFocus, true);
	}

	/**
  * Sets or removes .focus class on an element.
  */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while (-1 === self.className.indexOf('nav-menu')) {

			// On li elements toggle the class .focus.
			if ('li' === self.tagName.toLowerCase()) {
				if (-1 !== self.className.indexOf('focus')) {
					self.className = self.className.replace(' focus', '');
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
  * Toggles `focus` class to allow submenu access on tablets.
  */
	(function (container) {
		var touchStartFn,
		    i,
		    parentLink = container.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

		if ('ontouchstart' in window) {
			touchStartFn = function touchStartFn(e) {
				var menuItem = this.parentNode,
				    i;

				if (!menuItem.classList.contains('focus')) {
					e.preventDefault();
					for (i = 0; i < menuItem.parentNode.children.length; ++i) {
						if (menuItem === menuItem.parentNode.children[i]) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove('focus');
					}
					menuItem.classList.add('focus');
				} else {
					menuItem.classList.remove('focus');
				}
			};

			for (i = 0; i < parentLink.length; ++i) {
				parentLink[i].addEventListener('touchstart', touchStartFn, false);
			}
		}
	})(container);
})();

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
	var isIe = /(trident|msie)/i.test(navigator.userAgent);

	if (isIe && document.getElementById && window.addEventListener) {
		window.addEventListener('hashchange', function () {
			var id = location.hash.substring(1),
			    element;

			if (!/^[A-z0-9_-]+$/.test(id)) {
				return;
			}

			element = document.getElementById(id);

			if (element) {
				if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false);
	}
})();

/***/ }),
/* 6 */,
/* 7 */,
/* 8 */,
/* 9 */,
/* 10 */,
/* 11 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/*
*   This content is licensed according to the W3C Software License at
*   https://www.w3.org/Consortium/Legal/2015/copyright-software-and-document
*/
(function () {
	var tablist = document.querySelectorAll('[role="tablist"]')[0];
	var tabs;
	var panels;
	var delay = determineDelay();

	generateArrays();

	function generateArrays() {
		tabs = document.querySelectorAll('[role="tab"]');
		panels = document.querySelectorAll('[role="tabpanel"]');
	};

	// For easy reference
	var keys = {
		end: 35,
		home: 36,
		left: 37,
		up: 38,
		right: 39,
		down: 40,
		delete: 46
	};

	// Add or substract depending on key pressed
	var direction = {
		37: -1,
		38: -1,
		39: 1,
		40: 1
	};

	// Bind listeners
	for (var i = 0; i < tabs.length; ++i) {
		addListeners(i);
	};

	function addListeners(index) {
		tabs[index].addEventListener('click', clickEventListener);
		tabs[index].addEventListener('keydown', keydownEventListener);
		tabs[index].addEventListener('keyup', keyupEventListener);

		// Build an array with all tabs (<button>s) in it
		tabs[index].index = index;
	};

	// When a tab is clicked, activateTab is fired to activate it
	function clickEventListener(event) {
		var tab = event.target;
		activateTab(tab, false);
	};

	// Handle keydown on tabs
	function keydownEventListener(event) {
		var key = event.keyCode;

		switch (key) {
			case keys.end:
				event.preventDefault();
				// Activate last tab
				activateTab(tabs[tabs.length - 1]);
				break;
			case keys.home:
				event.preventDefault();
				// Activate first tab
				activateTab(tabs[0]);
				break;

			// Up and down are in keydown
			// because we need to prevent page scroll >:)
			case keys.up:
			case keys.down:
				determineOrientation(event);
				break;
		};
	};

	// Handle keyup on tabs
	function keyupEventListener(event) {
		var key = event.keyCode;

		switch (key) {
			case keys.left:
			case keys.right:
				determineOrientation(event);
				break;
			case keys.delete:
				determineDeletable(event);
				break;
		};
	};

	// When a tablistâ€™s aria-orientation is set to vertical,
	// only up and down arrow should function.
	// In all other cases only left and right arrow function.
	function determineOrientation(event) {
		var key = event.keyCode;
		var vertical = tablist.getAttribute('aria-orientation') == 'vertical';
		var proceed = false;

		if (vertical) {
			if (key === keys.up || key === keys.down) {
				event.preventDefault();
				proceed = true;
			};
		} else {
			if (key === keys.left || key === keys.right) {
				proceed = true;
			};
		};

		if (proceed) {
			switchTabOnArrowPress(event);
		};
	};

	// Either focus the next, previous, first, or last tab
	// depening on key pressed
	function switchTabOnArrowPress(event) {
		var pressed = event.keyCode;

		for (x = 0; x < tabs.length; x++) {
			tabs[x].addEventListener('focus', focusEventHandler);
		};

		if (direction[pressed]) {
			var target = event.target;
			if (target.index !== undefined) {
				if (tabs[target.index + direction[pressed]]) {
					tabs[target.index + direction[pressed]].focus();
				} else if (pressed === keys.left || pressed === keys.up) {
					focusLastTab();
				} else if (pressed === keys.right || pressed == keys.down) {
					focusFirstTab();
				};
			};
		};
	};

	// Activates any given tab panel
	function activateTab(tab, setFocus) {
		setFocus = setFocus || true;
		// Deactivate all other tabs
		deactivateTabs();

		// Remove tabindex attribute
		tab.removeAttribute('tabindex');

		// Set the tab as selected
		tab.setAttribute('aria-selected', 'true');

		// Get the value of aria-controls (which is an ID)
		var controls = tab.getAttribute('aria-controls');

		// Remove hidden attribute from tab panel to make it visible
		document.getElementById(controls).removeAttribute('hidden');

		// Set focus when required
		if (setFocus) {
			tab.focus();
		};
	};

	// Deactivate all tabs and tab panels
	function deactivateTabs() {
		for (var t = 0; t < tabs.length; t++) {
			tabs[t].setAttribute('tabindex', '-1');
			tabs[t].setAttribute('aria-selected', 'false');
			tabs[t].removeEventListener('focus', focusEventHandler);
		};

		for (var p = 0; p < panels.length; p++) {
			panels[p].setAttribute('hidden', 'hidden');
		};
	};

	// Make a guess
	function focusFirstTab() {
		tabs[0].focus();
	};

	// Make a guess
	function focusLastTab() {
		tabs[tabs.length - 1].focus();
	};

	// Detect if a tab is deletable
	function determineDeletable(event) {
		target = event.target;

		if (target.getAttribute('data-deletable') !== null) {
			// Delete target tab
			deleteTab(event, target);

			// Update arrays related to tabs widget
			generateArrays();

			// Activate the closest tab to the one that was just deleted
			if (target.index - 1 < 0) {
				activateTab(tabs[0]);
			} else {
				activateTab(tabs[target.index - 1]);
			};
		};
	};

	// Deletes a tab and its panel
	function deleteTab(event) {
		var target = event.target;
		var panel = document.getElementById(target.getAttribute('aria-controls'));

		target.parentElement.removeChild(target);
		panel.parentElement.removeChild(panel);
	};

	// Determine whether there should be a delay
	// when user navigates with the arrow keys
	function determineDelay() {
		var hasDelay = tablist.hasAttribute('data-delay');
		var delay = 0;

		if (hasDelay) {
			var delayValue = tablist.getAttribute('data-delay');
			if (delayValue) {
				delay = delayValue;
			} else {
				// If no value is specified, default to 300ms
				delay = 300;
			};
		};

		return delay;
	};

	//
	function focusEventHandler(event) {
		var target = event.target;

		setTimeout(checkTabFocus, delay, target);
	};

	// Only activate tab on focus if it still has focus after the delay
	function checkTabFocus(target) {
		focused = document.activeElement;

		if (target === focused) {
			activateTab(target, false);
		};
	};
})();

/***/ })
/******/ ]);
//# sourceMappingURL=app.js.map