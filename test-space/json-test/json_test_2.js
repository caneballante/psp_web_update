$(document).ready(function () {	
	var dataJS;
	$('#get-data').click(function () {
   	
		$.getJSON('vital_test1.json', function (data) {
		dataJS = data;
		dataTest();
	});
	  /*var content = '<p>' + items.join('</p><p>') + '</p>';

	var iLoveReturns = content.replace(new RegExp('~B', 'g'), '<br>');  
	console.log("i am iLoveReturns = "+iLoveReturns);
	console.log(typeof iLoveReturns);
	var list = $('<div />').html(iLoveReturns);
	showData.append(list);*/

  });
	function dataTest () {
		
		var vsGoal = (dataJS['vitalSign']['goal']);
		var vsName = (dataJS['vitalSign']['name']);
		var vsLead = (dataJS['vitalSign']['lead']);
		var vsWhat = (dataJS['vitalSign']['what']);
		
		var vsAssess = (dataJS['vitalSign']['assessment']);
		var vsAssessFmt = vsAssess.replace(new RegExp('~B', 'g'), '<br>');
		var vsAssessHtml = '<p>' + vsAssessFmt + '</p>';
		
		var vsRating = (dataJS['vitalSign']['rating']);
		var vsHighlights = (dataJS['vitalSign']['highlights']);
		var vsLinks = (dataJS['vitalSign']['links']);
		var vsHighlightPhoto = (dataJS['vitalSign']['highlight_photo']);
		
		$('#show-goal').html(vsGoal);
		$('#show-name').html(vsName);
		$('#show-lead').html(vsLead);
		$('#show-what').html(vsWhat);
		
		/*$.each(vsAssessHtml.split("\n"), function(index, value) { 
			$('#show-assessment').append("p").text(value);
		});
			*/	
		$('#show-assessment').html(vsAssessHtml);
		$('#show-highlight').html(vsHighlights);
		$('#show-highlight-photo').html(vsLinks);
		$('#show-links').html(vsHighlightPhoto);
		
		console.log("test1")
		
	}
});

