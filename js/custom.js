// JavaScript Document

// jQuery to collapse the navbar on scroll
//$(window).scroll(function() {
//    if ($(".navbar").offset().top > 50) {
//        $(".navbar-fixed-top").addClass("top-nav-collapse");
//
//    } else {
 //       $(".navbar-fixed-top").removeClass("top-nav-collapse");
//    }
//});

// jQuery to change the menu button on window resize
$(window).resize(function() {
	 if ( $(window).width() < 739) {     
	   $(".menu_button").hide();
	   $(".menu_button_small").show();
	}
	else {
	   $(".menu_button").show();
	   $(".menu_button_small").hide();
	}
});
// jQuery to detect window size on first load
 if ( $(window).width() < 739) {     
	   $(".menu_button").hide();
	   $(".menu_button_small").show();
	}
	else {
	   $(".menu_button").show();
	   $(".menu_button_small").hide();
	}