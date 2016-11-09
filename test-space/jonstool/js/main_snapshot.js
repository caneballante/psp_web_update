
$( function() {
    $("#slider").slider({
      value:100,
      min: 0,
      max: 500,
      step: 50,
	  orientation: "vertical",
      slide: function( event, ui ) {
      
		 $( "#amount" ).val( "$" + ui.value + " mil" );
		 
		 var slideValue = ui.value;
		 console.log(slideValue);
		 markerRemover(slideValue);
		 
      }
    });
	//sets value first time before any sliding is done
  $( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) +" mil" );
  } );

var marker2;

function initMap() {
        var myLatLng = {lat: 47.886881, lng: -122.302551};
		var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 10,
		  mapTypeId: 'terrain'
        });	
	
      };
	  
	  
function markerSetter () {
	var marker2 = new google.maps.Marker({
   			position: {lat: 48.221340, lng: -122.630380},
   			map: map,
   			title: 'Regional Beach Restoration and Protection Feasibility'
		});
	console.log("markerSetter ran");
	};
	 
	
function markerRemover (fundingVal) {
	console.log("my new function = " + fundingVal);
		 if (fundingVal === 200) {
			 	console.log("markerController Ran");
			 	marker2.setMap(null);

		 };
	};
	
markerSetter();