/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

jQuery.extend(jQuery.easing,{easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a}});

(function ($){
  "use strict";

  $(document).ready(function () {
    // Place your code here.
    $('.preload').removeClass('active');
    $('.w-page.hidden').removeClass('hidden');
    var hash = location.hash;

    if($('.w-circle').length){

      $('.w-preload .logo, .w-preload .w-logo .content').hover(
          function(){
            $('.w-switch .views-row').addClass('active');
            $('.half').addClass('active');
          },
          function(){
            $('.w-switch .views-row').removeClass('active');
            $('.half').removeClass('active');
          }
      );

      $('.w-switch .views-row-1').hover(
        function(){
          $('.half.direction').addClass('active');
        },
        function(){
          $('.half.direction').removeClass('active');
        });

      $('.w-switch .views-row-2').hover(
          function(){
            $('.half.shop').addClass('active');
          },
          function(){
            $('.half.shop').removeClass('active');
      });

      $('.half.direction').hover(
        function(){
          $('.w-switch .views-row-1').addClass('active');
        },
        function(){
          $('.w-switch .views-row-1').removeClass('active');
      });

      $('.half.shop').hover(
          function(){
            $('.w-switch .views-row-2').addClass('active');
          },
          function(){
            $('.w-switch .views-row-2').removeClass('active');
          });

      $('.half.direction, .w-switch .views-row-1').click(function(){
        hash = '#directions';
        location.hash = hash;
      });

      $('.half.shop, .w-switch .views-row-2').click(function(){
        hash = '#shop';
        location.hash = hash;
      });
    }

    if($('body.front').length){

      if(location.hash == '#directions'){
        $('.w-split .split.directions').addClass('active');
        $('.w-split .split.shop').removeClass('active');
        $('.w-preload').removeClass('active');
        $('.w-page>.w-menu').addClass('direction');
        $('.w-page>.w-menu').removeClass('shop');
      }

      $('.w-split .split.shop .circle').click(function(){
        location.hash = '#directions';
      });

      if(location.hash == '#shop'){
        $('.w-split .split.shop').addClass('active');
        $('.w-split .split.directions').removeClass('active');
        $('.w-preload').removeClass('active');
        $('.w-page>.w-menu').addClass('shop');
        $('.w-page>.w-menu').removeClass('direction');
      }

      $(window).on('hashchange', function(){

        if(location.hash == ''){
          $('.w-split .split.directions').removeClass('active');
          $('.w-split .split.shop').removeClass('active');
          $('.w-preload').addClass('active');
          $('.w-page>.w-menu').removeClass('direction');
          $('.w-page>.w-menu').removeClass('shop');
        }

        if(location.hash == '#directions'){
          $('.w-split .split.directions').addClass('active');
          $('.w-split .split.shop').removeClass('active');
          $('.w-preload').removeClass('active');
          $('.w-page>.w-menu').addClass('direction');
          $('.w-page>.w-menu').removeClass('shop');
        }

        if(location.hash == '#shop'){
          $('.w-split .split.shop').addClass('active');
          $('.w-split .split.directions').removeClass('active');
          $('.w-preload').removeClass('active');
          $('.w-page>.w-menu').addClass('shop');
          $('.w-page>.w-menu').removeClass('direction');
        }
      });
    }
  });

  // jQuery for page scrolling feature - requires jQuery Easing plugin

  $(window).load(function(){
  });

  /*=================FUNCTIONS======================*/

  var ww = (window.innerWidth > 0) ? window.innerWidth : screen.width;

  /*==============END OF FUNCTIONS==================*/
}(jQuery));
