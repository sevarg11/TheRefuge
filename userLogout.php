<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script contains all the logic to log out a user.
 ************************************************************************/
	
	$oldUsername = $_SESSION['username'];  // Used to check if they got to this page without logging in.
	unset($_SESSION['username']);		   // Unset the stored variable.
    session_unset();                       // Unset all session variables.
    session_destroy();					   // Destroy the session.
    session_write_close();                 // Be overly thorough

	include('./master/top.php');
	  
	echo '<div id="loginTitle">LOG<span class="titleColor">OUT</span></div>';
	echo '<link rel="stylesheet" type="text/css" href="./css/index.css" />';
	echo '<div id="loginArea">';
	
	// Check if you are logging out or if the user got to this page on accident
	if(!empty($oldUsername))
	{
		echo '<p>You have successfully logged out.</p>';
		echo '<p>Please click <a href="index.php">here</a> to log back in.</p>';
	}
	else
	{
		echo '<p>You were never logged in.</p>';
		echo '<p>Please click <a href="index.php">here</a> to log in.</p>';
	}

	echo '</ div>';
	include('./master/bottom.php'); 
?>