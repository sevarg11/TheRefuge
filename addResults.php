<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script take all of the information in the session and upload it to
 * the database.
 ************************************************************************/

	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{	
		$idNumber = $_SESSION['idNumber'];
		$first = $_SESSION['first'];
		$middle = $_SESSION['middle']; 
		$last = $_SESSION['last'];
		$dateOfBirth = $_SESSION['dateOfBirth']; 
		$address = $_SESSION['address'];
		$phone = $_SESSION['phone']; 
		$school = $_SESSION['school']; 
		$grade = $_SESSION['grade'];
		$email = $_SESSION['email'];
		$church = $_SESSION['church']; 
		$parent1 = $_SESSION['parent1'];
		$parent2 = $_SESSION['parent2'];
		$parent1Contact = $_SESSION['parent1Contact'];
		$parent2Contact = $_SESSION['parent2Contact'];
		$profilePicture = $_SESSION['profilePicture'];
		$moralContract = $_SESSION['moralContract'];
		$parentConsent = $_SESSION['parentConsent'];
		$photoRelease = $_SESSION['photoRelease'];
		$skateWaiver = $_SESSION['skateWaiver'];
		
		// Connect to the Database and add the member to it
		include('code/connectMembers.php');
		//include('../../../protected/code/connectMembers.php');   
		$insertQuery = "INSERT INTO members (idNumber, first, middle, last, birthDate, address, phone, school, grade, email, church, profilePicture, moralContract, parentConsent, photoRelease1, photoRelease2, skateWaiver, parent1, parent1Contact, parent2, parent2Contact, points)";
		$valueQuery  = "VALUES ('$idNumber', '$first','$middle', '$last', '$dateOfBirth', '$address', '$phone', '$school', '$grade', '$email',  '$church', '$profilePicture', '$moralContract', '$parentConsent', '$photoRelease', '', '$skateWaiver', '$parent1', '$parent1Contact', '$parent2', '$parent2Contact', '0')";
		$dbQuery = $insertQuery." ".$valueQuery;
		
		// Execute query and check if it failed
		if (!mysql_query($dbQuery))
		{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addResultsTitle">ADD<span class="titleColor">MEMBER</span></div>';
				echo '<div id="addResultsMain">';
				echo '<p>There was an error adding member to database. <br> Member was not added, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');					
		}
		else
		{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addResultsTitle">ADD<span class="titleColor">MEMBER</span></div>';
				echo '<div id="addResultsMain">';
				echo '<p>Member added sucessfully!</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');	
		}
		mysql_close(); // Close the connection, it's not necessary but still...
		
		// Unset session variables
		unset($_SESSION['idNumber']);
		unset($_SESSION['first']);
		unset($_SESSION['middle']);
		unset($_SESSION['last']);
		unset($_SESSION['birthday']);
		unset($_SESSION['address']);
		unset($_SESSION['phone']);
		unset($_SESSION['school']);
		unset($_SESSION['grade']);
		unset($_SESSION['email']);
		unset($_SESSION['church']);
		unset($_SESSION['sports']);
		unset($_SESSION['food']);
		unset($_SESSION['parent1']);
		unset($_SESSION['parent2']);
		unset($_SESSION['parent1Contact']);
		unset($_SESSION['parent2Contact']);
		unset($_SESSION['profilePicture']);
		unset($_SESSION['moralContract']);
		unset($_SESSION['parentConsent']);
		unset($_SESSION['photoRelease']);
		unset($_SESSION['skateWaiver']);
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>