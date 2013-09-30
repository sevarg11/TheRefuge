<?php session_start()   ; // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script will grab all the information from the form to show a confirmation
 * page, and store it in the session in case the user approves. This script will
 * not update the database, BUT will upload the photos and documents (this can be
 * imoproved).
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		// Grab all the input
		$_SESSION['idNumber'] = $idNumber = $_POST['idNumber'];
		$_SESSION['first'] = $first = $_POST['first'];
		$_SESSION['middle'] = $middle = $_POST['middle'];
		$_SESSION['last'] = $last = $_POST['last'];
		$_SESSION['dateOfBirth'] = $dateOfBirth = strtotime($_POST['dateOfBirth']);
		$_SESSION['address'] = $address = $_POST['address'];
		$_SESSION['phone'] = $phone = $_POST['phone'];
		$_SESSION['school'] = $school = $_POST['school'];
		$_SESSION['grade'] = $grade = $_POST['grade'];
		$_SESSION['email'] = $email = $_POST['email'];
		$_SESSION['church'] = $church = $_POST['church'];
		$_SESSION['parent1'] = $parent1 = $_POST['parent1'];
		$_SESSION['parent2'] = $parent2 = $_POST['parent2'];
		$_SESSION['parent1Contact'] = $parent1Contact = $_POST['parent1Contact'];
		$_SESSION['parent2Contact'] = $parent2Contact = $_POST['parent2Contact'];
		$_SESSION['profilePicture'] = $profilePicture = "people/Default.jpg";
		$_SESSION['moralContract'] = $moralContract = "None";
		$_SESSION['parentConsent'] = $parentConsent = "None";
		$_SESSION['photoRelease'] = $photoRelease = "None";
		$_SESSION['skateWaiver'] = $skateWaiver = "None";

		
		// TODO: Check that the ID isn't already in the database
					
		// Check that there was an image uploaded
		if($_FILES["image"]["error"] == 0 )
		{
			// Moving the picture uploaded to "people" folder and naming it the first + middle + last name of the member
			$_SESSION['profilePicture'] = $profilePicture = "people/".$first.$middle.$last.".jpg"; 
	
			if(!move_uploaded_file($_FILES['image']['tmp_name'], $profilePicture)) 
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addErrorTitle">ADD<span class="titleColor">MEMBER</span></div>'; //TODO
				echo '<div id="addErrorMain">';
				echo '<p>There was an error uploading an image or document. <br>';
				echo 'No information was processed, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');

				die(); // Need to stop processing
			}
		}

		// Check that the moral accountability document uploaded
		if($_FILES["moral"]["error"] == 0 )
		{
			// Moving the picture uploaded to "people" folder and naming it the first + middle + last name of the member
			$_SESSION['moralContract'] = $moralContract = "moralContract/".$first.$middle.$last.".pdf"; 
	
			if(!move_uploaded_file($_FILES['moral']['tmp_name'], $moralContract)) 
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addErrorTitle">ADD<span class="titleColor">MEMBER</span></div>'; //TODO
				echo '<div id="addErrorMain">';
				echo '<p>There was an error uploading an image or document. <br>';
				echo 'No information was processed, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');

				die(); // Need to stop processing
			}

			$moralContract = "Uploaded";
		}

		// Check that the parent consent document uploaded
		if($_FILES["parent"]["error"] == 0 )
		{
			// Moving the picture uploaded to "people" folder and naming it the first + middle + last name of the member
			$_SESSION['parentConsent'] = $parentConsent = "parentConsent/".$first.$middle.$last.".pdf"; 
	
			if(!move_uploaded_file($_FILES['parent']['tmp_name'], $parentConsent)) 
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addErrorTitle">ADD<span class="titleColor">MEMBER</span></div>'; //TODO
				echo '<div id="addErrorMain">';
				echo '<p>There was an error uploading an image or document. <br>';
				echo 'No information was processed, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');

				die(); // Need to stop processing
			}

			$parentConsent = "Uploaded";
		}

				// Check that the parent consent document uploaded
		if($_FILES["photoRelease"]["error"] == 0 )
		{
			// Moving the picture uploaded to "people" folder and naming it the first + middle + last name of the member
			$_SESSION['photoRelease'] = $photoRelease = "photoRelease/".$first.$middle.$last.".pdf"; 
	
			if(!move_uploaded_file($_FILES['photoRelease']['tmp_name'], $photoRelease)) 
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addErrorTitle">ADD<span class="titleColor">MEMBER</span></div>'; //TODO
				echo '<div id="addErrorMain">';
				echo '<p>There was an error uploading an image or document. <br>';
				echo 'No information was processed, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');

				die(); // Need to stop processing
			}

			$photoRelease = "Uploaded";
		}

		// Check that the parent consent document uploaded
		if($_FILES["waiver"]["error"] == 0 )
		{
			// Moving the picture uploaded to "people" folder and naming it the first + middle + last name of the member
			$_SESSION['skateWaiver'] = $skateWaiver = "skateWaiver/".$first.$middle.$last.".pdf"; 
	
			if(!move_uploaded_file($_FILES['waiver']['tmp_name'], $skateWaiver)) 
			{
				include('./master/top.php'); 
				echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
				echo '<div id="addErrorTitle">ADD<span class="titleColor">MEMBER</span></div>'; //TODO
				echo '<div id="addErrorMain">';
				echo '<p>There was an error uploading an image or document. <br>';
				echo 'No information was processed, please try again later.</p>';
				echo '<p> Please click <a href="mainMenu.php">here</a> to return to the main menu</p>';
				echo '</div>';
				include('./master/bottom.php');

				die(); // Need to stop processing
			}

			$skateWaiver = "Uploaded";
		}
		
		//Show confirmation page
		include('./master/top.php'); 
		echo '<link rel="stylesheet" type="text/css" href="css/add.css" />';
		echo '<div id="addConfirmTitle">ADD<span class="titleColor">MEMBER</span></div>';
		echo '<div class="addConfirmMain">';
		echo '<div id="mainWrap">';
		echo '<h1>Please Confirm the information below: </h1>';
		
		// Display image (will display default avatar if none)
		echo '<img src="'.$profilePicture.'" alt="Profile Picture" height="300" width="300" id="addConfirmImage" />';
		
		// Display all other information
		echo '<table class="addConfirmTable">';
		echo "<tr><td>First Name:</td><td>$first</td></tr>";
		echo "<tr><td>Middle Name:</td><td>$middle</td></tr>";
		echo "<tr><td>Last Name:</td><td>$last</td></tr>";
		echo "<tr><td>Birthday:</td><td>".date('m-d-Y', $dateOfBirth)."</td></tr>";
		echo "<tr><td>Address:</td><td>$address</td></tr>";
		echo "<tr><td>Phone:</td><td>$phone</td></tr>";
		echo "<tr><td>School:</td><td>$school</td></tr>";
		echo "<tr><td>Grade:</td><td>$grade</td></tr>";
		echo "<tr><td>Email:</td><td>$email</td></tr>";
		echo "<tr><td>Church:</td><td>$church</td></tr>";
		echo '</table>';

		echo '<table class="addConfirmTable">';
		echo "<tr><td>Moral Contract:</td><td>$moralContract</td></tr>";
		echo "<tr><td>Parent Consent:</td><td>$parentConsent</td></tr>";
		echo "<tr><td>Photo Release:</td><td>$photoRelease</td></tr>";
		echo "<tr><td>Skate Waiver:</td><td>$skateWaiver</td></tr>";
		echo '</table>';

		echo '<table class="addConfirmTable">';
		echo "<tr><td>Parent 1:</td><td>$parent1</td></tr>";
		echo "<tr><td>Contact:</td><td>$parent1Contact</td></tr>";
		echo "<tr><td>Parent 2:</td><td>$parent2</td></tr>";
		echo "<tr><td>Contact:</td><td>$parent2Contact</td></tr>";
		echo '</table>';

		// Confirm button
		echo '<form action="addResults.php" method="post" class="addConfirm">';
		echo '<input type="submit" value="Confirm" id="loginButton" />';
		echo '</form></div>';
		echo '</div>';
		
		include('./master/bottom.php');
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}

?>