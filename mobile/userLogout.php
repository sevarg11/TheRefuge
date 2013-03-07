<?php 
	session_start(); // Start session
	
	$oldUsername = $_SESSION['username'];  // Used to check if they got to this page without logging in.
	unset($_SESSION['username']);		   // Unset the stored variable.
	session_destroy();					   // Destroy the session.

	include('../master/topMobile.php');
	  
	echo '<link rel="stylesheet" type="text/css" href="./css/index.css" />';
	
	// Check if you are logging out or if the user got to this page on accident
	if(!empty($oldUsername))
	{
		echo '<p>You have successfully logged out.</p>';
		echo '<p>Please click <a href="index.php" rel="external">here</a> to log back in.</p>';
	}
	else
	{
		echo '<p>You were never logged in.</p>';
		echo '<p>Please click <a href="index.php" rel="external">here</a> to log in.</p>';
	}
	
	include('../master/bottomMobile.php'); 
?>