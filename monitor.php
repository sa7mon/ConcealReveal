<?php
// Monitor.php - The page that does all the heavy lifting for the app.
// Takes a few arguements from index.php and loops forever.

// Let's get all our variables set and out of the way.

// Get the variable from the URL for how often we should check to see if 
// our cloak fell off.
$checkInterval = $_GET['timeout'];

// Get the secret IP we saved on the last page that we'll check against.
$secretIP = $_COOKIE['IP'];

// Start the infinite loop
for ($x=0; $x<1; $x-1) {
	// Do this stuff forever unless we trigger the alarm
	$currentIP = $_SERVER['REMOTE_ADDR'];
	if ($currentIP == $secretIP) {
		// Our cloak fell off! Alert!
		
	}
}

?>