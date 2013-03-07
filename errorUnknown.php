<?php

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script shows an unknown error message.
 ************************************************************************/

	include('./master/top.php'); 

  echo '<link rel="stylesheet" type="text/css" href="./css/index.css" />';
  echo '<div id="loginTitle">LOG<span class="titleColor">IN</span></div>';
  echo '<div id="loginArea">';
  echo '<p>An unknown error occured, please try again.</p>';
  echo '<p>If the problem persists, contact the site admistrator.</p>';
  echo '<br>';
  echo '<p>Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
  echo '<p>or click <a href="index.php">here</a> to retry logging in.</p>';
  echo '</div>';
	include('./master/bottom.php');
?>