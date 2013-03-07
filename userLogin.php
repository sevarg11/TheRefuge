<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script contains all the logic to log in a user. If the user
 * logs in correctly, the user will be redirected to mainMenu.php.
 * Otherwise, the user will be taken to an error screen, errorLogin.php.
 ************************************************************************/


	// Check if the user is already logged in
	if(isset($_SESSION['username']))
	{
		header( "Location: mainMenu.php");
	}
	else
	{
		// Check if user name and password has been passed
		if($_POST['username'] && $_POST['password'])
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			// Connect to databse
			include('code/connectLogin.php');
			//include('../../../protected/code/connectLogin.php');

			// Yes, this is hard coded. Refactor with SPROC, please.
			$dbQuery = "SELECT * FROM administrators WHERE username='".$username."' AND password=sha1('".$password."')";

			// See what is returned from query
			$result = mysql_query($dbQuery);

			// There should only be one row returned because there should only be unique username/password combos.
			$numRows = mysql_num_rows($result);
			if($numRows == 1)
			{
				// Store username in session, redirect to main menu
				$_SESSION['username'] = $username;
				header("Location: mainMenu.php");
			}
			else
			{
				// Wrong login credentials
				header("Location: errorLogin.php");
			}

			// Clean up SQL calls
			mysql_close();
		}
		else
		{
			// JavaScript should prevent ever coming here, but just in case.
			header("Location: errorLogin.php");
		}
	}
?>