// JavaScript Document

// jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
		console.log("i pooped");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
		console.log("i peed");
    }
});