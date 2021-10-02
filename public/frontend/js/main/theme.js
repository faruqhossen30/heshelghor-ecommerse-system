/**
 * Riode Theme
 */
(function ($) {

    // Initialize Method while document is being loaded.
    Riode.prepare = function () {
        Riode.$body.hasClass('with-flex-container') && window.innerWidth >= 1200 &&
            Riode.$body.addClass('sidebar-active');
    };

    // Initialize Method while document is interactive
    Riode.initLayout = function () {
        Riode.isotopes('.grid:not(.grid-float)');
        Riode.stickySidebar('.sticky-sidebar');
    }

    // Initialize Method after document has been loaded
    Riode.init = function () {
        Riode.appearAnimate('.appear-animate');            // Runs appear animations
        Riode.minipopup.init();                            // Initialize minipopup
        Riode.shop.init();                                 // Initialize shop
        Riode.productSinglePage.init();                    // Initialize single product page
        Riode.slider('.owl-carousel');                     // Initialize slider
        Riode.headerToggleSearch('.hs-toggle');            // Initialize header toggle search
        Riode.stickyContent('.product-sticky-content, .sticky-header');            // Initialize sticky content
        Riode.stickyContent('.sticky-footer', {
            minWidth: 0,
            maxWidth: 767,
            top: 150,
            hide: true,
            max_index: 2100
        });
        Riode.sidebar('sidebar');                          // Initialize left sidebar
        Riode.sidebar('right-sidebar');                    // Initialize right sidebar
        Riode.quantityInput('.quantity');                  // Initialize quantity input
        Riode.playableVideo('.post-video');                // Initialize playable video
        Riode.accordion('.card-header > a');               // Initialize accordion
        Riode.tab('.nav-tabs');                            // Initialize tab
        Riode.alert('.alert');                             // Initialize alert
        Riode.parallax('.parallax');                       // Initialize parallax
        Riode.countTo('.count-to');                        // Initialize countTo
        Riode.countdown('.product-countdown, .countdown'); // Initialize countdown
        Riode.menu.init();                                 // Initialize menus
        Riode.initNavFilter('.nav-filters .nav-filter');   // Initialize navigation filters for blog, products
        Riode.initPopups();                                // Initialize popups: login, register, play video, newsletter popup
        Riode.initPurchasedMinipopup();                    // Initialize minipopup for purchased event
        Riode.initScrollTopButton();                       // Initialize scroll top button.

        // if Docs plugins is included, init it
        Riode.docs && Riode.docs.init();

        // Setup Events
        Riode.$window.on('resize', Riode.onResize);
    }

    Riode.onResize = function () {
        // refresh zoom images.
        Riode.zoomImageOnResize();
    }
})(jQuery);

/**
 * Riode Theme Initializer
 */
(function ($) {
    'use strict';

    // Prepare Riode Theme
    Riode.prepare();

    // Initialize Riode Theme
    document.onreadystatechange = function () {
        if (document.readyState === "complete") {
        }
    }
    window.onload = function () {
        // loaded
        Riode.status = 'loaded';
        document.body.classList.add('loaded');
        Riode.status = 'complete';

        Riode.call(Riode.initLayout);
        Riode.call(Riode.init);
    }
})(jQuery);

