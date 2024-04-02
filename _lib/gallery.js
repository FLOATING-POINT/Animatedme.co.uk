

jQuery(document).ready( function($) {

	var aniSpeed 	= 1000;
	var easeType 	= 'easeInOutBack';
	var curPos		= $('.logo').position().left;
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
	window.onresize = function(event) {
    	setWinDims();
	}

	function move(){
		$('#main').delay(0).animate(

			{ 	left: curPos	}, 

			{
			duration: aniSpeed, 
			easing: easeType
		});
	}
	move();


	$('.prev').click(function() {
		curPos += 900;

		var pp = $('.logo').position().left;// + $('#c').width();
		console.log(pp);
		
		if(curPos>pp) curPos = pp;
		move();
		
	});

	$('.next').click(function() {

		curPos -= 900;
		var np = $('.logo').position().left + $('#c').width();
		console.log(np);

		if(curPos < ($('#main').width()- np)*-1 )  curPos = ($('#main').width()- np)*-1;

		console.log(curPos);

		move();		
		
	});

	

});