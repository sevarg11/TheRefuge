<?php 

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script shows database error message.
 ************************************************************************/
include('./master/top.php'); ?>

<link rel="stylesheet" type="text/css" href="css/index.css" />
<div id="loginTitle">LOG<span class="titleColor">IN</span></div>
<div id="loginArea"> 
	<p>There was an error connecting to the database. Please try again later.</p>
	<p>If the error persists, please contact the site administrator.</p>
	<p>Please click <a href="index.php">here</a> to retry logging in.</p>
</div>
<?php include('./master/bottom.php'); ?>