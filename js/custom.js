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
// JQuery to make whole div of news box clickable
	$(".newsbox").click(function () {
        window.open($(this).find("a:first").attr("href"), '_self');
        return false;
    });
// JQuery to set the appropriate left nav item to "active". navSelected is set in the html head and matches the order with that page appears in the nav	
//$( document ).ready(function() {
//$("#nav"+navSelected).addClass("active");
//});
	
	// JQuery to set the appropriate left nav item to "active". navSelected and subNavSelected is set in the html head and matches the order with that page appears in the nav	
$( document ).ready(function() {
	$("#nav"+navSelected).addClass("active");
	$("#subnav"+subNavSelected).addClass("active");
	if(subNavSelected>0) {
		$("#nav"+navSelected).addClass("subNavOn");
	}
	console.log("#subnav"+subNavSelected);
});
	