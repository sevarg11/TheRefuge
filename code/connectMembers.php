<?php
	// *** Place this file outside of public domain ***
	
	// Database credentials and query
	$dbUsername = 'root';
	$dbPassword = '263018';
	$dbName = 'members';
	
	// Try to connect to MySQL
	$connection = mysql_connect("localhost", $dbUsername, $dbPassword);

	if(!$connection)
	{
		header( "Location: ../error_dbLogin.php");
		exit;
	}	
	
	$selectDB = mysql_select_db($dbName, $connection); // Select the database
	if(!$selectDB)
	{
		header( "Location: ../error_dbLogin.php");
		exit;
	} 	
?>
