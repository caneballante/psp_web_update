
// JQuery to set the appropriate left nav item to "active". navSelected is set in the html head and matches the order with that page appears in the nav	
$( document ).ready(function() {
	$("#nav"+navSelected).addClass("indicator_active_"+color);
});
	