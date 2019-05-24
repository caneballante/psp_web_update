// JavaScript Document

$( document ).ready(function() {
    console.log( "ready!" );
	var targetOffset = $("#anchor-point").offset().top;

	var $w = $(window).scroll(function(){
		if ( $w.scrollTop() > targetOffset ) {   
			$('#voice2').css({"display":"none"});
		} else {

		}
	});
});