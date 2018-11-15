(function() {
    "use strict";

    var x;

    var ramon = {

        settings: {
            win:        $(window),
            body:       $('body'),
            nav:        $('#nav'),
            menuButton: $('#menubutton'),
            allLinks:   $('a[href*=#]'),
            mainSlider: $('.carousel')
        },

        init: function() {
            x = this.settings;
            this.parallaxEffects();
            this.turnFooterToNav();
            this.scrollNavToTop();
            this.smoothScrolling();
            this.imageSlider();
            this.startWow();
        },

        // Parallax. Note the attributes: data-type="background" and data-speed in html
        parallaxEffects: function() {

            var speed;
            var diff;
            var yPos;
            var coords;
            
            (function ($) {

                $('.parallax-section').each(function () {
                    
                    var $el = $(this);
                    
                    x.win.scroll(function () {
                        updateBackground($el);
                    });
                    updateBackground($el);
                });

            }(jQuery));

            speed = 0.6;

            function updateBackground($el) {

                diff = x.win.scrollTop() - $el.offset().top;
                yPos = -(diff * speed);

                coords = '50% ' + yPos + 'px';

                $el.css({
                    backgroundPosition: coords
                });
            }
            
        },

        // when scrolling down, it turns the bottom nav into a top nav and locks it
        turnFooterToNav: function() {

            var navproxy = $('#navproxy');  
            var body     = $('body');
            var hero     = $('#hero');
            var winHeight;
            var navHeight;
            var winToTop;

            // put navbar at bottom, by setting height of topbanner
            function setupHero(event) {
                hero.height(x.win.height() - x.nav.height());
                navproxy.height(x.nav.outerHeight(true));
                // trigger scroll
                x.win.scroll();
            };

            // setup Hero
            setupHero();

            // On resize, setup toolbanner again
            x.win.on('resize', setupHero);

            // On scroll, check for fix navbar
            x.win.on('scroll', function () {

                winHeight = x.win.height();
                navHeight = x.nav.height();
                winToTop  = x.win.scrollTop();
                
                if (winToTop > winHeight - navHeight) {

                    x.nav.addClass("navbar-fixed-top");
                    navproxy.removeClass("hidden"); // fills the space normally occupied by navbar

                } 
                else {

                    x.nav.removeClass("navbar-fixed-top");
                    navproxy.addClass("hidden");

                }
            });     
        },

        // when you click the mobile nav button and the nav is not currently on
        // the top of the page, it sends the nav to the top.
        scrollNavToTop: function() {
            x.menuButton.on('click', function(){
                EPPZScrollTo.scrollVerticalToElementById('about', 20)
            });
        },

        smoothScrolling: function() {

            function filterPath(string) {
                return string
                .replace(/^\//,'')
                .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
                .replace(/\/$/,'');
            }

            var locationPath = filterPath(location.pathname);
            var scrollElem   = scrollableElement('html', 'body');

            $('a[href*=#]').each(function() {
                var thisPath = filterPath(this.pathname) || locationPath;
                if (locationPath == thisPath && (location.hostname == this.hostname || !this.hostname) && this.hash.replace(/#/,'')) {

                    var $target = $(this.hash), target = this.hash;

                    if (target) {
                        var targetOffset = $target.offset().top;

                        $(this).click(function(event) {
                            event.preventDefault();
                            
                            $(scrollElem).animate({scrollTop: targetOffset}, 400, function() {
                                location.hash = target;
                            });
                        });
                    }
                }
            });

            // use the first element that is "scrollable"
            function scrollableElement(els) {
                for (var i = 0, argLength = arguments.length; i <argLength; i++) {
                    
                    var el = arguments[i], $scrollElement = $(el);
                
                    if ($scrollElement.scrollTop()> 0) {
                        
                        return el;
                    } 
                    else {
                        
                        $scrollElement.scrollTop(1);
                        
                        var isScrollable = $scrollElement.scrollTop()> 0;
                        
                        $scrollElement.scrollTop(0);
                        
                        if (isScrollable) {
                            return el;
                        }
                    }
                }
                return [];
            }           
        },

        imageSlider: function() {
            x.mainSlider.carousel({
                interval: 5000,
                wrap: true,
                pause: "hover"
            });
        },

        startWow: function() {
            new WOW().init();
        } 
    }

    ramon.init();
}());