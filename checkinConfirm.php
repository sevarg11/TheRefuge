<?php session_start(); // Start session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script is the confirmation page before checking in a member. This  
 * page will display confirmation details such as the member picture, name,
 * and last checkin dates. When the user confirms, this will take them to 
 * checkInResults.php to actually checkin the user and add points.
 ************************************************************************/

	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		$idNumber = $_POST['id'];
		$class = $_POST['class'];

		// Defensive programming: just make sure we did not get blank values
		if($idNumber != '' && $class != '0')
		{
			// Convert class into points
			$points = 0;
			switch ($class) 
			{
				case 'A':
					$points = 5;
					break;	
				case 'B':
					$points = 10;
					break;	
				case 'C':
					$points = 15;
					break;	
				case 'D':
					$points = 25;
					break;	
				case 'F':
					$points = -50;
					break;
				default:
					# code...
					break;
			}

			// Connect to correct DB and make correct select statement
			include('./code/connectMembers.php');
			//include('../../../protected/code/connectMembers.php');

			// Hard coded, refactor and use SPROC.
			$dbQuery = "SELECT * FROM members WHERE idNumber='".$idNumber."'";
			
			$result = mysql_query($dbQuery);       // Execute the query
  			$numRows = mysql_num_rows($result);    // Should only return 1 or 0. 
  			
  			// If the id entered was found.
  			if($numRows == 1)
			{
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				
				// Set session variables to store needed fields
				$_SESSION['class'] = $class;
				$_SESSION['points'] = $points;
				$_SESSION['id'] = $idNumber;
				$_SESSION['name'] = $row['first'].' '.$row['last'];
				
				// ******** Get last check-in dates ********

				// Get last D checkin
				$dbQuery = "SELECT * FROM checkins WHERE idNumber='".$idNumber."' AND class='D' ORDER BY checkinDate DESC LIMIT 1";
				$checkinResult = mysql_query($dbQuery);            // Execute the query
  				$checkinNumRows = mysql_num_rows($checkinResult);  // Should only return 1 or 0. 
  				$lastDCheckin = '';                                // Variable to store last D checkin
  				if($checkinNumRows == 1)
				{
  					$checkinRow = mysql_fetch_array($checkinResult, MYSQL_ASSOC); 
  					$lastDCheckin = date('F d, Y', $checkinRow["checkinDate"]);
  				}
  				else
  				{
  					$lastDCheckin = 'None';
  				}

  				// Get last checkin
  				$dbQuery = "SELECT * FROM checkins WHERE idNumber='".$idNumber."' ORDER BY checkinDate DESC LIMIT 1";
				$checkinResult = mysql_query($dbQuery);            // Execute the query
  				$checkinNumRows = mysql_num_rows($checkinResult);  // Should only return 1 or 0. 
  				$lastCheckin = '';                                 // Variable to store last checkin
  				$lastCheckinClass = '';
  				if($checkinNumRows == 1)
				{
  					$checkinRow = mysql_fetch_array($checkinResult, MYSQL_ASSOC); 
  					// $lastCheckin = date('F d, Y h:i:s A', $checkinRow["checkinDate"]);
  					$lastCheckin = date('F d, Y', $checkinRow["checkinDate"]);
  					$lastCheckinClass = $checkinRow["class"];
  				}
  				else
  				{
  					$lastCheckin = 'None';
  				}

				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/checkin.css" />';
				echo '<div id="checkinTitle">CHECK<span class="titleColor">IN</span></div>';
				echo '<form action="checkinResults.php" method="post" id="checkinAreaConfirm">';
				echo '<img src="'.$row['profilePicture'].'" alt="'.$row['first'].'" height="150" width="150" id="checkinImage">';
				echo '<p>Are you sure you would like to check-in <span class="highlight">';
				echo $row['first'].' '.$row['middle'].' '.$row['last'];
				echo '</span>?</p>';
				echo '<p><span class="highlight">'.$points.'</span> points will be added.</p>';
				echo '<p>Last D class check-in: <span class="highlight">'.$lastDCheckin.'</span><br>';
				echo 'Last check-in: <span class="highlight">'.$lastCheckinClass.' - '.$lastCheckin.'</span></p>';

				echo '<input type="submit" value="Confirm" id="loginButton" />';
				echo '<a href="checkinStart.php">Cancel</a>';
				echo '</form>';
				include('./master/bottom.php');
			}
			// Else the ID was not found
			else
			{
				include('./master/top.php');
				echo '<link rel="stylesheet" type="text/css" href="css/checkin.css" />';
				echo '<div id="checkinTitle">CHECK<span class="titleColor">IN</span></div>';
				echo '<div id="checkinAreaError">';
				echo '<p id="notFound"> Sorry, the ID you entered could not be found!</p>';
				echo '<p> Please click <a href="checkinStart.php">here</a> to try again.</p>';
				echo '</div>';
				include('./master/bottom.php');
			}

			mysql_close(); // Close the connection, it's not necessary but still...
		}
		// We should never come to this else, but if we do show unknown error.
		else
		{
			header( "Location: ./errorUnknown.php");
		}
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>