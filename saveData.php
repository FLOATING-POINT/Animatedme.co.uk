<?php

require '_phplib/Utils/class.mysqlConnection.php';
require '_phplib/Utils/functions.cleanVar.php';
require '_phplib/Utils/function.removeProfanity.php';
require '_phplib/Utils/function.sendSimpleMail.php';

$cName		= cleanVar($_POST['characterName'],true,false,false);
$uName 		= cleanVar($_POST['username'],true,false,false);
$data  		= cleanVar($_POST['data'],true,false,false);

$dataArr 	= explode('|',$data);
$filename 	= $dataArr[0];
$hash 		= $dataArr[1];
$targetHash = md5($filename.'sparkfunfestival');
$filename 	= str_replace('gallery/','',$filename);





$cleanCharacterName = $cName;
while(strlen($cleanCharacterName) != strlen(removeProfanity($cleanCharacterName))){
	$cleanCharacterName = removeProfanity($cleanCharacterName);
}

if(empty($cleanCharacterName)) $cleanCharacterName = 'Unnamed';


$cleanUserName = $uName;
$cleanUserName = removeProfanity($cleanUserName);

while(strlen($cleanUserName) != strlen(removeProfanity($cleanUserName))){
	$cleanUserName = removeProfanity($cleanUserName);
}

if(empty($cleanUserName)) $cleanUserName = 'Anonymous';


if($hash == $targetHash){

	$mysqlConn = new mysqlConnection();
	$mysqlConn->connect();

	$queryCheck = mysql_query("SELECT id FROM characters WHERE cfilename = '$filename' ") or die(mysql_error());
	$numrows = mysql_num_rows($queryCheck);
	
	if($numrows == 0){

		$query = mysql_query("INSERT INTO characters
								(
								cfilename, 
								cname, 
								uname
								)
								VALUES
								(
								'$filename', 
								'$cleanCharacterName', 
								'$cleanUserName'
								)") or die(mysql_error());
	}

	$to			= 'brendan.oliver@flpdigital.com';
	$re 		= 'New character added!';
	$msg 		= 'New character added!';
	$from 		= 'info@animatedme.co.uk';
	$fromname 	= 'AnimatedMe Bot';

	sendSimpleMail($to,$re,$msg,$from, $fromname);
}

echo ' complete ';

?>