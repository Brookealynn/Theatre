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
		  <li><a href="./browsemovies.php">Browse Movies</a></li>
		  <li><a href="./theatrecomplex.php">Choose Theatre Complex</a></li>
		  <li style="float:right"><a class="active" href="./login.p</a></li>
		  <li style="float:right"><a class="active" href="./login.php">Login</a></li>
		  <li style="float:right"><a class="active" href="./signup.php">Sign Up</a></li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="theatrecomplex.php" method="post">

		<p>Choose A Theatre Complex:</p>
		<input type="text" id="name" name="theatrecomplexname">
		<input name="theatrecomplex" type="submit">
		</form>
		
		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if((isset($_POST['theatrecomplex']))) {
					//value of input
					$complex_name = $_POST['theatrecomplexname'];
					echo "$complex_name";
				}

				$sql = "SELECT * FROM `theater_complexes` WHERE COMPLEX_NAME= '$complex_name'";
				//Query
				$result = mysqli_query($mysqli, $sql) or die();	
				echo "hi";

				//Check if the value exists in the table Customers
				//Getting value at account_num
				while ($row = mysqli_fetch_array($result)) {
					$myString .= $row['COMPLEX_NAME'] . " ";
				}

				$count = mysqli_num_rows($result);
				//if query returns 1 row, set a session for that email, redirect to newpage.php
				if ($count == 1) {
					header("location: newpage.php");
				} else {
					echo "This Theatre Complex Does Not Exist";	
				} 
			}
		
		?>

</body>
</html>