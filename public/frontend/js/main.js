/* # Homepage page script 1
 * 1.1 search box show
 * 1.2 search box show
 * 1.3 sub menu item show
 * 1.4 increment/decrement
 * 1.5 product color and size
 */

(function ($) {
    "use strict";

    // 1.1 header sticky
    // $(window).on('scroll', function () {
    //     var scroll = $(window).scrollTop();
    //     if (scroll < 245) {
    //         $(".header-sticky").removeClass("sticky");
    //     } else {
    //         $(".header-sticky").addClass("sticky");
    //     }
    // });


    // product page sidebar active
    $(".sidebar_filter_show").click(function () {
        $(".product-filter").addClass("sideBarActive");
    });
    $(".sidebar-close i").click(function () {
        $(".product-filter").removeClass("sideBarActive");
    });


    $(document).ready(function () {
        // 1.2 search box show
        $("#showForm").click(function () {
            $(".mobile-search-form").addClass("intro");
        });
        $(".mobile-search-bar-close").click(function () {
            $(".mobile-search-form").removeClass("intro");
        });



        $("#subMenuItemShow").click(function () {
            $("#menuMoreItems").addClass("showmenu");
            $('.offcanva-menu-overlay').addClass('info-open');
        });
        $("#navClose,.offcanva-menu-overlay").click(function () {
            $("#menuMoreItems").removeClass("showmenu");
            $('.offcanva-menu-overlay').removeClass('info-open');
        });
        // $("#navClose").click(function () {
        //     $("#menuMoreItems").removeClass("show-menu");
        // });

    });
    // $(document).on('click', '.minusCount', function () {
    //     var minus = $(".quantity__minus");
    //     let input = $(".quantity__input");
    //     minus.click(function (e) {
    //         e.preventDefault();
    //         var value = input.val();
    //         if (value > 1) {
    //             value--;
    //         }
    //         input.val(value);
    //     });
    // });

    // $(document).on('click', '.quantity__plus', function () {
    //     let plus = $(".quantity__plus");
    //     let input = $(".quantity__input");
    //     let max = $(".quantity__input").prop('max');
    //     // alert('hi');
    //     plus.click(function () {
    //         // e.preventDefault();
    //         let value = input.val();
    //         if (value < max) {
    //             value++
    //         }
    //         input.val(value);
    //     });
    // })

    function plusCount() {
        alert('hi');
        // var plus = $(".quantity__plus");
        // var input = $(".quantity__input");
        // plus.click(function (e) {
        //     e.preventDefault();
        //     var value = input.val();
        //     if (value < 5) {
        //         value++;
        //     }
        //     input.val(value);
        // });
    };


    //single product zoom with slider active
    $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        // autoplay
        "autoPlay": true,

        // autoplay interval in milliseconds
        "autoPlayTimeout": 7000

    });

    // magnific popup
    $('.popup').magnificPopup({
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
                '<div class="mfp-close"></div>' +
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                '</div>',

            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src',
        }
    });

    // product page sidebar active
    $(".sidebar_filter_show").click(function () {
        $(".product-filter").addClass("sideBarActive");
    });
    $(".sidebar-close i").click(function () {
        $(".product-filter").removeClass("sideBarActive");
    });






    $('.related-product-active').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplaySpeed: 3000,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    })




})(jQuery);
