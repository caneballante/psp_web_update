_configOptions = {
	
	//Enter a title, if no title is specified, the webmap's title is used.
	//title should be readable from ArcGIS.com viewer TOC
	title: "West Central LIO Near Team Actions",
	
	//Enter a subtitle, if not specified the ArcGIS.com web map's summary is used
	subtitle: "Interactive map of West Central LIO's Near Term Actions (NTA) for the Puget Sound Partnership's 2014 Action Agenda. West Central LIO has 28 NTAs in the Action Agenda, some of which represent more than one location or are implemented over a geographic area, e.g. county-wide",
	
	//id for satellite (or intended large scale) web map
    webmap_largescale: "fe8f2bc4adf845569fcf52b52f650ccd", 
	
	//id for overview web map; this is the map that contains the content point layer
	webmap_overview: "ecbc5c4f8ec2442182f8e0a49332393a",
	
	//layer in overview webmap which provides the countdown content
	contentLayer: "WestCentralNTAs", 
	fieldName_Rank: "rank",
	fieldName_Name: "name",
	//NOTE: if level field doesn't exist, app will use defaultLargeScaleZoomLevel
	fieldName_Level: "level",

	//Initial zoom level for overview map
	initialZoomLevel: 9,
	
	//Initial overview map zoom level for wider map aspect ratios
	initialZoomLevelWide: 10,
	
	//If no zoom level is encoded for the feature, use this zoom 
	//level for the large scale map
	defaultLargeScaleZoomLevel: 15,
	
	showIntro: false,
	popupHeight: 450,
	popupLeftMargin: 40
	
}
