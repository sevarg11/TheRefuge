<?php session_start(); // Resume session
	
/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script displays the searched member. The displayed member will have
 * links to view the member's check in history and links to edit the member's
 * profile.
 ************************************************************************/

	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		// The id number of a member can be passed two ways.
		// 1st is using URL query string
		// 2nd is via POST.
		// This if checks which way it was passed
		$idNumber = $_GET['uid'];
		if(!$idNumber)
		{
			// $name = $_POST['name'];
			$idNumber = $_POST['id'];
		}

		// Check if it was the ID or last name that was given
		// if($name || $idNumber)
		if($idNumber)
		{
			include('./code/connectMembers.php'); 
			//include('../../../protected/code/connectMembers.php'); 		
			
			// If given both, always take ID number
			if($idNumber)
				$dbQuery = "SELECT * FROM members WHERE idNumber='".$idNumber."'";
			// else
			// 	$dbQuery = "SELECT * FROM members WHERE last='".$name."'";

			$result = mysql_query($dbQuery);       // Execute the query
  			$numRows = mysql_num_rows($result);    // Should only return 1 or 0. 
  			
  			// If a name or id entered was found.
  			if($numRows == 1)
			{
				// TODO: Only one search result. Need to do search by last name.
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/search.css" />';
				echo '<div id="searchResultsTitle">SEARCH<span class="titleColor">MEMBERS</span></div>';
				echo '<div class="searchResultsMain">';

				while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
				{
					// Display image (will display default avatar if none)
					echo '<img src="'.$row["profilePicture"].'" alt="Profile Picture" height="300" width="300" id="searchResultsImage" />';

					// Display all other information
					echo '<table class="searchResultsTable">';
					echo '<tr><td class="first"></td><td>ID #:</td><td>'.$row["idNumber"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=fn" title="Edit" class="edit"></a></td><td>First Name:</td><td>'.$row["first"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=mn" title="Edit" class="edit"></a></td><td>Middle Name:</td><td>'.$row["middle"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=ln" title="Edit" class="edit"></a></td><td>Last Name:</td><td>'.$row["last"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=bd" title="Edit" class="edit"></a></td><td>Birthday:</td><td>'.date('m-d-Y', $row["birthDate"])."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=ad" title="Edit" class="edit"></a></td><td>Address:</td><td>'.$row["address"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=ph" title="Edit" class="edit"></a></td><td>Phone:</td><td>'.$row["phone"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=sc" title="Edit" class="edit"></a></td><td>School:</td><td>'.$row["school"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=gr" title="Edit" class="edit"></a></td><td>Grade:</td><td>'.$row["grade"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=em" title="Edit" class="edit"></a></td><td>Email:</td><td>'.$row["email"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=ch" title="Edit" class="edit"></a></td><td>Church:</td><td>'.$row["church"]."</td></tr>";
					echo '<tr><td class="first"></td><td>Points:</td><td>'.$row["points"]."</td></tr></table>";
					

					echo '<table class="searchResultsTable">';
					if($row["moralContract"] && $row["moralContract"] != 'None')
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=mc" title="Edit" class="edit"></a></td><td>Moral Contract:</td><td><a href="'.$row["moralContract"].'" target="_blank">Click Here</a></td></tr>';
					else
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=mc" title="Edit" class="edit"></a></td><td>Moral Contract:</td><td>Not on file</td></tr>';
					if($row["parentConsent"] && $row["parentConsent"] != 'None')
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=pc" title="Edit" class="edit"></a></td><td>Parent Consent:</td><td><a href="'.$row["parentConsent"].'" target="_blank">Click Here</a></td></tr>';
					else
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=pc" title="Edit" class="edit"></a></td><td>Parent Consent:</td><td>Not on file</td></tr>';
					if($row["photoRelease1"] && $row["photoRelease1"] != 'None')
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=pr" title="Edit" class="edit"></a></td><td>Photo Release:</td><td><a href="'.$row["photoRelease1"].'" target="_blank">Click Here</a></td></tr>';
					else
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=pr" title="Edit" class="edit"></a></td><td>Photo Release:</td><td>Not on file</td></tr>';
					if($row["skateWaiver"] && $row["skateWaiver"] != 'None')
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=sw" title="Edit" class="edit"></a></td><td>Skate Waiver:</td><td><a href="'.$row["skateWaiver"].'" target="_blank">Click Here</a></td></tr>';
					else
						echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=sw" title="Edit" class="edit"></a></td><td>Skate Waiver:</td><td>Not on file</td></tr>';			
					echo '</table>';
								
					echo '<table class="searchResultsTable">';
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=p1" title="Edit" class="edit"></a></td><td>Parent 1:</td><td>'.$row["parent1"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=p1c" title="Edit" class="edit"></a></td><td>Contact:</td><td>'.$row["parent1Contact"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=p2" title="Edit" class="edit"></a></td><td>Parent 2:</td><td>'.$row["parent2"]."</td></tr>";
					echo '<tr><td class="first"><a href="editProfile.php?uid='.$idNumber.'&attr=p2c" title="Edit" class="edit"></a></td><td>Contact:</td><td>'.$row["parent2Contact"]."</td></tr>";
					echo '</table>';
					

					echo '<div id="searchResultsButtons">';
					echo '<a href="checkinHistory.php?uid='.$row['idNumber'].'&name='.$row['first'].'!'.$row['last'].'">View Check-in History</a>';
    				echo '<a href="searchStart.php">Search Again</a>';
    				echo '</div>';
				}
				
				echo '</div>';
				
				include('./master/bottom.php');

			}
			// There is multiple people with the same last name
			else if($numRows > 1)
			{
				// TODO: There is more than one result. Need to display multiple.
				echo '<p> I am right here in this else if statement</p>';
			}
			// Could not find the name in the database
			else
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/search.css" />';
				echo '<div id="searchTitle">SEARCH<span class="titleColor">MEMBERS</span></div>';
				echo '<div class="searchMain">';
				
				echo '<p> Sorry, the name or ID you entered is not in the database!</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to go back to the main menu</p>';
				
				echo '</div>';
				include('./master/bottom.php');
			}

			mysql_close(); // Close the connection, it's not necessary but still...
		}
		else
		{
			$_SESSION['searchError'] = true;       // Set a session variable
			header( "Location: ./searchStart.php");
		}
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}

?>