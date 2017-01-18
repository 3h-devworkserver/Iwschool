// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function($){


/* trigger when page is ready */
$(document).ready(function (){
/*
	 // dropdown toggle function /
      var $menu = $('.navbar'), $menuTrigger = $('.dropdown > a');
      
      $menuTrigger.click(function (e) {
          e.preventDefault();
          var t = $(this);
          t.toggleClass('active').next('ul').toggleClass('active');
      });*/

      //------------------toggle responsive nav-------------------//
        $(".navbar-toggle").on("click", function() {
            $(this).toggleClass("active");
        });

         // dropdown nav toggle iocn function /
      var $menu = $('.caret'), $menuTrigger = $('.dropdown > b');
      
      $menuTrigger.click(function (e) {
          e.preventDefault();
          var t = $(this);
          t.toggleClass('active').next('ul').toggleClass('active');
      });

      

});


        // dropdown nav toggle hover function /

$(function(){
    $(".dropdown").hover(            
            function() {
                $('.dropdwon-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                /*$('b', this).toggleClass("caret caret-up"); */               
            },
            function() {
                $('.dropdwon-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                /*$('b', this).toggleClass("caret caret-up");*/                
            });
    });


/* optional triggers

$(window).load(function() {
	
});

$(window).resize(function() {
	
});

*/


})(window.jQuery);