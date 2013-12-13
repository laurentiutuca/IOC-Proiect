<?php

$username = "root";
$password = "root";
$hostname = "localhost";
$database = "db_feedbacktheworld"; 

if (!isset($connection)) {
	//connection to the database
	$connection = mysql_connect($hostname, $username, $password);
	$selected = mysql_select_db($database);
}

?>
