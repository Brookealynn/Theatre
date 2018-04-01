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
		<li><a href="./purchasetickets.php">Add a Movie</a></li>
		  <li><a href="./addForComplex.php">Add or Update a Complex</a></li>
		  <li><a href="./listMembers.php">Browse or Delete a Member</a></li>
		  <li><a href="./updateShowings.php">Add or Update Showings</a></li>
		  <li><a href="./mostpopmovie.php">Find the Most Popular Movie</a></li>
		  <li><a href="./mostpoptheatre.php">Find the Most Popular Theatre</a></li>
		  <li style="float:right"><a href="./mostpopmovie.php">
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

		<?php
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				
				$sql = "SELECT TEMP.TITLE, max(TEMP.SUMTICKET) as MAXI from (SELECT TITLE, sum(TICKETNUM) as SUMTICKET from `RESERVATIONS` group by TITLE) as TEMP";
				$result = mysqli_query($mysqli, $sql);

				$row = $result -> fetch_assoc();

				echo $row["TITLE"]. " " . $row["MAXI"];
				
				
			}
		
		?>

</body>
</html>