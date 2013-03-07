<?php 
	session_start(); // Start session

	if (isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		include('../master/topMobile.php'); 
		echo '<p>You are logged in as: <b>'.$username.'</b></p>';
		echo '<p><a href="checkinStart.php"> Continue </a></p>';
		include('../master/bottomMobile.php'); 
	}
	else
	{
		include('../master/topMobile.php'); 
?>


<form action="userLogin.php" method="post" id="loginArea">
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" placeholder="Username"/>
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" placeholder="Password"/>
	<input type="submit" value="Log In" id="loginButton" />
	<div data-role="popup" id="popup" data-position-to="window" data-transition="pop" data-theme="c">
		<p>Please enter a username AND password<p>
	</div>
</form>	
<script>
	(function() 
	{
		// Add an onClick function to the submit button to check for blanks
		$("input[type=submit]").click(function(event)
		{
			// Check that username and password has been entered	
			if(!$("#username").val() || !$("#password").val())
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
?>

