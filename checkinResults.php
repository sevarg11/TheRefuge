<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script will check in the member by updating the appropriate tables.
 * If the member is successfully checked in, the user will get a success page.
 * Otherwise, the user will be shown an error page.
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		$class = $_SESSION['class'];
		$points = $_SESSION['points'];
		$idNumber = $_SESSION['id'];
		$name = $_SESSION['name'];
		
		// Connect to the Database and make query to update point total
		include('./code/connectMembers.php'); 
		//include('../../../protected/code/connectMembers.php');

		$dbQuery1 = "UPDATE members SET points=(points + ".$points.") WHERE idNumber='".$idNumber."'";
		date_default_timezone_set('America/Phoenix');
		$time = time();
		$dbQuery2 = "INSERT INTO checkins (idNumber, class, checkinDate) VALUES ('$idNumber', '$class', '$time')";
		
		// Execute the query
		if (!mysql_query($dbQuery1) || !mysql_query($dbQuery2))
		{
			include('./master/top.php'); 			
			echo '<link rel="stylesheet" type="text/css" href="css/checkin.css" />';
			echo '<div id="checkinTitle">CHECK<span class="titleColor">IN</span></div>';
			echo '<div id="checkinAreaError">';
			echo '<p id="notFound">There was an error checking in. Point total was not updated, please try again later.</p>';
			echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu.</p>';
			echo '</div>';
			include('./master/bottom.php');
		}
		else
		{
			include('./master/top.php'); 
			echo '<link rel="stylesheet" type="text/css" href="css/checkin.css" />';
			echo '<div id="checkinTitle">CHECK<span class="titleColor">IN</span></div>';
			echo '<div id="checkinAreaError">	';
			echo '<p>'.$name.' was checked in successfully!</p>';
			echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
			echo '</div>';
			include('./master/bottom.php');
		}
		
		mysql_close(); // Close the connection, it's not necessary but still...
		
		// Unset session variables
		unset($_SESSION['points']);
		unset($_SESSION['id']);
		unset($_SESSION['name']);
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>