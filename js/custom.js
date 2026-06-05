// JavaScript Document

$(document).ready(function () {

	if (typeof navSelected !== "undefined") {
		$("#nav" + navSelected).addClass("active");
		$("#nav" + navSelected).addClass("subNavOn");
	}

	if (typeof subNavSelected !== "undefined" && subNavSelected !== "non") {
		$("#subnav" + subNavSelected).addClass("active");
	}

    
   	$.getJSON('json/newsreleases.json', function (newsReleasesData) {
        newsReleaseShow(newsReleasesData);
        console.log(newsReleasesData);
	});
   
    function newsReleaseShow (data){
        console.log (data)
        $.each((data['news-releases']), function (i, newsReleases) {
			var newsDate = (newsReleases['date']);
			var newsLink = (newsReleases['link']);
			var newsShow = '<p>' + newsDate + ':' + newsLink + '</p>';
			$('#newsDiv').append(newsShow);
		});
    }

	buildSectionPager();

	function buildSectionPager() {
		var $pagerTarget = $("#sectionPager").first();

		if (!$pagerTarget.length || typeof window.navSelected === "undefined") {
			return;
		}

		var navId = "nav" + window.navSelected;
		var $currentItem = $('[id="' + navId + '"]').filter(function () {
			return $(this).closest(".nav-leftside-custom").length;
		}).first();

		if (!$currentItem.length) {
			return;
		}

		var $sectionNav = $currentItem.closest("ul.nav-leftside-custom, ul.nav").first();

		if (!$sectionNav.length) {
			return;
		}

		if (typeof window.subNavSelected !== "undefined" && String(window.subNavSelected).toLowerCase() !== "non") {
			var subNavId = "subnav" + window.subNavSelected;
			var $subNavItem = $currentItem.find('[id="' + subNavId + '"]').first();

			if ($subNavItem.length) {
				$currentItem = $subNavItem;
			}
		}

		var navItems = [];

		$sectionNav.find('li[id^="nav"], li[id^="subnav"]').each(function () {
			var $item = $(this);
			var $link = $item.children("a[href]").first();
			var href = $.trim($link.attr("href") || "");

			if (!$link.length || $item.is("[data-pager-skip]") || $link.is("[data-pager-skip]")) {
				return;
			}

			if (!href || href === "#" || href.indexOf("javascript:") === 0) {
				return;
			}

			navItems.push({
				item: this,
				href: href,
				text: $.trim($link.text())
			});
		});

		var currentIndex = -1;

		$.each(navItems, function (index, navItem) {
			if (navItem.item === $currentItem[0]) {
				currentIndex = index;
				return false;
			}
		});

		if (currentIndex === -1) {
			return;
		}

		var previousItem = navItems[currentIndex - 1];
		var nextItem = navItems[currentIndex + 1];

		if (!previousItem && !nextItem) {
			return;
		}

		var $pager = $('<nav class="section-pager" aria-label="Section page navigation"><ul class="pager"></ul></nav>');
		var $pagerList = $pager.find("ul");

		if (previousItem) {
			$pagerList.append(makePagerItem(previousItem, "previous"));
		}

		if (nextItem) {
			$pagerList.append(makePagerItem(nextItem, "next"));
		}

		$pagerTarget.empty().append($pager);
	}

	function makePagerItem(navItem, pagerClass) {
		var $item = $("<li></li>", {
			"class": pagerClass
		});

		if (!navItem) {
			return $();
		}

		var $link = $("<a></a>", {
			href: navItem.href
		});

		if (pagerClass === "previous") {
			$link.append($("<span></span>").html("&larr; Back: "));
			$link.append(document.createTextNode(navItem.text));
		} else {
			$link.append(document.createTextNode("Next: " + navItem.text + " "));
			$link.append($("<span></span>").html("&rarr;"));
		}

		return $item.append($link);
	}
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


