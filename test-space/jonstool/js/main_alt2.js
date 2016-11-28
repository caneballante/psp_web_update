// Extend the default Number object with a formatMoney() method:
// usage: someVar.formatMoney(decimalPlaces, symbol, thousandsSeparator, decimalSeparator)
// defaults: (2, "$", ",", ".")
Number.prototype.formatMoney = function(places, symbol, thousand, decimal) {
	places = !isNaN(places = Math.abs(places)) ? places : 2;
	symbol = symbol !== undefined ? symbol : "$";
	thousand = thousand || ",";
	decimal = decimal || ".";
	var number = this, 
	    negative = number < 0 ? "-" : "",
	    i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
	    j = (j = i.length) > 3 ? j % 3 : 0;
	return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
};




$( function() {
	$("#slider").slider({
		value:0,
		min: 0,
		max: 17,
		step: 1,
		orientation: "vertical",
		slide: function( event, ui ) {
			showHideMarkers(ui.value);
			
			}
	});
	//sets value first time before any sliding is done
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ));
});



// our data
var projects = [
	{
		name: "Lower Dungeness Floodplain Restoration",
		longitude: -123.1301177,
		latitude: 48.14267633,
		level: 15,
		marker: null,
		funding: 3000000
	
	},
	{
		name: "Lower Russell Levee Setback & Habitat Restoration",
		longitude: -122.2670343,
		latitude: 47.40911133,
		level: 6,
		marker: null,
		funding: 10255524
	
	},
	{
		name: "Leque Island Estuary Restoration Construction",
		longitude: -122.3871211,
		latitude: 48.23340306,
		level: 18,
		marker: null,
		funding: 6630991
	
	},
	{
		name: "Downey Farmstead Side Channel Restoration",
		longitude: -122.2621026,
		latitude: 47.3770995,
		level: 1,
		marker: null,
		funding: 4835743
	},
	{
		name: "USACE Skokomish Ecosystem Restoration Support 2",
		longitude: -123.2700932,
		latitude: 47.32813197,
		level: 10,
		marker: null,
		funding: 6441322
	},
	{
		name: "Pearson Shoreline",
		longitude: -122.3536139,
		latitude: 47.9517951,
		level: 12,
		marker: null,
		funding: 1250000
	},
	{
		name: "NF Nooksack (Xwqélém) Farmhouse Ph 4 Restoration",
		longitude: -122.1276787,
		latitude: 48.90305006,
		level: 4,
		marker: null,
		funding: 3304422

	},
	{
		name: "Clear Creek Targeted Acquisition",
		longitude: -122.3826295,
		latitude: 47.23032901,
		level: 17,
		marker: null,
		funding: 6400000
	},
{
		name: "Kilisut Harbor Restoration 2016",
		longitude: -122.700705,
		latitude: 48.01826489,
		level: 11,
		marker: null,
		funding: 4093665
	},
{
		name: "West Oakland Bay Restoration",
		longitude: -123.0911308,
		latitude: 47.21092124,
		level: 9,
		marker: null,
		funding: 3225750
	},
{
		name: "Barnum Point Acquisition",
		longitude:-122.4594265,
		latitude: 48.19755439,
		level: 13,
		marker: null,
		funding: 2186728
	},
{
		name: "Chico Bridge - Keta restore",
		longitude: 	-122.7090953,
		latitude: 47.59280209,
		level: 2,
		marker: null,
		funding: 3442400
	},
{
		name: "Middle Fork Nooksack Fish Passage",
		longitude: -122.0744804,
		latitude: 48.7718476,
		level: 3,
		marker: null,
		funding: 10904369
	},
{
		name: "Dungeness Off-Channel Reservoir: Final Design",
		longitude: -123.1407178,
		latitude: 48.05338022,
		level: 16,
		marker: null,
		funding: 1250000
	},
	{
		name: "Hansen Creek Reach 5 Restoration",
		longitude: -122.2007297,
		latitude: 48.51534414,
		level: 7,
		marker: null,
		funding: 3681245
	},
	{
		name: "Upper SF and Tributaries Corridor Acquisition",
		longitude: -122.122693,
		latitude: 48.68120111,
		level: 5,
		leadEntity: "WRIA 1 / Whatcom Land Trust" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 1872911,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Morse Creek Riparian Conservation",
		longitude: -123.350133,
		latitude: 48.06971636,
		level: 14,
		marker: null,
		funding: 1107550
	},
	{
		name: "Harper Estuary Bridge Construction",
		longitude: -122.5161102,
		latitude: 47.51689853,
		level: 8,
		marker: null,
		funding: 2469844,
	}

];
  
//Google map  
var map;
//initialize markers and add list of projects in rank order to table  
function initMarkers() {
	$.each(projects, function(i, project) {
		$.each(projects, function(z, projectz) {	
			if(projectz['level'] === i) {
				//funding conversion - im passing 0 decimal places as a parameter
				var fundingConverted = (projectz['funding']).formatMoney(0);
				$('#'+i+' td.rank').html(projectz['level']);
				$('#'+i+' td.project').html(projectz['name']);
				$('#'+i+' td.funding').html(fundingConverted);
				} 
			});		
			project['marker'] = new google.maps.Marker({
			map: null,
			position: new google.maps.LatLng( project['latitude'], project['longitude'])
			});
	});
}

function showHideMarkers(sliderLevel) {
	var fundingTotal = 0;
	$.each(projects, function(i, project) {
		if(project['level'] <= sliderLevel) {
			project['marker'].setMap(map);
			var fundingProject = (project['funding']);
			fundingTotal = fundingTotal + fundingProject;
			//funding conversion - im passing 0 decimal places as a parameter
			$( "#amount" ).val( fundingTotal.formatMoney(0));
			var rankProject = (project['level']);
			$('#'+rankProject+' td.rank').css("color", "#000");
			$('#'+rankProject+' td.project').css("color", "#000");
			$('#'+rankProject+' td.funding').css("color", "#000");
		} else {
			var rankProject = (project['level']);
			project['marker'].setMap(null);	
			$('#'+rankProject+' td.rank').css("color", "#999");
			$('#'+rankProject+' td.project').css("color", "#999");
			$('#'+rankProject+' td.funding').css("color", "#999");
		}
		
	});

}

function initMap() {	  
 	var mapOptions = {
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.SATELLITE,
        center: new google.maps.LatLng(48.14267633, -123.1301177)
    };
	
	

	initMarkers();

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	
	var kmlLayer = new google.maps.KmlLayer({
		
    url: 'http://www.psp.wa.gov/test-space/jonstool/kml/psleg3.kmz',
	suppressInfoWindows: true
	});
	
	kmlLayer.addListener('click', function(kmlEvent) {
    var text = kmlEvent.featureData.name;
    showInContentWindow(text);
  });

  function showInContentWindow(text) {
    var sidediv = document.getElementById('content-window');
    sidediv.innerHTML = text;
  }
	kmlLayer.setMap(map);
}

