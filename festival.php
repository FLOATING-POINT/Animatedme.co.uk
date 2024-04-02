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
    

	<script type="text/javascript" src="./inc/jquery.ui.core.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.mouse.min.js"></script>
	<script type="text/javascript" src="./inc/jquery.ui.draggable.min.js"></script>	

	<script src="http://maps.googleapis.com/maps/api/js?key={KEY_HERE}&sensor=true" type="text/javascript" language="javascript"></script>
	<script src="_lib/map.js" type="text/javascript" language="javascript"></script>


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

	 		<ul id="inner">

	 			<li><h1>The Spark Children's Arts Festival</h1></li>

	 			<li class="col">
	 				<ul>
		 				<li><div id="gMap2">&nbsp;</div></li>
		 				<li class="addr">Phoenix Square, Midland Street, Leicester LE1 1TG, Tel: 0116 242 2800. <a href="http://www.phoenix.org.uk" target="_blank">www.phoenix.org.uk</a>. 52.636631, -1.124904</li>
		 			</ul>
	 			</li>

	 			<li class="festinfo">The Spark Children's Arts Festival is a two-week summer festival of the performing and visual arts for children at venues in Leicester and Leicestershire.</li>
	 			<li class="festinfo">Running between 28th May 2012 and 10th June 2012 the festival has a wide range of events and activities for children aged 0 - 13 years.</li>
	 			<li class="festinfo">Animated Me will be running at "Sparking the Imagination" at <a href="http://phoenix.org.uk/" target="_blank">Phoenix Square</a> over the weekend of 9th and 10th june 2012 from 10am - 5pm. There are <a href="http://www.sparkfestival.co.uk/events,160.html" target="_blank">other cool activities</a> to get involved in alongside Animated Me.  </li>
	 			<li class="festinfo">To find out more about the events and the latest news head over to <a href="http://www.sparkfestival.co.uk" target="_blank">www.sparkfestival.co.uk</a></li>
	 			<li class="festinfo">We hope to see you there!</li>


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
