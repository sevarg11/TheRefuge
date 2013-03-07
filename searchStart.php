<?php session_start(); // Resume session

/************************************************************************
 * Author:
 * Willson Wong
 *
 * Description: 
 * This script displays the form for searching for member.
 * JavaScript validates the inputs.
 ************************************************************************/
	
	// Check that the user has logged in
	if(isset($_SESSION['username']))
	{
		include('./master/top.php'); 
?>
<link rel="stylesheet" type="text/css" href="css/search.css" />
<div id="searchTitle">SEARCH<span class="titleColor">MEMBERS</span></div>

<div class="searchMain">
	<form action="searchResults.php" method="post" >
		<!-- <input type="text" name="name" id="name" placeholder="Enter Last Name" /> -->
		<input type="text" name="id" id="id" placeholder="Enter ID #" />
		<input type="submit" value="Search" id="loginButton" />
	</form>
</div>

<!-- JavaScript -->
<script>
	(function() 
	{
		// Add an onClick function to the submit button to check for blanks
		$("input[type=submit]").click(function(event)
		{
			// Check that ID# has been filled out and a class was selected		
			if(!$("#name").val() && !$("#id").val())
			{
				// If not, add a paragraph that tells the user of the mistake if we haven't already added it
				if($('p').length == 0)
				{
					$('<p id="error">* Please enter a ID # OR a last name</p>').insertAfter('input[type=submit]');
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