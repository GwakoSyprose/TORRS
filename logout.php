<?php

// Initialize the session
session_start();

if(isset($_SESSION['userID'])) {

   // Unset all of the session variables
    $_SESSION = array();

	// Destroy the session.
   session_destroy();

	// Redirect to login page
	header("location: index.php");
	exit;
} else {

	header("location: index.php");
	exit;
}


?>