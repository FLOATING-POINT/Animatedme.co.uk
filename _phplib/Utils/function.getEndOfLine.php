<?php
function getEndOfLine(){

	if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		$eol="\r\n";
	} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		$eol="\r";
	} else {
		$eol="\n";
	}
	
	return $eol;
}
?>