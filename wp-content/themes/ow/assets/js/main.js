/* ========================================================================== */
/* SCROLL RELATED FUNCTIONS */
/* ======================== */

var scrollRelated = (function() {
    'use strict';

    return {
        scrollBackToTop: function($trigger, callback, speed) {
            var speed = speed ? speed : 300;

            $trigger.on('click', function(event) {
                event.preventDefault();
                $('body, html').animate({ scrollTop: 0 }, speed, callback);
            });
        },
        scrollSmooth: function($trigger, speed) {
            var speed = speed ? speed : 300;
            var theOffset;
            var hash, headerHeight;
            
            // Add smooth scrolling to all links
            $trigger.on('click', function(event) {
                

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    hash = this.hash;
                    headerHeight = $('.site-header').outerHeight(true)

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        // scrollTop: $(hash).offset().top - $('.site-header').outerHeight(true)
                        scrollTop: $(hash).offset().top - headerHeight
                    }, 800, function(){
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });

                } // End if
            });
            window.addEventListener("hashchange", function () {
                window.scrollTo(window.scrollX, window.scrollY - headerHeight);
            });
        },
        scrollSpy: function($menu, speed) {
            var speed = speed ? speed : 300;

            // Cache selectors
            var lastId;
            var menuHeight = $menu.outerHeight() + 15;
            
            // All list items
            var menuItems = $menu.find('.ow-nav-item-link');
            
            // Anchors corresponding to menu items
            var scrollItems = menuItems.map(function() {
                var item = $($(this).attr("href"));

                if (item.length) { return item; }
            });

            // Bind click handler to menu items so we can get a fancy scroll animation
            menuItems.click(function(e) {
                e.preventDefault();
                var href      = $(this).attr("href");
                var offsetTop = href === "#" ? 0 : $(href).offset().top - menuHeight + 1;

                $('html, body').stop().animate({ scrollTop: offsetTop }, speed);
            });

            // Bind to scroll
            $(window).scroll(function() {
                // Get container scroll position
                var fromTop = $(this).scrollTop() + menuHeight;

                // Get id of current scroll item
                var cur = scrollItems.map(function() {
                    if ($(this).offset().top < fromTop) {
                        return this;
                    }
                });

                // Get the id of the current element
                cur    = cur[cur.length - 1];
                var id = cur && cur.length ? cur[0].id : "";

                if (lastId !== id) {
                    lastId = id;

                    // Set/remove active class
                    menuItems.parent().removeClass("active").end().filter("[href='#" + id + "']").parent().addClass("active");
                } 
            });
        },
    }
})();

/* Handlers */
var scrollRelatedHandlers = (function($) {
    'use strict';

    var ow;
    var functions = {
        settings: {

            /* Scroll Back to Top */
            backToTopTrigger: $('#ow-back-to-top'),
            scrollBackToTop: scrollRelated.scrollBackToTop.bind(scrollRelated),

            /* Scroll Spy */
            navList: $('.ow-nav-list'),
            scrollSpy: scrollRelated.scrollSpy.bind(scrollRelated),

            /* Scroll Smooth */
            navLink: $('.ow-nav a[href^="#"], .ow-anchor-link'),
            scrollSmooth: scrollRelated.scrollSmooth.bind(scrollRelated),            
        },
        init: function() {
            ow = this.settings;
            this.scrollBackToTopHandler();
            this.scrollSmoothHandler();
            this.scrollSpyHandler();        
        },
        scrollBackToTopHandler: function() {
            ow.scrollBackToTop(ow.backToTopTrigger);
        },
        scrollSmoothHandler: function() {
            ow.scrollSmooth(ow.navLink);
        },
        scrollSpyHandler: function() {
            ow.scrollSpy(ow.navList);
        }
    }
    functions.init();
});



/* ========================================================================== */
/* UI COMPONENTS */
/* ============= */

var uiComponents = (function($) {
    'use strict';

    return {
        accordions: function($trigger) {
            var self, $item, $ctnt;

            $trigger.on('click', function(event) {
                event.preventDefault();

                self     = $(this);
                $item    = self.closest('.ow-item');
                $ctnt = $item.find('.ow-ctnt');

                if ($item.hasClass('active')) {
                    $item.removeClass('active');
                    $ctnt.slideUp();
                }
                else {
                    $item.addClass('active');
                    $ctnt.slideDown();
                }
                return false;
            });
        },
        tabs: function($trigger) {
            var self, $tabs, $triggerWrap, tab;

            $('.ow-tab-0').addClass('active');

            initContentMenuHeight();
            $(window).on('resize', function() {
                initContentMenuHeight();
            });

            $trigger.on('click', function(event) {
                event.preventDefault();

                self         = $(this);
                $tabs        = self.closest('.ow-tabs');
                $triggerWrap = self.closest('li');
                tab          = self.attr('href');

                $triggerWrap.addClass('active');
                $triggerWrap.siblings().removeClass('active');
                $tabs.find('.ow-tab-ctnt').removeClass('active').not(tab).hide();
                $tabs.find(tab).fadeIn('slow').addClass('active');
            });

            function initContentMenuHeight() {
                calcContentSpaceByMenuHeight('top');
                calcContentSpaceByMenuHeight('bottom');
                calcContentSpaceByMenuHeight('left');
                calcContentSpaceByMenuHeight('right');     
            }
            function calcContentSpaceByMenuHeight(pos) {
                var prop     = 'padding-' + pos;
                var $tabs    = '.ow-put-menu-' + pos;

                if ((pos === 'top') || (pos === 'bottom')) {

                    var height = $($tabs).find('.ow-menu').height();
                    var $ctnt  = $($tabs).find('.ow-ctnt').css(prop, height + 'px');
                }
                if ((pos === 'left') || (pos === 'right')) {
                    var width  = $($tabs).find('.ow-menu').width();
                    var $ctnt  = $($tabs).find('.ow-ctnt').css(prop, width + 'px');
                }
            }
        },
        toolTips: function($trigger) {
            var self;

            $trigger.on('click', function(event) {
                event.preventDefault();

                self = $(this);
                if (self.parent().hasClass('active')) {
                    $trigger.parent().removeClass('active');
                }
                else {
                    $trigger.parent().removeClass('active');
                    self.parent().addClass('active');
                }
            });
        },
        imgSlider: function(slider, transition) {
            var imgSlider = {
                slider: $(slider).data('name'), 
                sliderId: $('#' + $(slider).data('name')),
                slides: '.ow-slide',
                transition: transition || 3000,
                currentIndex: 0,
                interval: undefined,
                slideCount: function() {
                    return this.sliderId.find(this.slides).length;
                },
                makeFirstSlideActive: function() {
                    this.sliderId.find(this.slides).first().addClass('active');
                },
                moveItems: function() {
                    var slideItems = this.sliderId.find(this.slides);
                    var currentSlide = slideItems.eq(this.currentIndex);
                    slideItems.removeClass('active');
                    currentSlide.addClass('active');
                },
                moveOne: function() {
                    var thisObject = this;
                    if (this.currentIndex > this.slideCount() - 1) {
                        thisObject.currentIndex = 0;
                    }
                    this.moveItems();
                },
                autoSlide: function() {
                    var thisObject = this;
                    this.interval = window.setInterval(function() {
                        thisObject.currentIndex++;
                        thisObject.moveOne();
                    }, thisObject.transition);
                },
                moveToNext: function() {
                    var thisObject = this;
                    var nextItem = this.sliderId.find('.ow-next');
                    nextItem.on('click', function(e) {
                        e.preventDefault();
                        window.clearInterval(thisObject.interval);
                        thisObject.currentIndex++;
                        thisObject.moveOne();              
                    });
                },
                moveToPrev: function() {
                    var thisObject = this;
                    var prevItem = this.sliderId.find('.ow-prev');
                    prevItem.on('click', function(e) {
                        e.preventDefault();
                        window.clearInterval(thisObject.interval);
                        thisObject.currentIndex--;
                        if (thisObject.currentIndex < 0) {
                            thisObject.currentIndex = thisObject.slideCount() - 1;
                        }
                        thisObject.moveItems();                
                    });
                }   
            }
            var init = function() {
                imgSlider.makeFirstSlideActive();
                imgSlider.moveItems();
                imgSlider.moveOne();
                imgSlider.autoSlide();
                imgSlider.moveToNext();
                imgSlider.moveToPrev();
            }
            return init();
        },
        masonry: function($gridSection) {
            $(window).on('load', function() {
                var $grid     = $gridSection.find('.ow-grid'),
                    $btnGroup = $gridSection.find('.ow-btn-group'),
                    $btn      = $btnGroup.find('.ow-btn');
                    
                $grid.isotope({
                    layoutMode: 'packery',
                    itemSelector: '.ow-grid-item',
                    gutter: 0,
                    animationEngine: 'best-available'
                });
                $btnGroup.on('click', '.ow-btn', function() {
                    var filterValue = $(this).attr('data-filter');
                    var $grid = $(this).closest('.ow-wrap-grid').find('.ow-grid');
                    $grid.isotope({ filter: filterValue });
                });


                /* Filter Buttons */
                setFilterButtonWidth($btn);
                $(window).on('resize', function() {
                    setFilterButtonWidth($btn);
                });
                function setFilterButtonWidth($btn) {
                    var $btnCount = $btn.length,
                        $btnWidth = 100 / $btnCount,
                        $btnWText = $btnWidth + '%';
                    if ($(window).width() >= 768) {
                        $btn.css({ 'width': $btnWText });
                    } else {
                        $btn.css({ 'width': '100%' });
                    } 
                }
            });
        },
        crossBrowserDatePicker: function($element) {
            var datefield = document.createElement('input');
            datefield.setAttribute('type', 'date');
            //if browser doesn't support input type="date", load files for jQuery UI Date Picker
            if (datefield.type != 'date') { 
                document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
                document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"><\/script>\n') 
            }        
            //if browser doesn't support input type="date", initialize date picker widget:
            if (datefield.type != 'date') { 
                $(document).ready(function() {
                    $($element).datepicker();
                }); 
            }    
        },
        modal: function($trigger) {
            var $modal;

            $trigger.on('click', function(event) {
                $modal = '#' + $(this).data('modal');
                event.preventDefault();
                $($modal).addClass('active');
                $('body').addClass('hide-overflow');
            });
            $('.ow-wrap-modal').on('click', function(event) {
                if ( $(event.target).is('i.fa') || $(event.target).is('.ow-modal') ) {
                    event.preventDefault();
                    $(this).removeClass('active');
                    $('body').removeClass('hide-overflow');
                }
            });
            // $('.ow-modal .ow-close').on('click', function(event) {
            //     $modal = $(this).closest('.ow-wrap-modal');
            //     $modal.removeClass('active');
            //     $('body').removeClass('hide-overflow');
            // });
            $(document).keyup(function(event) {
                if (event.which == '27') {
                    $('.ow-wrap-modal').removeClass('active');
                    $('body').removeClass('hide-overflow');
                }
            });
            

            /* Set a cookie to display the modal only 1st time user visits */
            function setCookie(cname, cvalue, exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
            }
            function getCookie(cname) {
                var name = cname + "=";
                var ca   = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var  c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if ( c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            function checkCookie() {
                var visited = getCookie("visited");
                if (visited == "true") {
                    console.log(document.cookie);
                }
                else {
                    $('.ow-wrap-modal.cookie').addClass('active');
                    if (location.pathname == "/") {
                        $('body').addClass('hide-overflow');
                    }
                    setCookie("visited", "true", 15);
                }
            }
            $(document).ready(function() {
                checkCookie();
            });
        },
    }
})(jQuery);

/* Handlers */
var uiComponentsHandlers = (function($) {
    'use strict';

    var ow;
    var functions = {
        settings: {
            /* Accordions */
            accordionTrigger: $('.ow-accn-trigger'),
            accordions: uiComponents.accordions.bind(uiComponents),

            /* Tabs */
            tabTrigger: $('.ow-tab-trigger'),
            tabs: uiComponents.tabs.bind(uiComponents),

            /* Tooltip */
            tooltipTrigger: $('.ow-tooltip-trigger'),
            toolTips: uiComponents.toolTips.bind(uiComponents),

            /* Image Slider */
            slider: $('.ow-slider'),
            imgSlider: uiComponents.imgSlider.bind(uiComponents),

            /* Masonry */
            gridSection: $('.ow-sctn-grid'),
            masonry: uiComponents.masonry.bind(uiComponents),

            /* Cross-Browser Date Picker */
            crossBrowserDatePicker: uiComponents.crossBrowserDatePicker.bind(uiComponents),

            /* Modal */
            modalTrigger: $('.ow-modal-trigger'),
            modal: uiComponents.modal.bind(uiComponents)
        },
        init: function() {
            ow = this.settings;
            this.tabsHandler();
            this.accordionsHandler();
            this.tooltipsHandler();  
            this.imgSliderHandler();   
            this.masonryHandler();
            this.lightboxOptionsHandler();
            this.videoPopupHandler();
            this.crossBrowserDatePickerHandler();
            this.modalHandler();
        },
        accordionsHandler: function() {
            ow.accordions(ow.accordionTrigger);
        },
        tabsHandler: function() {
            ow.tabs(ow.tabTrigger);
        },
        tooltipsHandler: function() {
            ow.toolTips(ow.tooltipTrigger);
        },
        imgSliderHandler: function() {
            ow.slider.each(function() {
                ow.imgSlider(this);
            });
        },
        masonryHandler: function() {
            ow.masonry(ow.gridSection);
        },
        lightboxOptionsHandler: function() {
            lightbox.option({
                'alwaysShowNavOnTouchDevices': true,
                'wrapAround': true
            });
        },
        videoPopupHandler: function() {
            $("a.vp-a").YouTubePopUp();
            // $("a.vp-s").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
        },
        crossBrowserDatePickerHandler: function() {
            ow.crossBrowserDatePicker('#ow-date');
        },
        modalHandler: function() {
            ow.modal(ow.modalTrigger);
        }
    }
    functions.init();
});


/* ========================================================================== */
/* NAVIGATION COMPONENTS */
/* ===================== */

var navigation = (function() {
    'use strict';

    return {
        toggle: function($trigger) {
            var self, $navContainer, $navWrap, $navItem, scroll;

            $trigger.on('click', function(event) {
                event.preventDefault();

                self          = $(this);
                $navContainer = self.closest('nav');
                $navWrap      = $navContainer.children('.ow-wrap-nav');
                $navItem      = $navWrap.find('.menu-item');
                scroll        = $(window).scrollTop();

                if ($navWrap.hasClass('active')) {
                    $navWrap.removeClass('active').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                        $('body').removeClass('hide-overflow');
                    });
                    self.removeClass('active');
                    if (self.is('button')) { self.text('Menu'); }
                } 
                else {
                    $navWrap.addClass('active').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                        $('body').addClass('hide-overflow');
                    });
                    self.addClass('active');
                    if (self.is('button')) { self.text('Close'); }
                }
            });
        },
        headerStatus: function($header, $offset) {
            var initial = 0;
            function hideHeader($header) {
                $header.removeClass('active').addClass('visible');
            }
            function showHeader($header) {
                $header.addClass('active');
            }
            $(window).on('scroll', function() {
                var $offset = $offset || 100;
                var current = $(this).scrollTop();
                if (current > $offset && current < $(document).height() - $(window).height()) {
                    if (current > initial) {
                        window.setTimeout(hideHeader($header), 500);
                    }
                    else {
                        window.setTimeout(showHeader($header), 500);
                    }
                    initial = current;
                }
            });            
        },
        closeOnClick: function($trigger) {
            /* close the navigation when clicking on a navigation link */
            $trigger.on('click', function(event) {
                var siteNav    = $(this).closest('.main-nav');
                var navWrap    = siteNav.find('.ow-wrap-nav');
                var navTrigger = siteNav.find('.ow-nav-trigger');
                event.preventDefault();
                navTrigger.removeClass('active');
                navWrap.removeClass('active').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
                    $('body').removeClass('hide-overflow');
                });
            }); 
        }
    }
})();

/* Handlers */
var navigationHandlers = (function($) {
    'use strict';

    var ow;
    var functions = {
        settings: {
            /* Navigation */
            navTrigger:   $('.ow-nav-trigger'),
            navLink:      $('.ow-nav a[href^="#"]'),
            header:       $('[data-nav-status="toggle"]'),
            toggle:       navigation.toggle.bind(navigation),
            headerStatus: navigation.headerStatus.bind(navigation),
            closeOnClick: navigation.closeOnClick.bind(navigation)

        },
        init: function() {
            ow = this.settings;
            this.toggleHandler(); 
            this.headerStatusHandler(); 
            this.closeOnClickHandler();   
        },
        toggleHandler: function() {
            ow.toggle(ow.navTrigger);
        },
        headerStatusHandler: function() {
            ow.headerStatus(ow.header);
        },
        closeOnClickHandler: function() {
            ow.closeOnClick(ow.navLink);
        }
    }
    functions.init();
});


/* Random Functions */
var random = (function() {
    'use strict';

    return {
        heightVideo: function($video) {
            setVideoHeight($video);
            $(window).on('resize', function() {
                setVideoHeight($video);
            });
            function setVideoHeight($video) {

                setVideoCSS($video.find('.hd'), 0.5625);
                setVideoCSS($video.find('.standard'), 0.75);
                setVideoCSS($video.find('.classic'), 0.6667);
                setVideoCSS($video.find('.cinemascope'), 0.4286);

                function setVideoCSS($video, ratio) {
                    var width  = $video.width();
                    var height = width * ratio;
                    var pixel  = height + 'px';
                    $video.css({ 'height': pixel });
                }
                
            }
        },
        heightEqualizer: function($elements, minHeight, maxHeight) {

            // https://gist.github.com/davetayls/3828149

            function equalHeights (minHeight, maxHeight) {
                var tallest = (minHeight) ? minHeight : 0;
                this
                .height('auto')
                .each(function() {
                    if($(this).height() > tallest) {
                        tallest = $(this).height();
                    }
                });
                if((maxHeight) && tallest > maxHeight) tallest = maxHeight;
                return this.each(function() {
                    $(this).height(tallest).css("overflow","auto");
                });
            }
            $.fn.equalHeights = function(minHeight, maxHeight) {
                var $this = this;
                $(window).resize(function(){
                    equalHeights.call($this, minHeight, maxHeight);
                });
                equalHeights.call($this, minHeight, maxHeight);
                return this;
            };
            $elements.equalHeights();    
        }
    }
})();

/* General Random Functions */
var randomHandlers = (function($) {
    'use strict';

    var ow;
    var functions = {
        settings: {
            sectionVideo:    $('.ow-sctn-video .ow-video-fill-not'),
            galleryVideo:    $('.ow-masonry .ow-video-fill-not'),
            callouts:        $('.ow-sctn-callouts .ow-wrap-callout'),
            heightVideo:     random.heightVideo.bind(random),
            heightEqualizer: random.heightEqualizer.bind(random)
        },
        init: function() {
            ow = this.settings;
            this.sectionVideoHeightHandler();
            this.galleryVideoHeightHandler();
            this.heightEqualizerHandler();
        },
        sectionVideoHeightHandler: function() {
            ow.heightVideo(ow.sectionVideo);
        },
        galleryVideoHeightHandler: function() {
            ow.heightVideo(ow.galleryVideo);
        },
        heightEqualizerHandler: function() {
            ow.heightEqualizer(ow.callouts);
        }
    }
    functions.init();
});

/* INIT ALL FUNCTIONS */
(function($) {
    scrollRelatedHandlers($);
    uiComponentsHandlers($);
    navigationHandlers($);
    randomHandlers($);
})(jQuery);