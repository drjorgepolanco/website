(function(){"use strict";var e,s,a,i,n,o,t,c,l,r,d,h,m,u;a=$("html"),e=$(".banner"),s=$('[data-navicon="button"]'),c=$(".banner").height(),l=$(".hero").height(),h=l-c,o=null!==document.ontouchstart?"click":"touchstart",d=function(){var s;s=$(window).scrollTop(),s>=h?e.addClass("is-sticky"):e.removeClass("is-sticky")},r=function(){e.hasClass("is-open")?(a.removeClass("pinned"),e.removeClass("is-open"),s.removeClass("is--closed")):(a.addClass("pinned"),e.addClass("is-open"),s.addClass("is--closed"))},m=function(){e.hasClass("is-open")&&(e.removeClass("is-open"),a.removeClass("pinned"),s.removeClass("is--closed"))},s.on(o,r),$(".banner a").on(o,m),$(window).scroll(d),u=Modernizr.touch,$(".img-holder").imageScroll({imageAttribute:u===!0?"image-mobile":"image",touch:u}),$(document).ready(function(){return particlesJS("particles-js",{particles:{color:"#666",shape:"circle",opacity:.8,size:2,size_random:!0,nb:100,line_linked:{enable_auto:!0,distance:250,color:"#FF3300",opacity:.8,width:.1,condensed_mode:{enable:!1,rotateX:600,rotateY:600}},anim:{enable:!0,speed:4}},interactivity:{enable:!0,mouse:{distance:250},mode:"grab"},retina_detect:!0})}),t=$(window).height(),n=$("#particles-js"),n.css("height",t),i=document.querySelector("canvas"),$("div#particles-js canvas").css("height",t)}).call(this);