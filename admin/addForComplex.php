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
		<form action="addForComplex.php" method="post">
		<center>

		<p>Complex Name:</p>
		<input type="text" id="textbox" name="compname"> <br>
		<p>Address City:<p>
		<input type = "text" id = "textbox" name="varcity"><br>
		<p>Address Street:</p>
		<input type="text" id="textbox" name="addstreet"> <br>
		<p>Address Postal Code:</p>
		<input type="text" id="textbox" name="addpostalcode"> <br>
		<p>Number of Rooms:</p>
		<input type="text" id="textbox" name="numrooms"> <br>
		<p>Phone Number</p>
		<input type="text" id="textbox" name="phonenumber"> <br>
		<input name="login" type="submit">
		</form>
		</center>
		
		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['compname']) && isset($_POST['varcity']) && isset($_POST['addstreet']) && isset($_POST['addpostalcode']) && isset($_POST['numrooms']) && isset($_POST['phonenumber'])) {
					//value of input
					

					$stmt = $mysqli -> prepare("INSERT into THEATER_COMPLEXES (COMPLEX_ID, ADDRESS_CITY, ADDRESS_POSTALCODE, ADDRESS_STREET, NUM_ROOMS, COMPLEX_NAME, PHONE_NUMBER) values(?, ?, ?, ?, ?, ?, ?)");
					$stmt -> bind_param("ssssiss", $generatedComplexID, $comp_varcity, $comp_addpostalcode, $comp_addstreet, $comp_numrooms, $comp_name, $comp_phonenumber);

					$comp_name = $_POST['compname'];
					$comp_varcity = $_POST['varcity'];
					$comp_addstreet = $_POST['addstreet'];
					$comp_addpostalcode = $_POST['addpostalcode'];
					$comp_numrooms = $_POST['numrooms'];
					$comp_phonenumber = $_POST['phonenumber'];
			
					$int1 = 10000;
					$int2 = 99999;

					$checked = FALSE;
					while ($checked == FALSE) {
						$generatedComplexID = (rand ($int1, $int2));
						$sql = "SELECT * FROM `THEATER_COMPLEXES` WHERE COMPLEX_ID = '$generatedComplexID'";

						$result = mysqli_query($mysqli, $sql) or die();

						if($result -> num_rows == 0){
							$checked = TRUE;
						}
						
					}
				

					$stmt -> execute();

				} 
				
			 }
		
		?>

		<br>
		<br>
		<form action="addForComplex.php" method="post">
		<center>
			<h3> Want to delete a complex? </h3>
			<p>Enter ID of complex to delete:</p>
			<input type="text" id="textbox" name="deleteid"> <br>
			<input name="delete" type="submit">
		</center>
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$deleteid = $_POST['deleteid'];
				$sql2 = "DELETE FROM `THEATER_COMPLEXES` WHERE COMPLEX_ID = '$deleteid'";
				$result2 = mysqli_query($mysqli, $sql2) or die();
				mysqli_close($mysqli);
			}			

		?>
</body>
</html>