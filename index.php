<?php
	/*	ConcealReveal - A simple WebApp to alert you if your cloak falls off
			Created by: sa7mon {dan.sa7mon(at)gmail.com}
			Project Created on: 9/2/14
	*/

	//Refer to flowchart sketch for process design

	//First, check to see if there's a cookie set for this user.
		if (isset($_COOKIE['IP'])) {
			//If there is, show what the saved IP is and offer to clear it to start over.
			echo "true";
			$cookieSet = true;
		} else {
			//If there is no cookie set: Proceed as normal.
			echo "false";
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
			ConcealReveal - Make sure your shield is up!
		</h2>
		<div class="content">
			<?php 
				
			?>
		</div>
		<div class="footer">
			<br />
			<br />
			<br />
			<p>&copy;&nbsp;2014 Dan Salmon</p>
		</div>
	</body>
</html>