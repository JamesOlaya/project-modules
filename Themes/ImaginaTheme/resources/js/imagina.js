$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /* header */
    if ($(".header-top").length > 0) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 55) {
                $('header .header-top').addClass('fixed-top');
            } else {
                $('header .header-top').removeClass('fixed-top');
            }
        });
    }

})

window.owlCarousel = require('owl.carousel');
