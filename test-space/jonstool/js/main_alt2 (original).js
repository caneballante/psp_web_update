
$( function() {
	$("#slider").slider({
		value:0,
		min: 0,
		max: 5,
		step: 1,
		orientation: "vertical",
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.value + " mil" );
			showHideMarkers(ui.value);
			
			//markerRemover();
			//markerTurnOn(ui.value);
					
		}
	});
	//sets value first time before any sliding is done
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) +" mil" );
});

/*var data {
	title: '',
	projects: projects
	
}*/

// our data
var projects = [
	{
		name: "Lower Dungeness Floodplain Restoration",
		longitude: 48.14267633,
		latitude: -123.1301177,
		level: 1,
		leadEntity: "North Olympic Peninsula / Clallam Co Community Dev" ,
		sponsor: "Clallam Co Community Dev" ,
		marker: null,
		funding: 3000000,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Skillicum Creek 2",
		longitude: 59.45522,
		latitude: 18.33002,
		level: 2,
		sponsor: "Pork Chop" ,
		marker: null
	},
		{
		name: "Skillicum Creek 3",
		longitude: 59.86522,
		latitude: 18.33002,
		level: 2,
		sponsor: "Pork Chop" ,
		marker: null
	},
		{
		name: "Skillicum Creek 4",
		longitude: 59.77522,
		latitude: 18.33002,
		level: 4,
		sponsor: "Pork Chop 4" ,
		marker: null
	},
		{
		name: "Skillicum Creek 5",
		longitude: 59.56562,
		latitude: 18.33002,
		level: 5,
		sponsor: "Pork Chop" ,
		marker: null
	}
];
  
//Google map  
var map;

function initMarkers() {
	$.each(projects, function(i, project) {
		project['marker'] = new google.maps.Marker({
				map: null,
				position: new google.maps.LatLng(project['longitude'], project['latitude'])
			});
	});
}

function showHideMarkers(level) {
	$.each(projects, function(i, project) {
		if(project['level'] <= level) {
			project['marker'].setMap(map);
		} else {
			project['marker'].setMap(null);	
		}
	});
}

function initMap() {	  
 	var mapOptions = {
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(48.14267633, -123.1301177)
    };
	
	

	initMarkers();

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	
}
