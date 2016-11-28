
$( function() {
	$("#slider").slider({
		value:0,
		min: 0,
		max: 5,
		step: 1,
		orientation: "vertical",
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.value + " mil" );
			markerRemover();
			markerTurnOn(ui.value);
					
		}
	});
	//sets value first time before any sliding is done
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) +" mil" );
});
  
//Google map  
var map;
var markers = [];

function initMap() {	  
 var mapOptions = {
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(59.32522, 18.07002)
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	google.maps.event.addDomListener(document.getElementById('clickMe'), 'click', markerSetter);
	google.maps.event.addDomListener(document.getElementById('clickMeRemover'), 'click', markerRemover);
	google.maps.event.addDomListener(document.getElementById('clickMeTurnOn'), 'click', markerTurnOn);
}
//Creates all the markers and adds them to the array	  
function markerSetter () {	
	var coords = [
		new google.maps.LatLng(59.32522, 18.07002),
		new google.maps.LatLng(59.45522, 18.12002),
		new google.maps.LatLng(59.86522, 18.35002),
		new google.maps.LatLng(59.77522, 18.88002),
		new google.maps.LatLng(59.36344, 18.36346),
		new google.maps.LatLng(59.56562, 18.33002)];

    for (var i = 0; i <= 5; i++) {
        var marker = new google.maps.Marker({
            map: map,
            position: coords[i]
        });
        markers.push(marker);
    }
}
//turns all of them off, but doesn't remove them from the array
function markerRemover () {
	for (var i = 0; i <= 5; i++) {
		markers[i].setMap(null);
    }
}
//turns them on after they are already in the array
 function markerTurnOn (sliderValue) {
	for (var i = 0; i <= sliderValue; i++) {
		markers[i].setMap(map);
    }
}
