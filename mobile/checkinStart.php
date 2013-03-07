<?php
	session_start(); // Start session
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		include('../master/topMobile.php');	
?>
			<form action="checkinConfirm.php" method="post">
				<label for="id">Enter ID #:</label>
				<input type="number" name="id" placeholder="Enter ID #"/>
				
				<!--********** Enter number of points ************* !-->
				<select name="class" id="checkinPoints" data-theme="d">
					<option value="0">Class</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="F">F</option>
				</select>

				<!--********** Check In Button ************* !-->
				<input type="submit" value="Check In" />

				<div data-role="popup" id="popup" data-position-to="window" data-transition="pop" data-theme="b">
					<p>Please enter a ID # AND select a class<p>
				</div>
			</form>
			<script>
			(function() 
			{
				// Add an onClick function to the submit button to check for blanks
				$("input[type=submit]").click(function(event)
				{
					// Check that ID# has been filled out and a class was selected		
					if(!$("input[type=number]").val() || $("select").val() == '0')
					{
						// If not, add a paragraph that tells the user of the mistake if we haven't already added it
						$( "#popup" ).popup( "open" )
						event.preventDefault();
					}
				});
			})();
			</script>
<?php 
		include('../master/bottomMobile.php');
	}
	else
	{
		header( "Location: ./errorLogin.php");
	}
?>