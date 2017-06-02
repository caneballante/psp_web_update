$(document).ready(function () {	
	var dataJS;
	$('#get-data').click(function () {
   		//load headings
		$.getJSON('vs_headings.json', function (data) {
		headingsVS = data;
		vsHeadingsShow();
		});
		//load vital sign data
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
		var vsRating = (dataVS['vitalSign']['progress-rating']);
		console.log(vsRating);
		
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
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Making Progress", "Making Some Progress", "Not Changing", "Getting Somewhat Worse", "Getting Worse"],
			datasets: [{
				label: 'Percentage',
				data: [0, 70, 15, 15, 0],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)'
					
				],
				borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
});

