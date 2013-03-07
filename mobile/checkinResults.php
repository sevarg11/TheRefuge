<?php
	session_start(); // Start session
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		$class = $_SESSION['class'];
		$points = $_SESSION['points'];
		$idNumber = $_SESSION['id'];
		$name = $_SESSION['name'];
		
		// Connect to the Database and make query to update point total
		//include('../code/connectMembers.php');  
		include('../../../../protected/code/connectMembers.php');  
		$dbQuery1 = "UPDATE members SET points=(points + ".$points.") WHERE idNumber='".$idNumber."'";
		date_default_timezone_set('America/Phoenix');
		$time = time();
		$dbQuery2 = "INSERT INTO checkins (idNumber, class, checkinDate) VALUES ('$idNumber', '$class', '$time')";
		
		$queryFailed = true;
		$queryFailed = $queryFailed && mysql_query($dbQuery1);
		$queryFailed = $queryFailed && mysql_query($dbQuery2);

		// Execute the query
		if (!$queryFailed)
		{
			include('../master/topMobile.php');
			echo '<p>There was an error checking in. Point total was not updated, please try again later.</p>';
			echo '<p> Please click <a href="checkinStart.php">here</a> to return to check-in.</p>';
			include('../master/bottomMobile.php');
		}
		else
		{
			include('../master/topMobile.php');
			echo '<p>'.$name.' was checked in successfully!</p>';
			echo '<p> Please click <a href="checkinStart.php">here</a> to return to check-in</p>';
			include('../master/bottomMobile.php');
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