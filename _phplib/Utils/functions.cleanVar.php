<?php
// ------------------------------------------------------------------------------------------------
// String Cleaning Functions v1.6 by Brendan Oliver March 2006. http://www.thewoom.com - http://www.fswdesign.com
// ------------------------------------------------------------------------------------------------
// Distibution
// ------------------------------------------------------------------------------------------------
// This script and the code contained within it are distributed under the GNU General Public License Agreement
// You can access the agreement from http://www.gnu.org
// You may use this script and the code contained within in any of your projects for free. 
// All I ask is you keep the reference on line 3 in tack including the reference to http://www.thewoom.com -  http://www.fswdesign.com
// 
// WHAT DOES THE SCRIPT DO?
// ------------------------------------------------------------------------------------------------
// This script is amined at providing a simple mechanism to 'clean' client provided variables in 
// order to prevent exploits of your scripts written in PHP. 
// This script prevents currently known methods for mail injections, SQL injections and 
// Cross Site Request Forgeries (CSRF) from the image tag <img />
// ------------------------------------------------------------------------------------------------
// WHAT DOES THE SCRIPT NOT DO?
// ------------------------------------------------------------------------------------------------
// Currently the script does not COMPLETELY cover Cross Site  Request Forgeries (CSRF) and 
// Cross Site Scripting (XSS) although the script will attempt will remove well formed <script> tags 
// and other well-formed html tags from any variable passed to the function.
//
// Ths script uses some of PHP's replacing fucntions to remove potentially harmful pieces of code 
// from varaiables that have been submitted to it. It has been written to work with PHP 3.0.6 upwards 
// and will take advantage of PHP 5 functions where they are available 
// If PHP 5 is NOT available the scripts will work fine but all varaibles passed to the script will 
// be converted to all lowercase characters and returned to your scripts in lowercase.
// ------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------
//	HOW DO I USE THE SCRIPT?
// ------------------------------------------------------------------------------------------------
// see the sample file (cleanVarsSample.php) for practical use of this script
// $var is the var to be cleaned and is passed to the script. Once 'cleaned' the var is returned 
// to your page for use in your own code.
// $sql is a boolean value and indicates whether or not the var will be used within a query 
// $mail is a boolean value and indicates whether or not the var will be ised with mail()
// ------------------------------------------------------------------------------------------------
// DISCAIMER:
// ------------------------------------------------------------------------------------------------
// This script is FREE for you to use on your own PHP projects. The script is provided on an as is 
// basis and I accept no liability for any improper use, misuse or for failure of the script.
// I encourage you to develop the script for your own purposes and as attacking methods develop. 
// If you do modify the script please let me know by forwarding the modified script to bmoliver@fswdesign.com 
// so that your modifications can be evaluated and shared with other users! All comments and suggestions 
// are also welcome.
//
// cleaning function to prevent exploits
function cleanVarsForMail($dirtyString){
	$problemStrings = array("mime-version:","content-type:","../","./");
	// convert dirty string to lower case for replace function to work effectively
	if(function_exists('stri_replace')){
	// PHP 5+
	// use case-insensitive stri_replace
		foreach($problemStrings as $value){	
			$dirtyString = stri_replace($problemStrings,' ',$dirtyString);	
		}
 	} else {
	// (PHP4.0.5+)
	$tempDirtyString = strtolower($dirtyString);	
		for($i=0;$i<count($problemStrings);$i++){
		$search = strpos($tempDirtyString,$problemStrings[$i]);	
			if($search!=FALSE){
			//stop the loop as match has been found
			break;
			}
		}
		if($search!=FALSE){
		$dirtyString = strtolower($dirtyString);
			foreach($problemStrings as $value){		
				// remove problem strings
				$dirtyString = str_replace($problemStrings,' ',$dirtyString);		
			}
		}
	}
	if($search!=FALSE){		
		$msg = "The following message was submitted with potentially unsafe content:
		\"".$dirtyString."\"
		user agent:\"".$_SERVER['HTTP_USER_AGENT']."\"
		ip:\"".$_SERVER['REMOTE_ADDR']."\" ";
		mail("bmoliver@fswdesign.com","Potentail mail form hack", $msg,"FROM:mailprotect@fswdesign.com"); 
	}	
	$cleanString = $dirtyString;
	return $cleanString;	
}
function trimValue(&$value){
   $value = trim($value);
   return $value;
}
// General all purpose function
function cleanVar($var,$forSQLWithTags,$forSQLNoTags,$forMail){
	if($forSQLWithTags===true){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = stripslashes($var);
		$var = mysql_escape_string($var);
	}
	if($forSQLNoTags===true){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = stripslashes($var);
		$var = strip_tags($var);
		// uncomment the next line and delete line 103 if you want use to use "style" tags
		//$var = strip_tags($var, '<strong><i><u>');
		$var = mysql_escape_string($var);
	}
	if($forMail===true){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = strip_tags($var);
		$var = cleanVarsForMail($var);
	}
	return $var;	 
}
// Super Simple version
function cleanVarSimple($var,$forSQL,$forMail){
	if($forSQL===true){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = stripslashes($var);
		$var = mysql_escape_string($var);
	}

	if($forMail===true){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = strip_tags($var);
		$var = cleanVarsForMail($var);
	}
	return $var;	 
}
function cleanMailVars($var){
		$var = utf8_decode($var);
		$var = urldecode($var);
		$var = strip_tags($var);
		$var = cleanVarsForMail($var);

	return $var;	 
}

?>