(function(){"use strict";$(document).ready(function(){var e,i,t,o;return $(".project-button").on("click",".more",function(e){e.preventDefault(),$(this).parent().parent().find(".project-info").show()}),$(".cancel").on("click",function(e){e.preventDefault(),$(this).parent().hide()}),o=new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!0,live:!0,callback:function(){}}),o.init(),$(".responsive").slick({infinite:!0,speed:600,autoplay:!0,centerMode:!0,centerPadding:60,cssEase:"ease",dots:!0,pauseOnHover:!0,slidesToShow:4,slidesToScroll:1,autoplaySpeed:1e3,responsive:[{breakpoint:1024,settings:{slidesToShow:6,slidesToScroll:1}},{breakpoint:800,settings:{slidesToShow:3,slidesToScroll:2,dots:!0,infinite:!0}},{breakpoint:600,settings:{slidesToShow:2,slidesToScroll:2,dots:!0,infinite:!0}},{breakpoint:480,settings:{slidesToShow:1,slidesToScroll:1,dots:!0,infinite:!0,autoplay:!0,autoplaySpeed:1e3,swipeToSlide:!0}}]}),e=function(e,i,t){var o,n,s;for(o=$(e),s=0,n=0;t>=n;)setTimeout(function(){o.html(s),s+=1,s===t&&$(i).removeClass("animate")},100*n),n+=1},i=function(){e(".number-1",".progress-circle-outer-1",87),e(".number-2",".progress-circle-outer-2",86),e(".number-3",".progress-circle-outer-3",95),e(".number-4",".progress-circle-outer-4",92)},/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?i():$("#skills").one("mouseenter",function(){return i()}),$(".c").mouseenter(function(){return $(this).hasClass("cycling")===!1?$(this).charcycle({target:".text"}):void 0}),t=function(e,i,t,o){var n,s,r;particlesJS("particles-js",{particles:{color:"#666",shape:"circle",opacity:.8,size:e,size_random:!0,nb:100,line_linked:{enable_auto:!0,distance:i,color:"#FF3300",opacity:.8,width:t,condensed_mode:{enable:!1,rotateX:600,rotateY:600}},anim:{enable:!0,speed:o}},interactivity:{enable:!0,mouse:{distance:250},mode:"grab"},retina_detect:!0}),r=$(window).height(),s=$("#particles-js"),s.css("height",r),n=document.querySelector("canvas"),$("div#particles-js canvas").css("height",r)},/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?t(1,100,.3,2):t(2,250,.4,4)})}).call(this);