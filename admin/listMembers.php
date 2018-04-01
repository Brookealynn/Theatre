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

		<?php
			
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');


			$sql = "SELECT * FROM `CUSTOMERS` ";
			$result = mysqli_query($mysqli, $sql) or die();

			if($result -> num_rows > 0) { 
				while ($row = $result -> fetch_assoc()) {
					echo "Customer ";
					echo "First name:  " .$row["FNAME"]. "      Last name:  " .$row["LNAME"]. "     Account Number:  " .$row["ACCOUNT_NUM"]. "<br>";

					}
				
			}

		?>
		<form action="listMembers.php" method="post">
		<center>

		<h3>Which Account ID Would You like to Cancel?</h3>
		<p>Please Enter the Account ID to Cancel</p>
		<input type="text" id="textbox" name="deleteaccount"> <br>
		<input name="login" type="submit">
		</center>
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$delete_account = $_POST['deleteaccount'];
				$sql2 = "DELETE FROM CUSTOMERS WHERE ACCOUNT_NUM = '$delete_account'";
				$result2 = mysqli_query($mysqli, $sql2) or die();
				mysqli_close($mysqli);
			}


		?>
</body>
</html>