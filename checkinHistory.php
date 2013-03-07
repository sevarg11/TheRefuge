<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script displays the searched members' checkin history. The ID of
 * the member is passed via URL query string. The way to get back to the searched
 * members page is to pass the ID back to searchResults.php via URL query string.
 ************************************************************************/	

	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		// Get the user id from the query string in URL
		$idNumber = $_GET['uid'];

		// Get the total amount of checkins first
		include('./code/connectMembers.php');  
		//include('../../../protected/code/connectMembers.php'); 
		$dbQuery = "SELECT COUNT(*) FROM checkins WHERE idNumber='".$idNumber."'";			
		$result = mysql_query($dbQuery);       // Execute the query

		if($result)
			$numRows = mysql_num_rows($result);    // Should only return 1 or 0. 
		else
			$numRows = 0;
		
		// If a the name or id entered was found.
		if($numRows == 1)
		{

			if($row = mysql_fetch_array($result, MYSQL_ASSOC))
				$count = $row['COUNT(*)'];

			// Get top 10 checkins
			$dbQuery = "SELECT * FROM checkins WHERE idNumber='".$idNumber."'ORDER BY num DESC LIMIT 10";
			$result = mysql_query($dbQuery);       // Execute the query

			if($result)
				$numRows = mysql_num_rows($result);
			else
				$numRows = 0;

			include('./master/top.php'); 
			echo '<link rel="stylesheet" type="text/css" href="css/checkin.css" />';
			echo '<div id="checkinTitle">CHECKIN<span class="titleColor">HISTORY</span></div>';
			echo '<div id="checkinAreaHistory">';

			if($numRows > 0)
			{
				$name = explode('!', $_GET['name']);

				echo '<h1>'.$name[0].' '.$name[1].'</h1>';
				echo '<table>';
				echo '<tr><th>Class</th><th>Check-in Date</th></tr>';
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				{
					echo '<tr>';
					echo '<td>'.$row['class'].'</td>';
					echo '<td>'.date('F d, Y -- h:i:s A', $row['checkinDate']).'</td>';
					echo '</tr>';
				}
				echo '</table>';
			}
			else
			{
				echo '<p>There are no recorded check-ins.</p>';
			}


			echo '<a href="searchResults.php?uid='.$idNumber.'"><input type="submit" value="Go Back" id="loginButton" /></a>';
			echo '</div>';
			include('./master/bottom.php'); 

		}
		// The ID passed should always be found, but in case it is not, show error.
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