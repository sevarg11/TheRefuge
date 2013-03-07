<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script displays the form for adding a member.
 * There is more JavaScript on this page than most others. See the 
 * scripts included at the bottom and the scripts folder for details. 
 * Mostly, the JS validates input.
 ************************************************************************/

	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		include('./master/top.php'); 		
?>

	<link rel="stylesheet" type="text/css" href="css/add.css" />
	<link rel="stylesheet" type="text/css" href="css/dropkick.css">

	<div id="addStartTitle">ADD<span class="titleColor">MEMBER</span></div>
		<form enctype="multipart/form-data"  action="addConfirm.php" method="post" id="addStartMain">
			<div id="mainWrap">
				<h1>Identification Number</h1>
				<div class="textInput">
					<label for="idNumber">ID</label>
					<input type="text" name="idNumber" id="idNumber" placeholder="xxxxxx"/> 
				</div>

				<h1>Personal Information</h1>

				<!-------------------   ROW 1: Name Input -----------------!-->
				<div class="textInput">
					<label for="first">First Name</label>
					<input type="text" name="first" id="first"/> 
				</div>
				<div class="textInput">
					<label for="middle">Middle Name <small>(optional)</small></label>
					<input type="text" name="middle" id="middle"/>
				</div>
				<div class="textInputEnd">		
					<label for="last">Last Name</label>
					<input type="text" name="last" id="last"/>
				</div>

						
				<!------------------- ROW 2: Birth Date, Address and Phone ------------------!-->
			  	<div class="textInput">
			  		<label for="dateOfBirth">Date of Birth</label>
					<input type="text" id="dateOfBirth" name="dateOfBirth"  placeholder="mm/dd/yyyy"/>
				</div>

				<div class="textInput">
					<label for="address">Address</label>
					<input type="text" id="address" name="address"/>
				</div>

				<div class="textInputEnd">
					<label for="phone">Phone</label>
					<input type="text" name="phone" id="phone" placeholder="(xxx) xxx-xxxx" />
				</div>
				
						
				<!------------------- ROW 3: School, Grade and Email !-------------------->
				<div class="textInput">
					<label for="school">School</label>
					<input type="text" name="school" id="school"/>
				</div>	

				<div class="textInput">
					<label for="church">Church</label>
					<input type="text" name="church" id="church"/>
				</div>

				<div class="textInputEnd">
					<label for="email">Email</label>
					<input type="text" name="email" id="email"/>
				</div>	
						
						

				<!------------------- ROW 4: Grade and Profile Picture !-------------------->
				<select name="grade" id="grade">
				    <option value="">Grade</option>
				    <option value="1">1st</option>
				    <option value="2">2nd</option>
				    <option value="3">3rd</option>
				    <option value="4">4th</option>
				    <option value="5">5th</option>
				    <option value="6">6th</option>
				    <option value="7">7th</option>
				    <option value="8">8th</option>
				    <option value="9">Freshman</option>
				    <option value="10">Sophomore</option>
				    <option value="11">Junior</option>
				    <option value="12">Senior</option>
				    <option value="12">Other</option>
				</select> 


				<div class="fileUpload" id="fileUpload">
					<input name="image" type="file" id="addImage" />
					<label for="image" class="button">Profile Picture</label>
				</div>


				<h1>Parent Contact Information</h1>
				<!-------------------- ROW 6: Parent 1 Contact !-------------------->
				<div class="textInput">
					<label for="parent1">Parent 1</label>
					<input type="text" name="parent1" id="parent1"/>
				</div>
				<div class="textInput">
					<label for="parent1Contact">Parent 1 Contact</label>
					<input type="text" name="parent1Contact" id="parent1Contact"  placeholder="(xxx) xxx-xxxx"/>
				</div>


				<!-------------------- ROW 7: Parent 2 Contact !-------------------->
				<div class="textInput">
					<label for="parent2">Parent 2 <small>(optional)</small></label>
					<input type="text" name="parent2" id="parent2"/>
				</div>
				<div class="textInput">
					<label for="parent2Contact">Parent 2 Contact <small>(optional)</small></label>
					<input type="text" name="parent2Contact" id="parent2Contact" placeholder="(xxx) xxx-xxxx" />
				</div>


				<h1>Documents</h1>
				<div class="fileUpload">
					<input name="moral" type="file" id="addMoral" />
					<label for="addMoral" class="button">Moral Accountability Contract</label>
				</div>
				<div class="fileUpload">
					<input name="parent" type="file" id="addParent" />
					<label for="addParent" class="button">Parent Consent</label>
				</div>
				<div class="fileUpload">
					<input name="photoRelease" type="file" id="addPhotoRelease" />
					<label for="addPhotoRelease" class="button">Photo Release</label>
				</div>
				<div class="fileUpload">
					<input name="waiver" type="file" id="addWaiver" />
					<label for="addWaiver" class="button">Skate Park Waiver</label>
				</div>	

				<input type="submit" value="Add Member" id="loginButton" />
			</div>
		</form>

		<!-- JavaScript -->
		<script src="scripts/maskedInput.js"></script>
  		<script src="scripts/dropkick.js"></script>
		<script src="scripts/add.js"></script>
<?php 
		include('./master/bottom.php');
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}

?>