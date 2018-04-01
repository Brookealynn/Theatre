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
		<ul>
			<!-- nav bar stuff -->
		<li><a href="./addMovie.php">Add a Movie</a></li>
		  <li><a href="./addForComplex.php">Add or Update a Complex</a></li>
		  <li><a href="./listMembers.php">Browse or Delete a Member</a></li>
		  <li><a href="./updateShowings.php">Add or Update Showings</a></li>
		  <li><a href="./reviews.php">Find the Most Popular Movie</a></li>
		  <li><a href="./reviews.php">Find the Most Popular Movie</a></li>
		  <li style="float:right"><a href="./userprofile.php">
		  <?php
		  	session_start();
		  	echo'<font color="white">' .'Welcome ' .($_SESSION["username"]) .'</font><br>';
		  	$var = ($_SESSION["userID"]);
		  ?>
		  </a>
		  </li>
		  <!-- <li style="float:right"><a class="active">Welcome Admin!</a></li> -->
		</ul>
		</nav>
		</center>
		</header>

		<!-- form test -->
		<form action="custHistory.php" method="post">
		<h3>Customer Reservation History:</h3>
		<p>Please Print Customer ID:</p>
		<input type="text" id="textbox" name="custID">
		<input name="customerID" type="submit">
		</form>
		

		<?php
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['custID'])) {
					//value of input
					$userinput = $_POST['custID'];
					// echo $account_num;
					$sql ="SELECT * FROM `RESERVATIONS` WHERE ACCOUNT_NUM = '$userinput'";
					$result = mysqli_query($mysqli, $sql) or die();
					$row = $result -> fetch_assoc();
					// $movieid = $row["COMPLEX_ID"];
				}
			}

		?>
<!-- 		<h3>Reservation's :</h3> -->

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {	
				$sql ="SELECT * FROM `RESERVATIONS` WHERE ACCOUNT_NUM = '$userinput'";
				$result = mysqli_query($mysqli, $sql) or die();
				if($result -> num_rows > 0) { 
					while ($row = $result -> fetch_assoc()) {
						echo $row["TITLE"] . " " . $row["RESERVATION_ID"]." " . $row["TICKETNUM"] . " " . $row["SHOWING_ID"] . " " . $row["SHOWING_DATE"] . " " . $row["START_TIME"] . $row["DURATION"] . " " .$row["COMPLEX_ID"] . " " . "</br>";
					}
				}
			}
					
		?>


	


</body>
</html>