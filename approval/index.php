<?php

require '../_phplib/Utils/class.mysqlConnection.php';

$mysqlConn = new mysqlConnection();
$mysqlConn->connect();
$output	= '';

$query = mysql_query("SELECT * FROM characters WHERE approved = '0' ORDER BY id DESC ") or die(mysql_error());


while($r =  mysql_fetch_array($query)){

	$characterName 	= $r['cname'];
	$userName 		= $r['uname'];
	$id 			= $r['id'];
	$imgURL			= '../gallery/'.$r['cfilename'];

	$output	.= '<li class="item">
 					<ul >
		 				<li class="img"><img src="'.$imgURL.'" alt="'.$characterName.'" /></li>
		 				<li class="title">'.$characterName.' by '.$userName.'</li>
		 				<li class="approveBtn" id="'.$id.'">Approve this character</li>
		 			</ul>
 				</li>';

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="favicon.ico" />	
	<link rel="stylesheet" type="text/css" href="../css/screenApproval.css" />

	<script src="../_lib/jquery-1.7.2.min.js" type="text/javascript" language="javascript"></script>
	<script src="../_lib/jquery.easing.1.3.js" type="text/javascript" language="javascript"></script>
	<script type="text/javascript" src="../_lib/approval.js"></script>

	
	<title>AnimatedMe - Coming soon</title>
</head>
<body>
	<ul>
		<?php echo $output; ?>
	</ul>
</body>
</html>
