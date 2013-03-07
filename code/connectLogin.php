<!-- 
 ***********************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script connects to the administrator database. This DB is used 
 * for logging in a user. If there are any errors encountered, it will 
 * take you to error page errorDbLogin.php.
 *
 * NOTE: Place this file outside of public domain.
 *********************************************************************** 
 -->


<?php
	// *** Place this file outside of public domain ***

	// Database credentials and query
	$dbUsername = 'root';
	$dbPassword = '263018';
	$dbName = 'adminUsers';
	
	// Try to connect to MySQL
	$connection = mysql_connect("localhost", $dbUsername, $dbPassword);
	
	if(!$connection)
	{
		header( "Location: ./errorDbLogin.php");
		exit;
	}
	
	$selectDB = mysql_select_db($dbName, $connection); // Select the database
	
	if(!$selectDB)
	{
		header( "Location: ./errorDbLogin.php");
		exit;
 	} 
 	
?>
