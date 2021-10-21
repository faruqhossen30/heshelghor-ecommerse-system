/**
 * Riode Main JavaScript File
 */
'use strict';

/**
 * Riode Object
 */
window.Riode = {};

/**
 * Riode Base
 */
(function ($) {

    /**
     * Get Scrollbar's Width
     * @return {number} width
     */
    Riode.getScrollbarWidth = function () {
        return window.innerWidth - document.body.clientWidth;
    }

    // Properties & Status
    Riode.$window = $(window);
    Riode.$body = $(document.body);
    Riode.status = '';
    // Riode.desktop_width = 992 - Riode.getScrollbarWidth();
    Riode.desktop_width = 992;

    // Detect Internet Explorer
    Riode.isIE = navigator.userAgent.indexOf("Trident") >= 0;
    // Detect Edge
    Riode.isEdge = navigator.userAgent.indexOf("Edge") >= 0;
    // Detect Mobile
    Riode.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    /**
     * Make a macro task
     * 
     * @param {function} fn
     * @param {number} delay
     */
    Riode.call = function (fn, delay) {
        setTimeout(fn, delay);
    }

    /**
     * Parse options string to object
     * @param {string} options
     * @return {object} options
     */
    Riode.parseOptions = function (options) {
        return 'string' == typeof options ?
            JSON.parse(options.replace(/'/g, '"').replace(';', '')) :
            {};
    }

    /**
     * Parse html template with variables.
     * @param {string} template
     * @param {object} vars
     * @return {string} parsed template
     */
    Riode.parseTemplate = function (template, vars) {
        return template.replace(/\{\{(\w+)\}\}/g, function () {
            return vars[arguments[1]];
        });
    }

    /**
     * Get dom element by id
     * @param {string} id
     * @return {HTMLElement} element
     */
    Riode.byId = function (id) {
        return document.getElementById(id);
    }

    /**
     * Get dom elements by tagName
     * @param {string} tagName
     * @param {HTMLElement} element this can be omitted.
     * @return {HTMLCollection}
     */
    Riode.byTag = function (tagName, element) {
        return element ?
            element.getElementsByTagName(tagName) :
            document.getElementsByTagName(tagName);
    }

    /**
     * Get dom elements by className
     * @param {string} className
     * @param {HTMLElement} element this can be omitted.
     * @return {HTMLCollection}
     */
    Riode.byClass = function (className, element) {
        return element ?
            element.getElementsByClassName(className) :
            document.getElementsByClassName(className);
    }

    /**
     * Set cookie
     * @param {string} name Cookie name
     * @param {string} value Cookie value
     * @param {number} exdays Expire period
     */
    Riode.setCookie = function (name, value, exdays) {
        var date = new Date();
        date.setTime(date.getTime() + (exdays * 24 * 60 * 60 * 1000));
        document.cookie = name + "=" + value + ";expires=" + date.toUTCString() + ";path=/";
    }

    /**
     * Get cookie
     * @param {string} name Cookie name
     * @return {string} Cookie value
     */
    Riode.getCookie = function (name) {
        var n = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; ++i) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(n) == 0) {
                return c.substring(n.length, c.length);
            }
        }
        return "";
    }

    /**
     * Get jQuery object
     * @param {string|jQuery} selector
     * @return {jQuery|Object} jQuery Object or {each: $.noop}
     */
    Riode.$ = function (selector) {
        if (selector instanceof jQuery) {
            return selector;
        }
        return $(selector);
    }
})(jQuery);
