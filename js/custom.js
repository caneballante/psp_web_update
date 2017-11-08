// JavaScript Document

$(document).ready(function () {
	$("#nav" + navSelected).addClass("active");
	$("#nav" + navSelected).addClass("subNavOn");
	if (subNavSelected != "non"){
		$("#subnav" + subNavSelected).addClass("active");
	}

	$.getJSON('json/newsreleases.json', function (data) {
		newsReleasesData = data;
		newsReleaseShow();
	});


	function newsReleaseShow() {
		$.each((newsReleasesData['news-releases']), function (i, newsReleases) {
			var newsDate = (newsReleases['date']);
			var newsLink = (newsReleases['link']);
			var newsShow = '<p>' + newsDate + ':' + newsLink + '</p>';
			$('#newsDiv').append(newsShow);
		});
	};


});

// jQuery to change the menu button on window resize
$(window).resize(function () {
	if ($(window).width() < 739) {
		$(".menu_button").hide();
		$(".menu_button_small").show();
	} else {
		$(".menu_button").show();
		$(".menu_button_small").hide();
	}
});
// jQuery to detect window size on first load
if ($(window).width() < 739) {
	$(".menu_button").hide();
	$(".menu_button_small").show();
} else {
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
