<?php
function TextareaToPara($string){

	$string = str_replace("\r\n\r\n","</p><p>",$string);
	$string = str_replace("\r\n","<br />",$string);
	$string = str_replace("\r","<br />",$string);
	$string = str_replace("<p></p>","",$string);
	//
	//allows ul and li elements in field
	$string = str_replace("<p><ul>","<ul>",$string);
	$string = str_replace("</ul></p>","</ul>",$string);
	$string = str_replace("<p><li>","<li>",$string);
	$string = str_replace("</li></p>","</li>",$string);
	$string = str_replace("</p><li>","<li>",$string);
	$string = str_replace("</li><p>","</li>",$string);
	//$string = htmlentities($string);
	return $string;
}
function convertLineReturns($string){
	$string = str_replace("\r\n","<br /><br />",$string);
	$string = str_replace("\r","<br />",$string);
	return $string;
}
function ParaToTextArea($string){
	$string = str_replace("</p><p>","\r\n\r\n",$string);
	$string = str_replace("</p><p>","\r\n",$string);
	$string = str_replace("<br />","\r",$string);
	$string = str_replace("<p></p>","",$string);
	//$string = htmlentities($string);
	return $string;
}
function CleanupSmartQuotes($text)    {
        $badwordchars=array(
                            chr(145),
                            chr(146),
                            chr(147),
                            chr(148),
                            chr(151)
                            );
        $fixedwordchars=array(
                            "'",
                            "'",
                            '&quot;',
                            '&quot;',
                            '&mdash;'
                            );
        return str_replace($badwordchars,$fixedwordchars,$text);
}
// this function removes any no alpha numeric characters and hyphen (-) from a string 
// to be used in a URL that search engines like
function cleanURLString($string){
	$string = str_replace("&amp;","and",$string);
	$string = html_entity_decode($string);
	$string = trim($string);
	$string = ereg_replace("[^ A-Za-z0-9\-]", "", $string);
	$string = str_replace(" ","-",$string);
	return $string;
}
function activateWebAddress($string, $CSSclass = '',$strLen = 0){
	if(!empty($CSSclass)){
		$CSSclass = 'class="'.$CSSclass.'"';
	}
	
	//$URLStringHTTP = "/http\:\/\/[A-Za-z0-9\-]+\.+[A-Za-z0-9\-]+\.+[A-Za-z\.]{2,6}+[^ ]*/";	
	$URLStringHTTP = "/http\:\/\/[A-Za-z0-9\-]+\.+[A-Za-z\.]{2,6}+[^ ]*/";	
	//$URLStringHTTP = "^(?=[^&])(?:(?<scheme>[^:/?#]+):)?(?://(?<authority>[^/?#]*))?(?<path>[^?#]*)(?:\?(?<query>[^#]*))?(?:#(?<fragment>.*))";
	//$URLStringHTTP = "%((((http[s]?|ftp)[:]//)([a-zA-Z0-9.-]+([:][a-zA-Z0-9.&amp;\%$-]+)*@)?[a-zA-Z][a-zA-Z0-9.-]+|[a-zA-Z][a-zA-Z0-9]+[.][a-zA-Z][a-zA-Z0-9.-]+)[.](com|edu|gov|mil|net|org|biz|pro|info|name|museum|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|az|ax|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)([:][0-9]+)*(/[a-zA-Z0-9.,;?'\\+&amp;\%$#=~_-]+)*)%";
	preg_match_all($URLStringHTTP,$string, $matchHTTP,PREG_PATTERN_ORDER);
	if(count($matchHTTP[0])>0){
		for($i=0; $i<count($matchHTTP[0]); $i++){
			if($strLen>0){
				$replacement = '<a href="'.$matchHTTP[0][$i].'" target="_blank" '.$CSSclass.' >'.substr($matchHTTP[0][$i],0,$strLen).'..</a>';
			} else {
				$replacement = '<a href="'.$matchHTTP[0][$i].'" target="_blank" '.$CSSclass.' >'.$matchHTTP[0][$i].'</a>';
			}

			$specialChars = array("?","/");
			$specialCharsReplace = array("\?","\/");
			$search  = '/'.str_replace($specialChars,$specialCharsReplace,$matchHTTP[0][$i]).'/';

			$string = str_replace($matchHTTP[0][$i] , $replacement, $string);
			//$string = ereg_replace($matchHTTP[0][$i], $replacement, $string);

		}
	}


	$URLStringWWW = "/www.+[A-Za-z0-9\-]+\.+[A-Za-z\.]{2,6}+[^ ]*/";		
	preg_match_all($URLStringWWW,$string, $matchWWW,PREG_PATTERN_ORDER);

	if(count($matchWWW[0])>0 && count($matchHTTP[0])==0){

		for($i=0; $i<count($matchWWW[0]); $i++){

			if($strLen>0){
				$replacement = '<a href="http://'.$matchWWW[0][$i].'" target="_blank" '.$CSSclass.'>'.substr($matchWWW[0][$i],0,$strLen).'..</a>';
			} else {
				$replacement = '<a href="http://'.$matchWWW[0][$i].'" target="_blank" '.$CSSclass.'>'.$matchWWW[0][$i].'</a>';
			}
			//$string = preg_replace(('/'.str_replace("/","\/",$matchWWW[0][$i]).'/'), $replacement, $string);
			//$string = ereg_replace($matchWWW[0][$i], $replacement, $string);
			$specialChars = array("?","/");
			$specialCharsReplace = array("\?","\/");
			$search  = '/'.str_replace($specialChars,$specialCharsReplace,$matchWWW[0][$i]).'/';

			$string = str_replace($matchWWW[0][$i] , $replacement, $string);
		}
	}
	return $string;
}

//
function convert_smart_quotes($string) { 
    $search = array(chr(145), 
                    chr(146), 
                    chr(147), 
                    chr(148), 
                    chr(151)); 
 
    $replace = array("'", 
                     "'", 
                     '"', 
                     '"', 
                     '-'); 
 
    return str_replace($search, $replace, $string); 
} 
?>