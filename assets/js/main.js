/**
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1;
	var isOpera = navigator.userAgent.toLowerCase().indexOf('opera') > -1;
	var isIe = navigator.userAgent.toLowerCase().indexOf('msie') > -1;

	if ((isWebkit || isOpera || isIe) && document.getElementById && window.addEventListener) {
		window.addEventListener('hashchange', function () {
			var id = location.hash.substring(1);
			var	element;

			if (!(/^[A-z0-9_-]+$/.test(id))) {
				return;
			}

			element = document.getElementById(id);

			if (element) {
				if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false);
	}
})();

(function ($, sr) {
	'use strict';
	/* eslint-disable func-names */

	// Smartresize function from Paul Irish
	// http://www.paulirish.com/2009/throttled-smartresize-jquery-event-handler/
	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced() {
			var obj = this;
			var args = arguments;

			function delayed() {
				if (!execAsap) {
					func.apply(obj, args);
				}
				timeout = null;
			}

			if (timeout) {
				clearTimeout(timeout);
			} else if (execAsap) {
				func.apply(obj, args);
			}

			timeout = setTimeout(delayed, threshold || 100);
		};
	};
	// Smartresize
	jQuery.fn[sr] = function (fn) {
		return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
	};
})(jQuery, 'smartresize');

/*
 * Custom version of hoverintent v1.0.1
 * Tristen Forsythe Brown
 * https://github.com/tristen/hoverintent
 */
(function (global) {
	'use strict';
	/* global module */

	var hoverintent = function (el, over, out) {
		var x;
		var y;
		var pX;
		var pY;
		var h = {};
		var state = 0;
		var timer = 0;

		var options = {
			sensitivity: 7,
			interval: 200,
			timeout: 0
		};

		function delay(el, outEvent, e) {
			if (timer) {
				timer = clearTimeout(timer);
			}
			state = 0;
			return outEvent.call(el, e);
		}

		function dispatch(e, event, over) {
			var tracker = function (e) {
				x = e.clientX;
				y = e.clientY;
			};

			if (timer) {
				timer = clearTimeout(timer);
			}
			if (over) {
				pX = e.clientX;
				pY = e.clientY;
				el.addEventListener('mousemove', tracker, false);

				if (state !== 1) {
					timer = setTimeout(function () {
						compare(el, event, e);
					}, options.interval);
				}
			} else {
				el.removeEventListener('mousemove', tracker, false);

				if (state === 1) {
					timer = setTimeout(function () {
						delay(el, event, e);
					}, options.timeout);
				}
			}
			return this;
		}

		function compare(el, overEvent, e) {
			if (timer) {
				timer = clearTimeout(timer);
			}
			if ((Math.abs(pX - x) + Math.abs(pY - y)) < options.sensitivity) {
				state = 1;
				return overEvent.call(el, e);
			}
			pX = x;
			pY = y;
			timer = setTimeout(function () {
				compare(el, overEvent, e);
			}, options.interval);
		}

		function dispatchOver(e) {
			dispatch(e, over, true);
		}

		function dispatchOut(e) {
			dispatch(e, out);
		}

		h.remove = function () {
			if (!el) {
				return;
			}
			el.removeEventListener('mouseover', dispatchOver, false);
			el.removeEventListener('mouseout', dispatchOut, false);
		};

		if (el) {
			el.addEventListener('mouseover', dispatchOver, false);
			el.addEventListener('mouseout', dispatchOut, false);
		}

		return h;
	};

	global.hoverintent = hoverintent;
	if (typeof module !== 'undefined' && module.exports) {
		module.exports = hoverintent;
	}
})(this);

jQuery(function ($) {
	'use strict';
	/* global jQuery, hoverintent */
	/* eslint-disable no-negated-condition */

	var Main = {
		init: function () {
			this.documentClasses();
			this.navigation();
			this.backToTop();
			this.datepicker();
			this.toggleFilters();
			this.filtersPos();
		},

		viewport: function () {
			// Function that calculates the width of the screen.
			var e = window;
			var a = 'inner';

			if (!('innerWidth' in window)) {
				a = 'client';
				e = document.documentElement || document.body;
			}

			return {
				width: e[a + 'Width'],
				height: e[a + 'Height']
			};
		},

		documentClasses: function () {
			// Add the 'htl-mobile' class when the screen is less than 992.
			// Otherwise, add the 'htl-desktop' class.
			if (this.viewport().width < 992) {
				document.documentElement.className = document.documentElement.className.replace(' htl-desktop', '');

				if (document.documentElement.className.indexOf('htl-mobile') === -1) {
					document.documentElement.className += ' htl-mobile';
				}
			} else {
				document.documentElement.className = document.documentElement.className.replace(' htl-mobile', '');
				if (document.documentElement.className.indexOf('htl-desktop') === -1) {
					document.documentElement.className += ' htl-desktop';
				}
			}
		},

		navigation: function () {
			// Off canvas navigation
			var container;
			var button;
			var menu;
			var subMenus;
			var obfuscator;
			var closeButton;
			var divMenu;

			container = document.getElementById('site-navigation');
			if (!container) {
				return;
			}

			button = document.getElementById('menu-toggle');
			if (!button) {
				return;
			}

			menu = document.getElementById('primary-menu');

			// Hide menu toggle button if menu is empty and return early.
			if (!menu) {
				return;
			}

			divMenu = document.getElementById('primary-menu-container');

			// Create overlay.
			obfuscator = document.createElement('div');
			obfuscator.id = 'mobile-nav-obfuscator';

			// Create another button to close the mobile menu from the sidebar.
			closeButton = document.createElement('div');
			closeButton.id = 'close-mobile-menu';

			if (menu.className.indexOf('nav-menu') === -1) {
				menu.className += ' nav-menu';
			}

			button.addEventListener('click', function () {
				if (document.documentElement.className.indexOf('mobile-nav-open') !== -1) {
					close_menu();
				} else {
					open_menu();
				}
			});

			obfuscator.addEventListener('click', close_menu_listener);
			closeButton.addEventListener('click', close_menu_listener);

			// The listener attached to 'obfuscator' and 'closeButton' (closes the menu).
			function close_menu_listener() {
				if (document.documentElement.className.indexOf('mobile-nav-open') !== -1) {
					close_menu();
				}
			}

			// Open the off canvas menu.
			function open_menu() {
				document.documentElement.className += ' mobile-nav-open';
				document.documentElement.appendChild(obfuscator);
				divMenu.appendChild(closeButton);
			}

			// Close the off canvas menu.
			function close_menu() {
				document.documentElement.className = document.documentElement.className.replace(' mobile-nav-open', '');

				$(closeButton).remove();

				setTimeout(function () {
					$(obfuscator).remove();
				}, 200);
			}

			// Get all submenus.
			subMenus = menu.getElementsByTagName('ul');

			// Hoverintent on submenus to add a delay on mouseover.
			for (var i = 0, len = subMenus.length; i < len; i++) {
				// Toggle button
				var expandMenu = document.createElement('span');

				expandMenu.className += 'expand-submenu';
				// ExpandMenu.addEventListener('click', expand_submenu);
				subMenus[i].parentNode.appendChild(expandMenu);
				subMenus[i].parentNode.children[0].addEventListener('click', expand_submenu);

				// Hoverintent
				hoverintent(subMenus[i].parentNode,
					function () {
						this.className += ' hover';
					}, function () {
						this.className = this.className.replace(' hover', '');
					});
			}

			// The listener attached to each submenu button (expand/collapse the submenu).
			function expand_submenu(e) {
				if (!$('#masthead').hasClass('site-header--off-canvas-menu') && document.documentElement.className.indexOf('htl-desktop') !== -1) {
					return;
				}

				var _self = e.currentTarget;
				var _parent = _self.parentNode;

				if (_parent.className.indexOf('open') === -1) {
					e.preventDefault();
					_parent.className += ' open';
				}
			}

			// Close menu on resize and create the submenu toggles.
			$(window).smartresize(function () {
				close_menu();
			});

			// Append logo on off-canvas wrapper
			if ($('body').hasClass('off-canvas-show-logo')) {
				if (document.getElementById('site-logo-image')) {
					var cloned_logo = $('#site-logo-image').clone();
					cloned_logo.attr('id', 'site-logo-clone');
					$('#primary-menu-container').append(cloned_logo);
				}
			}
		},

		homeSlideshow: function () {
			var sliders = $('.flexslider--homepage');

			sliders.each(function () {
				var slides = $(this).find('.slides li');

				if (slides.length > 1) {
					$(this).flexslider({
						slideshowSpeed: $(this).data('speed'),
						animation: 'slide',
						easing: 'swing',
						smoothHeight: true,
						animationSpeed: 600,
						controlNav: false,
						directionNav: false,
						start: function (slider) {
							slider.parent().removeClass('loading');
							slider.find('.preloader').hide();
						}
					});
				} else {
					$(this).find('.homepage-slider__item').show();
					$(this).parent().removeClass('loading');
					$(this).find('.preloader').hide();
				}
			});
		},

		backToTop: function () {
			var didScroll = false;

			$(window).scroll(function () {
				didScroll = true;
			});

			setInterval(function () {
				if (didScroll) {
					didScroll = false;
					if ($(this).scrollTop() > 200) {
						$('#back-to-top').addClass('visible');
					} else {
						$('#back-to-top').removeClass('visible');
					}
				}
			}, 250);

			$('#back-to-top').click(function () {
				$('body,html').animate({
					scrollTop: 0
				}, 300);

				return false;
			});
		},

		datepicker: function () {
			var datepicker = document.getElementById('hotelier-datepicker');
			var headerBookButton = document.getElementById('header-book-button');

			if (!datepicker || !headerBookButton) {
				return;
			}

			$(headerBookButton).on('click', function (e) {
				e.preventDefault();

				var target = $(datepicker).offset().top - 150;

				$('html, body').stop().animate({
					scrollTop: target
				}, 600);
			});
		},

		toggleFilters: function () {
			var filter_label = $('.widget-rooms-filter__group-label');

			filter_label.addClass('open');

			filter_label.on('click', function () {
				var _this = $(this);
				var content = _this.next('ul');

				content.slideToggle('fast');
				_this.toggleClass('open');
			});
		},

		filtersPos: function () {
			// Append listing filters before the content
			var widget = $('.widget-rooms-filter').clone(true);

			widget.find('.widget-rooms-filter__group-label').removeClass('open');
			widget.find('ul').hide();
			widget.insertBefore('form.form--listing');
		}
	};

	Main.init();

	$(window).smartresize(function () {
		Main.documentClasses();
	});

	$(window).load(function () {
		Main.homeSlideshow();
	});
});
