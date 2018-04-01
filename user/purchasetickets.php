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
		<form action="purchasetickets.php" method="post">
		<p>Showing ID:</p>
		<input type="text" id="textbox" name="showingIDbox">
		<p>Number of Tickets:</p>
		<input type="text" id="textbox" name="numtickets">
		<input name="finalsubmit" type="submit">
		</form>

		<?php
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['showingIDbox']) && isset($_POST['numtickets'])) {

					$stmt = $mysqli -> prepare("INSERT into RESERVATIONS (RESERVATION_ID, TICKETNUM, ACCOUNT_NUM, SHOWING_ID, SHOWING_DATE,START_TIME, END_TIME, TITLE, COMPLEX_ID) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");

					$stmt -> bind_param("sissssssi", $generatedID, $numtickets, $userID, $showingID, $showdate, $starttime, $endtime, $title, $complexid);

					$showingID = $_POST['showingIDbox'];
					$numtickets = $_POST['numtickets'];
					$userID = $_SESSION['userID'];
					$int1 = 10000;
					$int2 = 99999;

					$checked = FALSE;
					while ($checked == FALSE) {
						$generatedID = (rand ($int1, $int2));
						$sql = "SELECT * FROM `RESERVATIONS` WHERE RESERVATION_ID = '$generatedID'";

						$result = mysqli_query($mysqli, $sql) or die();

						if($result -> num_rows == 0){
							$checked = TRUE;
						}
						
					}

					$sql2 = "SELECT * FROM `SHOWINGS` WHERE SHOWING_ID = '$showingID'";

					$result2 = mysqli_query($mysqli, $sql2) or die();

					$row = $result2 -> fetch_assoc();

					$showdate = $row["SHOWING_DATE"];
					$starttime = $row["START_TIME"];
					$endtime = $row["END_TIME"];
					$title = $row["TITLE"];
					$complexid = $row["COMPLEX_ID"];
					
					$stmt -> execute();


				}

			}
		?>