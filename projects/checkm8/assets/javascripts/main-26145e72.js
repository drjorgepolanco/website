(function() {
  'use strict';
  $(document).ready(function() {
    var closePanel, coachVideo, isMouseOver, isPanelOpen, openPanel, panelAction, pushIt, startTimeout, stopTimeout, timer;
    coachVideo = document.getElementById('coach-video');
    coachVideo.muted = "muted";
    $('.expand').on('click', 'h3', function() {
      coachVideo.load();
      coachVideo.play();
      coachVideo.muted = false;
    });
    $('video').on('click', function() {
      if (coachVideo.paused) {
        coachVideo.play();
      } else {
        coachVideo.pause();
      }
    });
    timer = void 0;
    isMouseOver = false;
    isPanelOpen = false;
    pushIt = function() {
      var extra;
      extra = $('#extra');
      if (extra.css('top') === '0px') {
        extra.css('top', '+=520');
      } else {
        extra.css('top', '0');
      }
    };
    openPanel = function() {
      isPanelOpen = true;
      $('#panel').slideDown(1500);
      $('#banner').fadeOut(1200);
      pushIt('#extra');
      coachVideo.play();
      if (isMouseOver === false) {
        startTimeout();
      }
    };
    closePanel = function() {
      isPanelOpen = false;
      $('#panel').slideUp(1500);
      $('#banner').fadeIn(2000);
      pushIt('#extra');
      coachVideo.pause();
    };
    panelAction = function(selector, action) {
      $(selector).on('click', 'h3', function() {
        return action();
      });
    };
    panelAction('.expand', openPanel);
    panelAction('.collapse', closePanel);
    $('.panel').on('click', function(e) {
      if (e.target === this) {
        return window.open("http://www.coach.com/", "_blank");
      }
    });
    startTimeout = function() {
      timer = window.setTimeout((function() {
        if (isPanelOpen === true && isMouseOver === false) {
          return closePanel();
        }
      }), 8000);
    };
    stopTimeout = function() {
      window.clearTimeout(timer);
    };
    window.onload = function() {
      window.setTimeout((function() {
        openPanel();
        return startTimeout();
      }), 1000);
      document.getElementById('panel').onmouseover = function() {
        isMouseOver = true;
        return stopTimeout();
      };
      document.getElementById('panel').onmouseout = function() {
        isMouseOver = false;
        return startTimeout();
      };
    };
    $('#carousel').slick({
      infinite: true,
      speed: 600,
      autoplay: true,
      centerMode: true,
      centerPadding: 20,
      cssEase: 'ease',
      pauseOnHover: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplaySpeed: 2000
    });
  });

}).call(this);
