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
		<form action="addMovie.php" method="post">
		<center>
		<p>Movie Name:</p>
		<input type="text" id="textbox" name="movienamebox"> <br>
		<p>Duration:</p>
		<input type="text" id="textbox" name="durationbox"> <br>
		<p>Rating:</p>
		<input type="text" id="textbox" name="ratingbox"> <br>
		<p>Plot:</p>
		<textarea name="plotbox" cols="40" rows="5"></textarea> <br>
		<p>Director:</p>
		<input type="text" id="textbox" name="directorbox"> <br>
		<p>Company:</p>
		<input type="text" id="textbox" name="companybox"> <br>
		<p>Supplier:</p>
		<input type="text" id="textbox" name="supplierbox"> <br>
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
				if(isset($_POST['movienamebox']) && isset($_POST['durationbox']) && isset($_POST['ratingbox']) && isset($_POST['plotbox']) && isset($_POST['directorbox']) && isset($_POST['companybox']) && isset($_POST['supplierbox'])) {

					$stmt = $mysqli -> prepare("INSERT into MOVIES (TITLE, DURATION, RATING, PLOT, DIRECTOR, COMPANY, SUPPLIER_NAME) values(?, ?, ?, ?, ?, ?, ?)");
					$stmt -> bind_param("sssssss", $movie_name, $duration_name, $rating_name, $plot_name, $director_name, $company_name, $supplier_name);

					$movie_name = $_POST['movienamebox'];
					$duration_name = $_POST['durationbox'];
					$rating_name = $_POST['ratingbox'];
					$plot_name = $_POST['plotbox'];
					$director_name = $_POST['directorbox'];
					$company_name = $_POST['companybox'];
					$supplier_name = $_POST['supplierbox'];

				
						
					}
				

					$stmt -> execute();

				
				
			 }
		
		?>

</body>
</html>