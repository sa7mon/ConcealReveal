<?php
	/*	ConcealReveal - A simple WebApp to alert you if your cloak falls off
			Created by: sa7mon {dan.sa7mon(at)gmail.com}
			Project Created on: 9/2/14
	*/

	//Refer to flowchart sketch for process design

	//First, let's check to see if there's a cookie set for this user.
	if (isset($_COOKIE['IP'])) {
		//If there is, show what the saved IP is and offer to clear it to start over.
		$cookieSet = true;
		$cookieIP = $_COOKIE['IP'];
	} else {
		//If there is no cookie set: Proceed as normal.
		$cookieSet = false;
	}

	if (isset($_POST['iptosave'])) {
		// User has gotten here after clicking "Save my IP"
		// We need to take the ip passed to us and set a cookie with it

		// Set a cookie
		setCookie("IP",$_POST['iptosave']);
		header('Location: '.$_SERVER['REQUEST_URI']);
	}
	if (isset($_POST['iptoforget'])) {
		// User has gotten here after clicking "Forget my IP"
		// They have a cookie saved that we need to destroy.

		//Destroy the cookie
		setcookie ("IP", "", time() - 3600);
		header('Location: '.$_SERVER['REQUEST_URI']);
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
					// User has a saved IP already. Display it and offer to forget it.
					echo "<form name='forgetip' action='index.php' method='POST'>";
					echo "<p>Your saved IP is: <span class='ip'><input type='text' name='iptoforget' value=".$cookieIP." readonly></span></p>";
					echo "<input type='submit' value='Forget my saved IP' /><br />";
					echo "</form>";
				} else {
					// User doesn't have a saved IP. Offer to save it.
					echo "<form name='saveip' action='index.php' method='POST'>";
					echo "Your current IP is: <span class='ip'>
						<input type='text' name='iptosave' value=".$_SERVER['REMOTE_ADDR']." readonly></span><br />";
					echo "<input type='submit' value='Save my IP locally' /><br />";
					echo "</form>";
				};
			?>
			<br />
			<form name="startmonitor" action="monitor.php" action="GET">
				Check Interval: 
				<select name="timeout">
					<option value="15">15s</option>
					<option value="30">30s</option>
					<option value="60">1m</option>
					<option value="300">5m</option>
					<option value="600">10m</option>
				</select>
				<br />
				<br />
				<?php
					//echo ($cookieSet ? "<input type='hidden' value=".$cookieIP." />": "<input type='hidden' value=".$_SERVER['REMOTE_ADDR']." />");
				?>
				<input type="submit" value="Start Monitoring" />
			</form>
		</div>
		<div class="footer">
			<br />
			<br />
			<br />
			<p>&copy;&nbsp;2014 Dan Salmon</p>
		</div>
	</body>
</html>