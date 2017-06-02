$(document).ready(function () {	
	var dataJS;
	$('#get-data').click(function () {
   	
		$.getJSON('vs_headings.json', function (data) {
		headingsVS = data;
		vsHeadingsShow();
		});
		
		$.getJSON('vs_shoreline_armoring.json', function (data) {
		dataVS = data;
		vsDataShow();
		});
  });
	function vsDataShow () {
		
		//goal
		var vsGoal = (dataVS['vitalSign']['goal']);
		$('#show-goal').html(vsGoal);
		
		//name
		var vsName = (dataVS['vitalSign']['name']);
		$('#show-name').html(vsName);
		
		//lead
		var vsLead = (dataVS['vitalSign']['lead']);
		$('#show-lead').html(vsLead);
		
		//what
		var vsWhat = (dataVS['vitalSign']['what']);
		$('#show-what').html(vsWhat);
		
		//assessment
		var vsAssess = (dataVS['vitalSign']['assessment']);
		var vsAssessSafe = vsAssess.replace(new RegExp('<', 'g'), 'DELETED');
		var vsAssessFmt = vsAssessSafe.replace(new RegExp('~B', 'g'), '</li><li>');
		var vsAssessHtml = '<ul><li>' + vsAssessFmt + '</li></ul>';
		$('#show-assessment').html(vsAssessHtml);
		
		//rating
		var vsRating = (dataVS['vitalSign']['rating']);
		
		//highlights
		var vsHighlights = (dataVS['vitalSign']['highlights']);
		var vsHighlightsSafe = vsHighlights.replace(new RegExp('<', 'g'), 'DELETED');
		var vsHighlightsFmt = vsHighlightsSafe.replace(new RegExp('~P', 'g'), '</p><p>');
		var vsHighlightsHtml = '<p>' + vsHighlightsFmt + '</p>';
		$('#show-highlight').html(vsHighlightsHtml);
		
		//links
		var vsLinks = (dataVS['vitalSign']['links']);
		$('#show-highlight-photo').html(vsLinks);
		
		//highlight photos
		var vsHighlightPhoto = (dataVS['vitalSign']['highlight_photo']);
		$('#show-links').html(vsHighlightPhoto);
		
	}
	function vsHeadingsShow () {
		console.log("headings on the way")
	}
});

