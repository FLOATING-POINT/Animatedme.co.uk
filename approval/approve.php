<?php

require '../_phplib/Utils/class.mysqlConnection.php';
require '../_phplib/Utils/functions.cleanVar.php';

$id = cleanVar($_POST['id'],true, false, false);

$mysqlConn = new mysqlConnection();
$mysqlConn->connect();
$output	= '';

if(!empty($id)){

	$query = mysql_query("UPDATE characters SET approved = '1' WHERE id=$id ") or die(mysql_error());
	echo $query;

} else {
	echo 'noid';
}

