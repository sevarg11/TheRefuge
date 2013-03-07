<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script gives the ability to edit a member's profile. Depending on
 * the query string passed by the previouse page, the logic will determine
 * which edit to display. 
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		$idNumber  = $_GET['uid'];
		$attribute = $_GET['attr'];

		include('./master/top.php');
		echo '<link rel="stylesheet" type="text/css" href="css/editProfile.css" />';


		switch ($attribute) 
		{
			case 'fn': // First name
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">FIRST</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="first" name="fist" placeholder="Enter a New First Name"/></div>';
				break;
			case 'mn': // Middle Name
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">MIDDLE</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="middle" name="middle" placeholder="Enter a New Middle Name"/></div>';
				break;
			case 'ln': // Last Name
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">LAST</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="last" name="last"  placeholder="Enter a New Last Name"/></div>';
				break;
			case 'bd': // Birthday
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">BIRTHDAY</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="Enter a New Birthdate"/></div>';
				break;
			case 'ad': // Address
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">ADDRESS</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="address" name="address" placeholder="Enter a New Address"/></div>';
				break;	
			case 'ph': // Phone
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PHONE</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="phone" name="phone" placeholder="Enter a New Phone"/></div>';
				break;	
			case 'sc': // School
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">SCHOOL</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="school" name="school" placeholder="Enter a New School"/></div>';
				break;	
			case 'gr': // Grade
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">GRADE</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><select name="grade" id="grade">';
				echo '<option value="">Grade</option>';
				echo '<option value="1">1st</option>';
				echo '<option value="2">2nd</option>';
				echo '<option value="3">3rd</option>';
				echo '<option value="4">4th</option>';
				echo '<option value="5">5th</option>';
				echo '<option value="6">6th</option>';
				echo '<option value="7">7th</option>';
				echo '<option value="8">8th</option>';
				echo '<option value="9">Freshman</option>';
				echo '<option value="10">Sophomore</option>';
				echo '<option value="11">Junior</option>';
				echo '<option value="12">Senior</option>';
				echo '<option value="12">Other</option>';
				echo '</select></div>';
				break;	
			case 'em': // Email
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">EMAIL</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="email" name="email" placeholder="Enter a New Email"/></div>';
				break;
			case 'ch': // Church
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">CHURCH</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="church" name="church" placeholder="Enter a New Church"/></div>';
				break;	
			case 'mc': // Moral Contract
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">MORALCONTRACT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="fileUpload" id="fileUpload">';
				echo '<input name="image" type="file" id="addImage" />';
				echo '<label for="image" class="button">Moral Contract</label>';
				echo '</div>';
				break;	
			case 'pc': // Parent Consent
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PARENTCONSENT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="fileUpload" id="fileUpload">';
				echo '<input name="image" type="file" id="addImage" />';
				echo '<label for="image" class="button">Parent Consent</label>';
				echo '</div>';
				break;	
			case 'pr': // Photo Release
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PHOTORELEASE</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="fileUpload" id="fileUpload">';
				echo '<input name="image" type="file" id="addImage" />';
				echo '<label for="image" class="button">Photo Release </label>';
				echo '</div>';
				break;	
			case 'sw': // Skatepark Waiver
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">SKATEPARK</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="fileUpload" id="fileUpload">';
				echo '<input name="image" type="file" id="addImage" />';
				echo '<label for="image" class="button">Skatepark Waiver</label>';
				echo '</div>';
				break;	
			case 'p1': // Parent 1
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PARENT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="parent1" name="parent1" placeholder="Enter a New Parent 1"/></div>';
				break;
			case 'p1c': // Parent 1 Contact
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PARENTCONTACT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="parent1Contact" name="parent1Contact" placeholder="Enter a New Parent Contact 1"/></div>';
				break;	
			case 'p2': // Parent 2
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PARENT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="parent2" name="parent2" placeholder="Enter a New Parent 2"/></div>';
				break;
			case 'p2c': // Parent 2 Contact
				echo '<div id="editProfileTitle">CHANGE<span class="titleColor">PARENTCONTACT</span></div>';
				echo '<div class="editProfileMain">';
				echo '<div class="editInput"><input type="text" id="parent2Contact" name="parent2Contact" placeholder="Enter a New Parent Contact 2"/></div>';
				break;			
			default:
				# code...
				break;
		}

		echo '<div id="editButtons">';
		echo '<a href="#"><input type="submit" value="Change" id="loginButton" /></a>';
		echo '<a href="searchResults.php?uid='.$idNumber.'" id="cancel"><input type="submit" value="Cancel" id="loginButton" /></a>';
		echo '</div>';
		echo '</div>';

		// Add input mask to birthday change
		if($attribute == 'bd')
		{
			echo '<script src="scripts/maskedInput.js"></script>';
			echo '<script>$("#dateOfBirth").mask("99/99/9999");</script>';
		}
		// Add input mask to address change
		else if($attribute == 'ph')
		{
			echo '<script src="scripts/maskedInput.js"></script>';
			echo '<script>$("#phone").mask("(999) 999-9999");</script>';
		}
		// Add CSS styles to grade dropdown menu
		else if($attribute == 'gr')
		{
			echo '<link rel="stylesheet" type="text/css" href="css/dropkick.css">';
			echo '<script src="scripts/dropkick.js"></script>';
			echo "<script>$('#grade').dropkick();</script>";
		}
		// Add js to file uploads
		else if(in_array($attribute, array('mc', 'pc', 'pr', 'sw')))
		{
			echo '<script src="scripts/fileUpload.js"></script>';
		}
		// Add input mask to Parent 1 Contact
		else if($attribute == 'p1c')
		{
			echo '<script src="scripts/maskedInput.js"></script>';
			echo '<script>$("#parent1Contact").mask("(999) 999-9999");</script>';
		}
		// Add input maske to Parent 2 Contact
		else if($attribute == 'p2c')
		{
			echo '<script src="scripts/maskedInput.js"></script>';
			echo '<script>$("#parent2Contact").mask("(999) 999-9999");</script>';
		}
		include('./master/bottom.php'); 
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>