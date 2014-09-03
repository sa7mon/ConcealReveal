<?php
	/*	ConcealReveal - A simple WebApp to alert you if your cloak falls off
			Created by: sa7mon {dan.sa7mon(at)gmail.com}
			Project Created on: 9/2/14
	*/
	//Refer to flowchart sketch for process design

	//First, let's check to see if there's a cookie set for this user.
		if (isset($_COOKIE['IP'])) {
			//If there is, show what the saved IP is and offer to clear it to start over.
			//echo "true";
			$cookieSet = true;
			$cookieIP = $_COOKIE['IP'];
		} else {
			//If there is no cookie set: Proceed as normal.
			//echo "false";
			$cookieSet = false;
		}
?>
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>ConcealReveal v1</title>
	</head>
	<body>
		<h2>
			Make sure your shield is up
		</h2>
		<div class="content">
			<?php 
				if ($cookieSet == true) {
					echo "<p>Your saved IP is: <span class='savedip'>".$cookieIP."</span></p>";
				} else {
					echo "Your current IP is: <span class='ip'>".$_SERVER['REMOTE_ADDR']."</span><br />";
					echo "<input type='submit' value='Save my IP locally' /><br />";
				};
			?>
			<br />
			Check Interval: 
			<select name="timeout">
				<option value="1500">15s</option>
				<option value="3000">30s</option>
				<option value="6000">1m</option>
				<option value="30000">5m</option>
				<option value="60000">10m</option>
			</select>
			<br />
			<br />
			<input type="submit" value="Start Monitoring" />
		</div>
		<div class="footer">
			<br />
			<br />
			<br />
			<p>&copy;&nbsp;2014 Dan Salmon</p>
		</div>
	</body>
</html>