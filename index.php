<?php session_start();                   // Start PHP session
	include 'code/Mobile_Detect.php';  // Open source PHP mobile detection (see code for details)
    //include '../../../protected/code/Mobile_Detect.php';
	$detect = new Mobile_Detect();       // Create new mobile detection object


	// Check if user clicked "Full Site" link from mobile device 
    $fullSiteRedirect = $_SESSION['fullSite']; 

    // Redirect to mobile site if it is a mobile device
	if ($detect->isMobile() && !$fullSiteRedirect) {
	     header( 'Location: mobile/index.php' ) ;
	}

	// Normal web page
	else
	{
		unset($_SESSION['fullSite']);

		// Start generating markup
		include('./master/top.php'); 
		echo '<link rel="stylesheet" type="text/css" href="css/index.css" />';
		echo '<div id="loginTitle">LOG<span class="titleColor">IN</span></div>';
	
		// Check if the user is already logged in.
		if (isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			echo '<div id="loginArea">';
			echo '<p>You are logged in as: <b>'.$username.'</b></p>';
			echo '<p><a href="mainMenu.php"> Continue </a></p>';
			echo '</div>';
		}
		// Else display normal log in web page.
		else
		{
?>

<form action="userLogin.php" method="post" id="loginArea">
	<input type="text" name="username" id="username" placeholder="Username"/>
	<input type="password" name="password" id="password" placeholder="Password"/>
	<input type="submit" value="Log In" id="loginButton" />
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
				if($('p').length == 0)
				{
					$('<p id="error">Please enter a username AND password</p>').insertAfter('input[type=submit]');
				}
				event.preventDefault();
			}
		});
	})();
</script>

<?php
		}
		include('./master/bottom.php');
	}
?>