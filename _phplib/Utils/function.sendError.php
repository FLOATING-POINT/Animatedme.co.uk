<?php

function sendError($mysqlError){
	$errorID =debug_backtrace();
	//cleanVar($errorID,false,false,true);
	$err_function = $errorID[0]["function"];
	$err_line = $errorID[0]['line'];
	$err_file = $errorID[0]['file'];
	$err_class = $errorID[0]["class"];
	$err_object = $errorID[0]["object"];
	$err_type = $errorID[0]["type"];
	$err_args = $errorID[0]["args"];
	$mysql_Error = cleanVar($mysqlError,false,false,true);
	$dateOccurred = date("l dS of F Y h:i:s A");
$comments="Please find below the details of the error below:
Day of error:  $dateOccurred \n\r
Error function: ".$err_function." \n
Error line: $err_line \n
Error file: $err_file \n
Error class: $err_class \n
Error object: $err_object \n\r";
for($i=0;$i<count($errorID[0]["args"]);$i++){
$comments.="Error args: ".$errorID[0]["args"][$i]." \n";
}
$comments.="Error type: $err_type \n

Error mysql: $mysql_Error \n\r

Kind regards
".$_SERVER["SERVER_NAME"]."
Administrator: Brendan Oliver (FSW Design)
";
$to = "bmoliver@fswdesign.com";
$re = "DB Error report ".$_SERVER["SERVER_NAME"];
$msg = $comments;
#set the From: header
$headers = "From: errorReporting@".$_SERVER["SERVER_NAME"]." \r\n";
$mailSend=mail($to,$re,$msg, $headers);
}
?>