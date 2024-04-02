

jQuery(document).ready( function($) {

	var options          = new Object();
	options.mode         = "Pencil";
	options.lineWidthMax = 40;

	$("#wPaint").wPaint(options);

	var cName  = '';
	var uName  = '';
	//var context = $("#wPaint").wPaint("image").getContext('2d');
	var canvasData;

	function saveImage(){

		var canvasData = $("#wPaint").wPaint("image");
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function() { 4
			if (ajax.readyState == 4){
			   // Received, OK
			   if(ajax.status  == 200){
			   		
			   		var resp = ajax.responseText.toString(); 
			   		console.log(resp);
			   		// do thank you

			   		// save name 
			   		$.post("saveData.php", { characterName: cName, username: uName, data:resp } , function(data){
			   			console.log(data);
			   			
			   			$("#thanks").show('slow', function() {
						    // Animation complete.
						});
			   			//context.clearRect(0, 0, canvasData.width, canvasData.height);

			   		} );
			   }
			   
			} else{
			  // Wait...
			}
		}

		ajax.open("POST",'saveimage.php',false);
		ajax.setRequestHeader('Content-Type', 'application/upload');
		ajax.send(canvasData);  

	}
	$('#saveImg').click(function() {
		
		// validation
		var passed = true;
		cName  = $("#cName").val();
		uName  = $("#uName").val();

		if(cName == '') passed = false;
		if(uName == '') passed = false;

		if(passed){
			saveImage();
		} else {
			// alert the user
			alert("Please enter your characters name and your name");
		}

	});

	function clearCanvas(){
		var canvas = document.getElementsByTagName("canvas")[0];
	    var context = canvas.getContext("2d");
	    context.clearRect(0, 0, canvas.width, canvas.height);
	}
	function hideThanks(){
		$("#thanks").hide('slow', function() {
	    	// Animation complete.
	  	});
	}

	//Create another one?
	$('.btnL').click(function() {
		$("#cName").val(' ');
		clearCanvas();
		hideThanks();
	});

	//i'm finished
	$('.btnR').click(function() {
		$("#cName").val(' ');
		$("#uName").val(' ');
		hideThanks();
	});

	$('.prev').click(function() {
		$("#cName").val(' ');
		$("#uName").val(' ');
		hideThanks();
	});

	

});