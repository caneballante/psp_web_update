
$( function() {
	$("#slider").slider({
		value:0,
		min: 0,
		max: 17,
		step: 1,
		orientation: "vertical",
		slide: function( event, ui ) {
			$( "#amount" ).val( "$" + ui.value + " mil" );
			showHideMarkers(ui.value);
			//showFunding(ui.value);
			}
	});
	//sets value first time before any sliding is done
	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) +" milly" );
});



// our data
var projects = [
	{
		name: "Lower Dungeness Floodplain Restoration",
		longitude: -123.1301177,
		latitude: 48.14267633,
		level: 15,
		leadEntity: "North Olympic Peninsula", 
		sponsor: "Clallam Co Community Dev",
		marker: null,
		funding: 3000000,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Lower Russell Levee Setback & Habitat Restoration",
		longitude: -122.2670343,
		latitude: 47.40911133,
		level: 6,
		leadEntity: "WRIA 9/ King County" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 10255524,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Leque Island Estuary Restoration Construction",
		longitude: -122.3871211,
		latitude: 48.23340306,
		level: 18,
		leadEntity: "Stillaguamish / Dept of Fish & Wildlife" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 6630991,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Downey Farmstead Side Channel Restoration",
		longitude: -122.2621026,
		latitude: 47.3770995,
		level: 1,
		leadEntity: "WRIA 9/ City of Kent" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 4835743,
		benefit: "placeholder benefits go here"
	},
	{
		name: "USACE Skokomish Ecosystem Restoration Support 2",
		longitude: -123.2700932,
		latitude: 47.32813197,
		level: 10,
		leadEntity: "Hood Canal / Mason Conservation District" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 6441322,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Pearson Shoreline",
		longitude: -122.3536139,
		latitude: 47.9517951,
		level: 12,
		leadEntity: "WRIA 6 / Whidbey Camano Land Trust" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 1250000,
		benefit: "placeholder benefits go here"
	},
	{
		name: "NF Nooksack (Xwqélém) Farmhouse Ph 4 Restoration",
		longitude: -122.1276787,
		latitude: 48.90305006,
		level: 4,
		leadEntity: "WRIA 1 / Nooksack Indian Tribe" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 3304422,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Clear Creek Targeted Acquisition",
		longitude: -122.3826295,
		latitude: 47.23032901,
		level: 17,
		leadEntity: "Pierce Co Water Programs Div" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 6400000,
		benefit: "placeholder benefits go here"
	},
{
		name: "Kilisut Harbor Restoration 2016",
		longitude: -122.700705,
		latitude: 48.01826489,
		level: 11,
		leadEntity: "Hood Canal / North Olympic Salmon Coalition" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 4093665,
		benefit: "placeholder benefits go here"
	},
{
		name: "West Oakland Bay Restoration",
		longitude: -123.0911308,
		latitude: 47.21092124,
		level: 9,
		leadEntity: "Mason Conservation / Squaxin Island Tribe" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 3225750,
		benefit: "placeholder benefits go here"
	},
{
		name: "Barnum Point Acquisition",
		longitude:-122.4594265,
		latitude: 48.19755439,
		level: 13,
		leadEntity: "WRIA 6 / Whidbey Camano Land Trust" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 2186728,
		benefit: "placeholder benefits go here"
	},
{
		name: "Chico Bridge - Keta restore",
		longitude: 	-122.7090953,
		latitude: 47.59280209,
		level: 2,
		leadEntity: "West Sound / Suquamish Tribe" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 3442400,
		benefit: "placeholder benefits go here"
	},
{
		name: "Middle Fork Nooksack Fish Passage",
		longitude: -122.0744804,
		latitude: 48.7718476,
		level: 3,
		leadEntity: "WRIA 1/ City of Bellingham" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 10904369,
		benefit: "placeholder benefits go here"
	},
{
		name: "Dungeness Off-Channel Reservoir: Final Design",
		longitude: -123.1407178,
		latitude: 48.05338022,
		level: 16,
		leadEntity: "North Olympic Peninsula / Clallam Conservation District" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 1250000,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Hansen Creek Reach 5 Restoration",
		longitude: -122.2007297,
		latitude: 48.51534414,
		level: 7,
		leadEntity: "Skagit / Skagit County Public Works" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 3681245,
		benefit: "placeholder benefits go here"
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
		leadEntity: "North Olympic Peninsula / North Olympic Land Trust" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 1107550,
		benefit: "placeholder benefits go here"
	},
	{
		name: "Harper Estuary Bridge Construction",
		longitude: -122.5161102,
		latitude: 47.51689853,
		level: 8,
		leadEntity: "West Sound / Kitsap County" , 
		sponsor: "sponsor" ,
		marker: null,
		funding: 2469844,
		benefit: "placeholder benefits go here"
	}

];
  
//Google map  
var map;

function initMarkers() {
	$.each(projects, function(i, project) {
		project['marker'] = new google.maps.Marker({
				map: null,
				position: new google.maps.LatLng( project['latitude'], project['longitude'])
			});
	});
}

function showHideMarkers(sliderLevel) {
	$.each(projects, function(i, project) {
	if(project['level'] ===  sliderLevel) {
			var projectName = projects[sliderLevel]['name'];
			var projectRank = projects[sliderLevel]['level'];
			console.log(projectName + " = ranking " + projectRank );
			console.log ("Slider level = " + sliderLevel);
	} else {
			var projectName = project['name'];
			var projectRank = project['level'];
			console.log("is not " + projectName + " = ranking " + projectRank );
			console.log ("is not Slider level = " + sliderLevel);
		}
	if(project['level'] <= sliderLevel) {
			project['marker'].setMap(map);
			var fundingProject = project['funding'];
			
		} else {
			project['marker'].setMap(null);	
		}
	
	console.log (i + " = " +fundingProject);
	});

}


/*function showFunding(level) {
	$.each(projects, function(i, projectAgain) {
		if(projectAgain['level'] <= level) {
			var fundingProject = projectAgain['funding'];
			var fundingTotal = var fundingTotal + var fundingProject;
			console.log (fundingTotal);
		} else { console.log ("else ran");
		};
	});
}*/
function initMap() {	  
 	var mapOptions = {
        zoom: 8,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(48.14267633, -123.1301177)
    };
	
	

	initMarkers();

    map = new google.maps.Map(document.getElementById('map'), mapOptions);
	
}
