<?php
	session_start();
	$_SESSION['fullSite'] = true;
	header( 'Location: ../index.php' ) ;
	die();
?>