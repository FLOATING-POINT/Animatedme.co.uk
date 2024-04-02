<?php

require '_phplib/topMenu.php';
require '_phplib/header.php';

?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" />	
	<link rel="stylesheet" type="text/css" href="css/screen.css" />
	<link rel="stylesheet" type="text/css" href="css/fonts.css" />
	<link rel="stylesheet" type="text/css" href="css/drawing.css" />
	
	<title>AnimatedMe - Interactive </title>

	<script src="_lib/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
	<script src="_lib/jquery.easing.1.3.js" type="text/javascript" language="javascript"></script>
	<script src="_lib/main.js" type="text/javascript" language="javascript"></script>


    
    <!-- jQuery -->
	<!--<script type="text/javascript" src="./inc/jquery.1.7.1.min.js"></script>-->
	<script type="text/javascript" src="./inc/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.mouse.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.draggable.min.js"></script>	
	<!-- wColorPicker -->
	<link rel="Stylesheet" type="text/css" href="./inc/wColorPicker.1.2.min.css" />
	<script type="text/javascript" src="./inc/wColorPicker.1.2.min.js"></script>
	
	<!-- wPaint -->
	<link rel="Stylesheet" type="text/css" href="./inc/wPaint.css" />
	<script type="text/javascript" src="./inc/wPaint.js"></script>

	<script type="text/javascript" src="_lib/drawing-app.js"></script>

    <script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-4874824-26']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>

</head>
<body>

	<div id="container">

		<header>
			<?php getHeader(); ?>
	 	</header>
	 	<nav>
	 		<?php getTopMenu(); ?>			
		</nav>	

	 	<div id="content">

	 		<div id="thanks">
	 			<ul>
	 				<li>Thanks!, your character has been saved and will be ready for you at the festival!</li>
	 				<li class="btnL">Create another one?</li>
	 				<li class="btnR">I've finished</li>
	 			</ul>
	 		</div>
	 		<div id="wPaint"></div>

	 		<ul id="instructionsControls">
	 			<li class="ins">Draw your character over the top of the outline to the left (dont worry the outline won't be a part of your character).</li>
	 			<li class="ins">When you have finished, give your character a name and enter your name then click the "Save your character" button.</li>
	 			<li class="n"><div>Give your character a name:</div><input type="text" name="characterName" id="cName" /></li>
	 			<li class="n"><div>Your name:</div><input type="text" name="userName" id="uName" /></li>
				<li class="saveBtn" ><div id="saveImg" title="Save your character when you have finished">» Save your character!</div></li>
			</ul>
	 		
	 	</div>

	</div>
 	<footer>

 		<nav>
			<ul>
	 			<li class="left">
	 				
	 				<ul>
	 					<li>Created by:</li>
	 					<li class="flLogo"><a href="http://www.flpdigital.com">&nbsp;</a></li>
	 					<li class="com">Commissioned by <a href="http://phoenix.org.uk/" target="_blank">Phoenix Square</a> for <a href="http://www.sparkfestival.co.uk/" target="_blank">The Spark Children's Arts Festival</a></li>
	 				</ul>

	 			</li>

	 			<li class="right">
	 				<ul class="social">
	 					<li>
							<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
								<a class="addthis_button_preferred_1"></a>
								<a class="addthis_button_preferred_2"></a>
								<a class="addthis_button_preferred_3"></a>
								<a class="addthis_button_preferred_4"></a>
								<a class="addthis_button_compact"></a>
								<a class="addthis_counter addthis_bubble_style"></a>
							</div>
							<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
							<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f27d89d0650187a"></script>

						</li>
						<li class="cr">&copy; 2012 Brendan Oliver [ FLOATING POINT ]</li>
					</ul>
				</li>
	 		</ul>
		</nav>

 	</footer>
	
</body>
</html>
