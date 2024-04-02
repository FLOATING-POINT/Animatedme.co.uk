<?php  
function sendSimpleMail($to,$re,$msg,$from, $fromname){
	
	if(empty($re) || empty($msg) || empty($to) || empty($from)){
		return FALSE;
		exit;
	} else {
	
		//------------------------------------------------------------
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
			$eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
			$eol="\r";
		} else {
			$eol="\n";
		} 
		//------------------------------------------------------------
		$headers = '';
		$headers .= 'From: '.$fromname.' <'.$from.'>'.$eol;
		$headers .= 'Reply-To: '.$fromname.' <'.$from.'>'.$eol;
		$headers .= 'Return-Path: '.$fromname.' <'.$from.'>'.$eol;     // these two to set reply address
		$headers .= "Message-ID: <".time()." TheSystem@".$_SERVER['SERVER_NAME'].">".$eol;
		$headers .= "X-Mailer: PHP v".phpversion();  
		//$headers .= $bcc;
		
		$mailSend = mail($to,$re,$msg,$headers);
		
		echo 'mailSend '.$mailSend.'<br />';
		return TRUE;
	}
}