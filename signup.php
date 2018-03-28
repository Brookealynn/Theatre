<!DOCTYPE>
<html>

	<head>
		<title>Movies</title>
		<link rel="stylesheet" href="style.css"/>
	</head>

	<body>
		<header>
		<center>
		<nav>
			<!-- nav bar stuff -->
		<ul>
		  <li><a href="./index.html">Home</a></li>
		  <li><a href="./purchasetickets.html">Purchase Tickets</a></li>
		  <li><a href="./browsemovies.html">Browse Movies</a></li>
		  <li><a href="#about">Theatres</a></li>
		  <li style="float:right"><a class="active" href="./login.php">Login</a></li>
		  <li style="float:right"><a class="active" href="./signup.php">Sign Up</a></li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="signup.php" method="post">

		<p>Account Number:</p>
		<input type="text" id="textbox" name="accountnum"> <br>
		<p>Password:</p>
		<input type="text" id="textbox2" name="password">
		<h2>Press Submit to Create Account</h2>
		<input name="login" type="submit">
		</form>


		<!-- Need to add rows to table -->
		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
		
		?>

</body>
</html>