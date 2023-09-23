
//Menu
$(function() {
  $("#navbtn").click(function() {
      $("#resMenu").slideToggle(100);
      $('.hamburger').toggleClass('nav-toggle');
  });
});

//Submenu
jQuery('.menu li > .sub-menu').parent().click(function() {
    var submenu = jQuery(this).children('.sub-menu');
    if ( $(submenu).is(':hidden') ) {
      jQuery(submenu).slideDown(100);
    } else {
      jQuery(submenu).slideUp(100);
    }
  });
//Slider
(function($) {
    "use strict";
     
    jQuery(document).ready(function() {
     
    jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
    nav: true,
    //navText: ['&amp;amp;amp; Next'], //Note, if you are not using Font Awesome in your theme, you can change this to Previous &amp;amp;amp; Next
    responsive:{
            0:{
                items:1,
                //nav:true
            },
            600:{
                items:2,
                //nav:false
            },
            1000:{
                items:3,
                //nav:false
            },
        }
    });
    })
    })(jQuery);
    //Counter
    $(function () {
      var spanTimer = $('.timer');
      spanTimer.each(function () {
        var $timer = jQuery(this);
        $timer.attr('data-count', $timer.text());
      })
    })
    function inviewExample() {
      var $example = jQuery('#inview-example');
      var inview;
 
      if ($example.length) {
        inview = new Waypoint.Inview({
          element: jQuery('#inview-example')[0],
          entered: function(direction) {
            jQuery('.timer').each(function () {
                var $this = jQuery(this);
                var val = jQuery(this).data('count');
                jQuery({ Counter: 0 }).animate({ Counter: val }, {
                  duration: 1000,
                  easing: 'swing',
                  step: function () {
                    $this.text(Math.ceil(this.Counter));
                  }
                });
              });
          }
        })
      }
  }
jQuery(window).on('load', function() {
   inviewExample();
 });

 $(function () {
  var galleryItem = $('.gallery-item');

  galleryItem.each(function(item) {
    $(this).attr('data-aos', 'flip-left');
    $(this).attr('data-aos-easing', 'ease-out-cubic');
    $(this).attr('data-aos-duration', '2000');
  })
  setTimeout(() => {
    AOS.init();
}, 120);
 })
 AOS.init();

