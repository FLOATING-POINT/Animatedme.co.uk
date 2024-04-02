<?php 
//error_reporting(0);
function sendMail($to, $from, $fromname, $emailsubject, $message, $file=NULL, $filename=NULL){

	if(!function_exists('mime_content_type')){
		require 'function.mime_content_type.php';
	}
	
	if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
	  $eol="\r\n";
	} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
	  $eol="\r";
	} else {
	  $eol="\n";
	} # File for Attachment
	
if($file!=NULL){

	$attachment = $file;//
	$f_name=$attachment;    // use relative path OR ELSE big headaches. 
	$handle=fopen($f_name, 'rb');
	$f_contents=fread($handle, filesize($f_name));
	$f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
	$f_type=filetype($f_name);
	fclose($handle);
	
}
// ----------------------------------------------------------------------
$msg = "";
# To Email Address
$emailaddress = $to;//
#
$body = $message;
#
# Common Headers
$headers = '';
$headers .= 'From: '.$fromname.' <'.$from.'>'.$eol;
$headers .= 'Reply-To: '.$fromname.' <'.$from.'>'.$eol;
$headers .= 'Return-Path: '.$fromname.' <'.$from.'>'.$eol;     // these two to set reply address
$headers .= "Message-ID: <".time()." TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
$headers .= "X-Mailer: PHP v".phpversion().$eol;           // These two to help avoid spam-filters
# Boundry for marking the split & Multitype Headers
$mime_boundary=md5(time());
$headers .= 'MIME-Version: 1.0'.$eol;
$headers .= "Content-Type: multipart/mixed; boundary=\"".$mime_boundary."\"".$eol;
$msg = "This is a multi-part message in MIME format.".$eol.$eol;
# Attachment
$msg .= "--".$mime_boundary.$eol;
$bnd = md5(time()).rand(1000,9999);
$msg .= "Content-Type: multipart/alternative; $eol       boundary=\"".$bnd."\"".$eol.$eol;
$msg .= "--".$bnd.$eol;
$msg .= "Content-Type: text/plain; charset=iso-8859-1".$eol;
$msg .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$msg .= $body.$eol;
$msg .= "--".$bnd."--".$eol;
$msg .= "--".$mime_boundary.$eol;
if($file!=NULL){
$msg .= "Content-Type: ".mime_content_type($f_name)."; name=\"".$filename."\"".$eol;  
//$msg .= "Content-Type: ".mime_content_type($f_name)." name=\"".$filename."\"".$eol;  
//$msg .= "Content-Type: application/pdf; name=\"".$filename."\"".$eol;  
$msg .= "Content-Transfer-Encoding: base64".$eol;
$msg .= "Content-Disposition: attachment; filename=\"".$filename."\"".$eol.$eol; 
$msg .= $f_contents.$eol.$eol;
}

$msg .= "--".$mime_boundary."--".$eol.$eol;
#
# SEND THE EMAIL
ini_set('sendmail_from',$from);  // the INI lines are to force the From Address to be used !

$mailResult = mail($emailaddress, $emailsubject, $msg, $headers);
ini_restore('sendmail_from'); 
return $mailResult;
}
?>