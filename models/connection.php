<?php
	/*ini_set("display_errors", 0);
	error_reporting(0);*/
	
	$db		= "heroku_30745d0bcc4745";
	$user		= "b5d2c72a35cea7";
	$pw		= "f03b33d2";
    	$server		= "us-cdbr-east-02.cleardb.com";
    
	// Create connection
	$con = new mysqli($server, $user, $pw, $db);

	// Check connection
	if ($con->connect_error) {
		die('Connection failed: ' . $con->connect_error);
	}
?>