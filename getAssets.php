<?php

require '_phplib/Utils/class.mysqlConnection.php';
require '_phplib/Utils/functions.cleanVar.php';

$id		= 0;
if(isset($_GET['id'])) $id		= cleanVar($_GET['id'],true,false,false);

$output = '<assets>'; 


//if(!empty($id)){

	$mysqlConn = new mysqlConnection();
	$mysqlConn->connect();

	$query 		= mysql_query("SELECT * FROM characters WHERE approved = '1' AND id > $id ") or die(mysql_error());

	while($r = mysql_fetch_array($query)){

			$id 			= ucfirst(trim($r['id']));
			$creatorName 	= ucfirst(trim($r['uname']));
			$characterName 	= ucfirst(trim($r['cname']));
			$imgURL 		= 'http://animatedme.co.uk/gallery/'.$r['cfilename'];

			if(empty($characterName)) $characterName = 'Mr No Name';
			if(empty($creatorName)) $creatorName = 'Anonymous';

			$output .= '<asset>'; 
				$output .= '<id>'.$id.'</id>'; 
				$output .= '<crname>'.$creatorName.'</crname>'; 
				$output .= '<charname>'.$characterName.'</charname>'; 
				$output .= '<imgurl>'.$imgURL.'</imgurl>'; 
			$output .= '</asset>'; 

	}
//}

$output .= '</assets>'; 

header('Content-Type: text/xml');
header('Content-Length: '.strlen($output).'');
header("Cache-Control: no-cache, must-revalidate"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
echo utf8_encode($output);

?>