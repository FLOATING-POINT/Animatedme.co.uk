// JavaScript Document

jQuery(document).ready( function($) {


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


	var originPosY 	= (winW - 960)*.5;
	var curObjectId	= 0;
	var aniSpeed 	= 1250;
	var easeType 	= 'easeInOutSine';
	var nObjects 	= 5;

	for(i=1; i < nObjects; i++){
		// setup//
		$('.id'+i).css({
			opacity: 0.0,
		   	left: 2000
		});
	}


	function moveObjects(){

		var leftPos = 0;
		var alpha 	= 0.0;

		for(i=0; i < nObjects; i++){

			leftPos = (i - curObjectId )* (winW*2);
			
			i == curObjectId ? alpha = 1.0 : alpha = 0.0 ;

			

			$('.id'+i).delay(0).animate(
				{ 	opacity: alpha,
					left: originPosY + leftPos,
				}, 
				{
				duration: aniSpeed, 
				easing: easeType
			});

		}

	}

	$('.logo').click(function() {
		
		curObjectId = 0;
	  	moveObjects();

	});

	$('.btnLrg').click(function() {
		curObjectId = 1;
	  	moveObjects();
	});	
	window.onresize = function(event) {
    	setWinDims();
    	originPosY 	= (winW - 960)*.5;
    	aniSpeed 	= 250;
    	moveObjects();
    	aniSpeed 	= 1250;
	}

	

});