
$( function() {
	$("#slider").slider({
		value:0,
		min: 0,
		max: 5,
		step: 1,
		orientation: "vertical",
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.value + " mil" );
			markerSetter(ui.value);
			markerRemover(ui.value);
		
		}
	});
	//sets value first time before any sliding is done
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) +" mil" );
});
  
//Google map  
var map;
var marker;
var markers = [];
/*function initMap() {
        var myLatLng = {lat: 47.886881, lng: -122.302551};
		var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 7,
		  mapTypeId: 'terrain'
        });	
		google.maps.event.addDomListener(document.getElementById('clickme'), 'click', markerSetter);
      };
	  */
function initMap() {	  
 var mapOptions = {
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(59.32522, 18.07002)
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	google.maps.event.addDomListener(document.getElementById('clickme'), 'click', markerSetter);
	google.maps.event.addDomListener(document.getElementById('clickmeremove'), 'click', markerRemover);
	//markerSetter(5);	
}
	  
function markerSetter (fundingLevel) {	
	var coords = [
		new google.maps.LatLng(59.32522, 18.07002),
		new google.maps.LatLng(59.45522, 18.12002),
		new google.maps.LatLng(59.86522, 18.35002),
		new google.maps.LatLng(59.77522, 18.88002),
		new google.maps.LatLng(59.36344, 18.36346),
		new google.maps.LatLng(59.56562, 18.33002)];

    for (var i = 0; i <= fundingLevel; i++) {
        var marker = new google.maps.Marker({
            map: map,
            position: coords[i]
        });
        markers.push(marker);
    }
	
}

function markerRemover (fundingLevel) {
	marker.setMap(null);

	/*for (var i = fundingLevel; i <= 5; i++) {
		markers[i].setMap(null);
    }
	var howMany = 5-fundingLevel;
	console.log("howMany=" +howMany);
	markers.splice(fundingLevel+1,howMany);
*/
}


