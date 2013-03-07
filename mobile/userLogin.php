<?php
	session_start(); // Start session
	
	// Check that they have already logged in
	if(isset($_SESSION['username']))
	{
		header( "Location: ./checkinStart.php");
	}
	else
	{
		// If the user has entered a username and password
		if($_POST['username'] && $_POST['password'])
		{
			$username = $_POST['username'];
			$password = $_POST['password'];


			include('../../../../protected/code/connectLogin.php');  
			//include('../code/connectLogin.php');     // This code should be out of public directory (i.e. ../PrivateCode)

			$dbQuery = "SELECT * FROM administrators WHERE username='".$username."' AND password=sha1('".$password."')";
				
			$result = mysql_query($dbQuery);       // Execute the query
  			$numRows = mysql_num_rows($result);    // Should only return 1 or 0. 
  			
  			if($numRows == 1)
			{
				$_SESSION['username'] = $username; // Set a session variable
				
				header( "Location: ./checkinStart.php");
			}
			else
			{
				header( "Location: ./errorLogin.html");
			}

			mysql_close(); // Close the connection, it's not necessary but still...
		}
		// They have not entered a username or password (or both).
		else
		{
			header( "Location: ./errorLogin.html");
		}

	}
?>