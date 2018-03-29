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
		  <!-- <li><a href="./theatrecomplex.php">Choose Theatre Complex</a></li> -->
		  <li style="float:right"><a class="active" href="./login.p</a></li>
		  <li style="float:right"><a class="active" href="./login.php">Login</a></li>
		  <li style="float:right"><a class="active" href="./signup.php">Sign Up</a></li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="selectprimarycomplex.php" method="post">

		<p>Select Primary Complex:</p>
		<input type="text" id="textbox" name="theatrecomplexname">
		<input name="theatrecomplex" type="submit">
		</form>

		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			$sql = "SELECT * FROM `THEATER_COMPLEXES`";
			$result = mysqli_query($mysqli, $sql) or die();

			if($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {
					echo $row["COMPLEX_NAME"]."<br>";
				}
			}
			else {
				echo "0 results";
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['theatrecomplexname'])) {
					//value of input
					$userinput = $_POST['theatrecomplexname'];
					// echo $account_num;
					}
				} 
				$sql2 ="SELECT COMPLEX_ID FROM `THEATER_COMPLEXES` WHERE COMPLEX_NAME = '$userinput'";
				$result2 = mysqli_query($mysqli, $sql2);
				
				$row = $result2 -> fetch_assoc();
				$movieid = $row["COMPLEX_ID"];
				

			}


		
		?>

</body>
</html>