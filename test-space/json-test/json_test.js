$(document).ready(function () {
  $('#get-data').click(function () {
    var showData = $('#show-data');

    $.getJSON('datay.json', function (data) {
      console.log(data);

      var items = data.items.map(function (item) {
        return item.key + ': ' + item.value;
      });
		
		console.log(items);

      showData.empty();

      if (items.length) {
        var content = '<p>' + items.join('</p><p>') + '</p>';
		console.log("i am content = "+content);
		var iLoveReturns = content.replace(new RegExp('~B', 'g'), '<br>');  
		console.log("i am iLoveReturns = "+iLoveReturns);
		console.log(typeof iLoveReturns);
        var list = $('<div />').html(iLoveReturns);
        showData.append(list);
      }
    });
	  console.log("i ranne")
    showData.text('Loading the woot JSON file.');
  });
});// JavaScript Document

