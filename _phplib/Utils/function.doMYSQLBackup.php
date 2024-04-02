<?php
function doMYSQLBackup(){
	//------------------------------------------------------------------------------
	error_reporting(E_ALL);
	//------------------------------------------------------------------------------
	if(!class_exists('mysqlConnection')){
		require 'class.mysqlConnection.php';
	}
	//------------------------------------------------------------------------------
	$mysqlConn = new mysqlConnection;
	$mysqlConn->connect();
	$conn = $mysqlConn->getConnection();
	//------------------------------------------------------------------------------
	if(!function_exists('sendError')){
		require 'function.sendError.php';
	}
	//------------------------------------------------------------------------------
	$backupDirectoryName = "mysqlbackups";
	$sqlFiles = array();
	//------------------------------------------------------------------------------
	//
	$backupDirectoryName = "mysqlbackups";
	// the directory will be created for you if it doesnt exist

	function doSendBackUp($attachments=false, $backupDirectoryName){
	
		//------------------------------------------------------------------------------
		if(!function_exists('sendMail')){
			require 'function.sendMail.php';
		}
		//------------------------------------------------------------------------------
		$to = 'bmoliver@fswdesign.com';
		$from = 'backups@fswdesign.com';
		$fromname = $_SERVER['SERVER_NAME'].' Backup';
		$emailsubject = $_SERVER['SERVER_NAME'].'- Backup';
		$message = $_SERVER['SERVER_NAME'].' - '. date("Y-m-d H:i ").' MYSQL Backups attached';

		//foreach ($attachments as $attachment){
		for ($i = 0; $i<count($attachments); $i++){	
		
			$file = $attachments[$i];
			$filename = str_replace($backupDirectoryName.'/', '', $file);
			$send = sendMail($to, $from, $fromname, $emailsubject, $message, $file, $filename);
			unlink($file);
			
		}
	}
	//////////////////////////////////////////////////////////////////////////////////////
	//
	//////////////////////////////////////////////////////////////////////////////////////
	function doWriteFile( $backupDirectoryName, $mysqlDataFile, $dname, &$sqlFiles){
	
		# Save the file
		$dir = './'.$backupDirectoryName;
		
		if(!file_exists($dir)){
			mkdir($dir,0777);
		}	
		
		$fname = tempnam($dir.'/',date("G-d-m-Y"));
		$fp = fopen($fname, 'w');	
		fwrite($fp, $mysqlDataFile);
		fclose($fp);
		
		$actualFileName = $dir.'/MySQL-backup-DB-'.$dname.'-'.date("G-d-m-Y").'.sql';
		copy($fname,$actualFileName);
		
		unlink($fname);
		
		array_push($sqlFiles,substr($actualFileName,2,strlen($actualFileName)));
		
		return $actualFileName;
		
	}
	function datadump($dbname, &$conn) {
		//------------------------------------------------------------------------------
		if(!function_exists('getEndOfLine')){
			require 'function.getEndOfLine.php';
		}
		$eol = getEndOfLine();
		//------------------------------------------------------------------------------
	
		mysql_select_db($dbname, $conn) or sendError(mysql_error());
	
		$result = "# MySQL Version: ".mysql_get_server_info().$eol;
		$result .= "# Dump of $dbname ". $eol;
		$result .= "# Dump DATE : " . date("d-M-Y") .$eol;
		$result .= "create database if not exists `$dbname`;".$eol;	
		$result .= "use `$dbname`;".$eol;	
			
		$showTables = mysql_query("SHOW TABLES FROM ".$dbname);
		
		if($showTables){
		
			while ($row = mysql_fetch_row($showTables)) {
			
				$tableName = $row[0];
				
				$result .= "drop table if exists `$tableName`;".$eol;
				$qry = "SHOW CREATE TABLE {$tableName}";
				//-------------------------------------------------------
				$tableDesc = mysql_query($qry);
				if($tableDesc){
					while($array = mysql_fetch_row($tableDesc)) {
					
						$result .=  $array[1].";\n";
						
					}
				
					$query = mysql_query("select * from $tableName");
					$num_fields = @mysql_num_fields($query);
					$numrow = mysql_num_rows($query);
					
					//-------------------------------------------------------
					for ($i =0; $i<$numrow; $i++) {
					
						$row=mysql_fetch_array($query);
						$result .= "INSERT INTO $tableName VALUES(";
						
						for($j=0; $j<$num_fields; $j++) {
						
							$row[$j] = addslashes($row[$j]);
							$row[$j] = ereg_replace("\n","\\n",$row[$j]);
							
							if (isset($row[$j])){
							
								 $result .= "'".$row[$j]."'" ; 
								 
							} else {
							
								 $result .= "''";
								 
							}
							
							if ($j<($num_fields-1)){
							
								$result .= ",";
							}
						}  
						 
						$result .= ");".$eol;
					 }
				 }
			}
		}    
		$result .= $eol.$eol;
		return $result;
	}
	// ------------------------------------------------------------------------------------
	// LIST ALL AVAILABLE DBs
	// ------------------------------------------------------------------------------------
	$db_list_resource = mysql_list_dbs($conn);
	$db_list = array();
	
	while ($row = mysql_fetch_object($db_list_resource)) {
	
		if($row->Database != "mysql" && $row->Database != "information_schema"){
		
			array_push($db_list, $row->Database);
			
		}
	}
	// ------------------------------------------------------------------------------------
	for($i=0; $i<count($db_list); $i++){
	
		$mysqlData = datadump($db_list[$i], $conn);
		
		$mysqlDataFile = doWriteFile($backupDirectoryName, $mysqlData, $db_list[$i], $sqlFiles);
		
		if($i == (count($db_list)-1)){		
		
			doSendBackUp($sqlFiles, $backupDirectoryName);
			
		}
	}
}
doMYSQLBackup();
?>