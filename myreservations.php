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
		  	$var = ($_SESSION["userID"]);
		  ?>
		  </a>
		  </li>
		</ul>
		</nav>
		</center>
	</header>
		

		<?php
			
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');
			if (($_SERVER['REQUEST_METHOD'] == 'GET') || ($_SERVER['REQUEST_METHOD'] == 'POST')) {

				$sql = "SELECT * FROM `RESERVATIONS` WHERE ACCOUNT_NUM = '$var'";
				$result = mysqli_query($mysqli, $sql) or die();

				if($result -> num_rows > 0) { 
					while ($row = $result -> fetch_assoc()) {
						$complexvariable = $row["COMPLEX_ID"];
						$sql2 = "SELECT COMPLEX_NAME FROM `THEATER_COMPLEXES` WHERE COMPLEX_ID ='$complexvariable'";
						$result2 = mysqli_query($mysqli, $sql2) or die();
						
						$sql3 = "SELECT TITLE FROM `THEATERS_MOVIES` WHERE COMPLEX_ID = '$complexvariable'";
						$result3 = mysqli_query($mysqli, $sql3) or die();
						$row2 = $result2 -> fetch_assoc();
						$row3 = $result3 -> fetch_assoc();
						echo "Your Reservation ID:  " .$row["RESERVATION_ID"]. "      Number of Tickets:  " .$row["TICKETNUM"]. "      Date of Showing:  " .$row["SHOWING_DATE"]. "      Title of Movie:  " .$row["TITLE"]. "<br>";

					}
				}
			}

		?>
		<form action="myreservations.php" method="post">
		<center>

		<h3>Which Reservation Would You like to Cancel?</h3>
		<p>Please Enter the Reservation ID to Cancel</p>
		<input type="text" id="textbox" name="cancelreservation"> <br>
		<input name="login" type="submit">
		</center>
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$cancelreservation = $_POST['cancelreservation'];
				$sql4 = "DELETE FROM RESERVATIONS WHERE RESERVATION_ID = '$cancelreservation'";
				$result4 = mysqli_query($mysqli, $sql4) or die();
				mysqli_close($mysqli);
			}


		?>