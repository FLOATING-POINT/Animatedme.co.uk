// JavaScript Document

jQuery(document).ready( function($) {

	var showImages 		= false;
	var showVideos 		= false;
	var showUpdates 	= false;
	var showTweets 		= false;
	var showStadiums 	= true;

	var playerW			= 640;
	var playerH			= 480;

	var templateUrl 	= 'http://localhost/animatedme.co.uk/';

	var gApiKey 		= 'AIzaSyBKSILeKaYWXiLUJu0yEpZz9SXUkfVUQoc';

	var videoShown = true;
	var winW = 1000, winH = 460;
	
	function setWinDims(){

		if (document.body && document.body.offsetWidth) {
			winW = parseInt(document.body.offsetWidth);
			winH = parseInt(document.body.offsetHeight);
		}
		if (document.compatMode=='CSS1Compat' &&
			document.documentElement &&
			document.documentElement.offsetWidth ) {
			winW = parseInt(document.documentElement.offsetWidth);
			winH = parseInt(document.documentElement.offsetHeight);
		}
		if (window.innerWidth && window.innerHeight) {
			winW = parseInt(window.innerWidth);
			winH = parseInt(window.innerHeight);
		}

	}
	setWinDims();

	var leftPos 		 = (winW-playerW)*.5;
	var scrollTop 		= $(window).scrollTop();

	
	//------------------------------------------------------------------------------------

	var gmap;
	var zoomLevel = 16;
	var map;

	var mapOptions = {
		center: new google.maps.LatLng(52.636631,-1.124904),
		zoom: zoomLevel,
		mapTypeId: google.maps.MapTypeId.TERRAIN  
		};


	var stadiumsMarkersArray 	= [];
	var imagesMarkersArray 		= [];
	var videosMarkersArray 		= [];
	var updatesMarkersArray 	= [];
	var tweetsMarkersArray 		= [];


	var stadiums 	= [];
	var images 		= [];
	var videos 		= [];
	var tweets 		= [];
	var updates 	= [];

	var markerSize 		= new google.maps.Size(141, 92);
	var markerOrigin	= new google.maps.Point(0, 0);
	var markerAnchor	= new google.maps.Point(30, 82);

	//------------------------------------------------------------------------------


	function initializeMap(options) {
		
		//console.log('map '+document.getElementById("gMap"))
		var map;

		if(document.getElementById("gMap") != null){
			map = new google.maps.Map(document.getElementById("gMap"),	options);
		} else {
			map = new google.maps.Map(document.getElementById("gMap2"),	options);
		}
		
		return map;
	}


	function addMarker() {

		var marker;
		var shadow;

		//console.log(locations);
		// Add markers to the map
		marker 				= new google.maps.MarkerImage(templateUrl+'/images/mapPSMarker.png', markerSize, markerOrigin, markerAnchor);
		//shadow 				= new google.maps.MarkerImage(templateUrl+'/images/mapIconShadow.png', markerSize, markerOrigin, markerAnchor);
		var markershape 	= {  coord: [1, 1, 141, 92 ], type: 'rect'  };
		var myLatLng 		= new google.maps.LatLng(52.636631,-1.124904);
		var marker 			= new google.maps.Marker({
		    position: myLatLng,
		    map: gmap,		   
		    title: 'Phoenix Square',
		    zIndex: 20,
		    animation: google.maps.Animation.DROP,
		    icon:marker,
		    //shadow: shadow,
		    shape: markershape


		});

	}
	
	//---------------------------------------------------------------------------------


	gmap  	= initializeMap(mapOptions);
	//map 	= new google.maps.Map(document.getElementById("gMap"), mapOptions);
	addMarker()

});