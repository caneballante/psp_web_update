// JavaScript Document

//accordion
$(function() {
  $(".ui-accordion-header").click( function() {
     _gaq.push(['_trackEvent', 'Accordion', 'ShowPage', $(this).attr('id')]);
  });
});
 	
	
	