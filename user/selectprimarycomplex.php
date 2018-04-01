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
		  <li><a href="./purchasetickets.php">Purchase Tickets</a></li>
		  <li><a href="./myreservations.php">My Reservations</a></li>
		  <li><a href="./selectprimarycomplex.php">Browse Movies</a></li>
		  <li><a href="./pastpurchases.php">Past Purchases</a></li>
		  <li><a href="./reviews.php">Review a Movie</a></li>
		  <li style="float:right"><a href="./userprofile.php">
		  <?php
		  	session_start();
		  	echo'<font color="white">' .'Welcome ' .($_SESSION["username"]) .'</font><br>';
		  ?>
			</a>
			</li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="selectprimarycomplex.php" method="post">

		<p>Select Complex:</p>
		<input type="text" id="textbox" name="theatrecomplexname">
		<input name="theatrecomplex" type="submit">
		</form>
		<h3>Available Complexes:</h3>

		<?php
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

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
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['theatrecomplexname'])) {
					//value of input
					$userinput = $_POST['theatrecomplexname'];
					// echo $account_num;
					$sql2 ="SELECT COMPLEX_ID FROM `THEATER_COMPLEXES` WHERE COMPLEX_NAME = '$userinput'";

					$result2 = mysqli_query($mysqli, $sql2) or die();

					$row = $result2 -> fetch_assoc();

					$movieid = $row["COMPLEX_ID"];
				}
			}



		
		?>
		<h3>Movies currently playing at this location:</h3>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['theatrecomplexname'])) {
					$sql3 ="SELECT TITLE FROM `SHOWINGS` WHERE COMPLEX_ID= $movieid";
					$result3 = mysqli_query($mysqli, $sql3) or die();
					if($result3 -> num_rows > 0) { 
						while ($row = $result3 -> fetch_assoc()) {
							echo $row["TITLE"]."<br>";
						}
					}
				}
			}		
		?>


	


</body>
</html>