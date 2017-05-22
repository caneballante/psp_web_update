/*$.getJSON( "data.json", function( data ) {
 // console.log(data);
 var myData = (data);
 console.log(myData.items[0].key);  
});*/
$(document).ready(function () {
	$('#get-data').click(function () {
		var showData = $('#show-data');

		$.getJSON('data.json', function (data) {
			

			var items = data.items.map(function (item) {
				var item_linebreak = item;
				return item_linebreak.key + ': ' + item.value;
			});
			
			console.log(items);
			console.log("nnn");
			showData.empty();

			if (items.length) {
				/*var content = '<p>' + items.join('</p><p>') + '</p>';
				var list = $('<div />').html(content);
				showData.append(list);*/
				showData.append(items[0]);
				
			}
		});

		showData.text('Loading the woot JSON file.');
	});
});