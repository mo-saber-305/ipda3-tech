$(document).ready(function () {
    var clientSlider = $('#clients-slider'),
        navLink = $('.navbar-light .navbar-nav .nav-link');


    clientSlider.owlCarousel({
        rtl:true,
        dots: false,
        loop:true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    $('#works-slider').owlCarousel({

        rtl:true,
        loop:true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        margin:10,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    //add active class
    navLink.click(function () {
        $(this).parent().addClass('active').siblings().removeClass()
    });
});
