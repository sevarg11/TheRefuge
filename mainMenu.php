<?php session_start(); // Resume session

 /***********************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script will display the main menu if the user is logged in. If
 * not, the user will be taken to the error page errorLogin.php.
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		include('./master/top.php'); 
?>

<link rel="stylesheet" type="text/css" href="./css/mainMenu.css" />
<ul>
	<li><a href="checkinStart.php" class="selectionItem">CHECK<span class="titleColor">IN</span></a></li>
	<li><a href="addStart.php" class="selectionItem">ADD<span class="titleColor">MEMBER</span></a></li>
	<li><a href="searchStart.php" class="selectionItem">SEARCH<span class="titleColor">MEMBER</span></a></li>
</ul>	

<?php 
		include('./master/bottom.php');
	}
	// Show error page if the user is not logged in
	else
	{
		include('./errorLogin.php');
	}
?>

