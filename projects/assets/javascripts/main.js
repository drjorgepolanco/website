(function(){"use strict";var s,n,e,o,a,i,l,t,c,d;e=$("html"),s=$(".banner"),n=$('[data-navicon="button"]'),a=$(".banner").height(),i=$(".hero").height(),c=i-a,o=null!==document.ontouchstart?"click":"touchstart",t=function(){var n;n=$(window).scrollTop(),n>=c?s.addClass("is-sticky"):s.removeClass("is-sticky")},l=function(){s.hasClass("is-open")?(e.removeClass("pinned"),s.removeClass("is-open"),n.removeClass("is--closed")):(e.addClass("pinned"),s.addClass("is-open"),n.addClass("is--closed"))},d=function(){s.hasClass("is-open")&&(s.removeClass("is-open"),e.removeClass("pinned"),n.removeClass("is--closed"))},n.on(o,l),$(".banner a").on(o,d),$(window).scroll(t)}).call(this);