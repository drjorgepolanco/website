$(document).ready(function($) {

    var $breakpoint    = 1024; // same breakpoint as in css
    var $mainNav       = $('#main-nav');
    var $cartTrigger   = $('#cart-trigger');
    var $hamburgerMenu = $('#hamburger-menu');
    var $hamburgerIcon = $('#hamburger-icon');
    var $hamburgerCopy = $('#hamburger-copy');
    var $cart          = $('#cart');
    var $shadowLayer   = $('#shadow-layer');
    var $body          = $('body');

    // open lateral menu
    $hamburgerMenu.on('click', function(e) {
        e.preventDefault();
        // close cart if open
        $cart.removeClass('open');
        togglePanelVisibility($mainNav, $shadowLayer, $body);
        toggleNavIcon($mainNav, $hamburgerIcon, $hamburgerCopy);
    });

    // open cart
    $cartTrigger.on('click', function(e) {
        e.preventDefault();
        // close main navigation if open
        $mainNav.removeClass('open');
        togglePanelVisibility($cart, $shadowLayer, $body);
        toggleNavIcon($mainNav, $hamburgerIcon, $hamburgerCopy);
    });

    // close cart or menu
    $shadowLayer.on('click', function() {

        $shadowLayer.removeClass('is-visible');

        // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if ($cart.hasClass('open')) {
            
            $cart.removeClass('open').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                $body.removeClass('hide-overflow');
            });
            $mainNav.removeClass('open'); 
        }
        else {

            $mainNav.removeClass('open').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                $body.removeClass('hide-overflow');
            });
            $cart.removeClass('open');
            toggleNavIcon($mainNav, $hamburgerIcon, $hamburgerCopy);
            // $hamburgerIcon.attr('src', 'assets/img/home/navigation-icon-22x14.png');
            // $hamburgerCopy.html('Menu');
        }
    });

    // // move $mainNav inside header on laptop
    // // insert $mainNav after header on mobile
    // moveNavigation($mainNav, $breakpoint);

    // $(window).on('resize', function() {

    //     moveNavigation($mainNav, $breakpoint);

    //     if ($(window).width() >= $breakpoint && $mainNav.hasClass('open')) {

    //         $mainNav.removeClass('open');
    //         $shadowLayer.removeClass('is-visible');
    //         $body.removeClass('hide-overflow');
    //     }
    // });
    
    $('.products-slider').bxSlider({
        slideWidth: 300,
        minSlides: 1,
        maxSlides: 9,
        slideMargin: 10,
        nextSelector: '#we-suggest-next',
        prevSelector: '#we-suggest-prev',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>',
        touchEnabled: true,
        swipeThreshold: 50,
        moveSlides: 1
    });

    $('.testimonials-list').slick({
      dots: false,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      autoplay: true
    });
});

function toggleNavIcon($mainNav, $hamburgerIcon, $hamburgerCopy) {

    if ($mainNav.hasClass('open')) {
        $hamburgerIcon.attr('src', 'assets/img/home/coupon-close.png');
        $hamburgerCopy.html('Close');
    }
    else {
        $hamburgerIcon.attr('src', 'assets/img/home/navigation-icon.png');
        $hamburgerCopy.html('Menu');            
    }
}

function togglePanelVisibility($panel, $bgLayer, $body) {

    if ($panel.hasClass('open')) {

        $panel.removeClass('open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
            $body.removeClass('hide-overflow');
        });

        $bgLayer.removeClass('is-visible');
    }
    else {

        $panel.addClass('open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
            $body.addClass('hide-overflow');
        });

        $bgLayer.addClass('is-visible');
    }
}

function moveNavigation($navigation, $breakpoint) {
    
    if ($(window).width() >= $breakpoint) {

        $navigation.detach();
        $navigation.appendTo('header');
    }
    else {

        $navigation.detach();
        $navigation.insertAfter('header');
    }
}

