<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script is the start page for checking in a member. Members are 
 * checked in via ID number and assigned a point value based on class.
 * A = 5
 * B = 10
 * C = 15
 * D = 25
 * F = 25
 * JavaScript does validation to check that the fields were filled out.
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		include('./master/top.php');	
?>
	<link rel="stylesheet" type="text/css" href="./css/checkin.css" />
	<div id="checkinTitle">CHECK<span class="titleColor">IN</span></div>
	<form action="checkinConfirm.php" method="post" id="checkinAreaStart">
		<!--********** Enter ID ************* !-->
		<input type="text" name="id" placeholder="Enter ID #"/>
		
		<!--********** Enter number of points ************* !-->
		<select name="class" id="checkinPoints">
			<option value="0">Class</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="F">F</option>
		</select>

		<!--********** Check In Button ************* !-->
		<input type="submit" value="Check In" />
	</form>
	<!-- JavaScript !-->
	<script>
		(function() 
		{
			// Add an onClick function to the submit button to check for blanks
			$("input[type=submit]").click(function(event)
			{
				// Check that ID# has been filled out and a class was selected		
				if(!$("input[type=text]").val() || $("select").val() == '0')
				{
					// If not, add a paragraph that tells the user of the mistake if we haven't already added it
					if($('p').length == 0)
					{
						$('<p id="error">Please enter a ID # AND select a class</p>').insertAfter('input[type=submit]');
					}
					event.preventDefault();
				}
			});
		})();
	</script>
<?php 
		include('./master/bottom.php');
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>