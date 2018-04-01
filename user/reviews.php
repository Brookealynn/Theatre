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

<!-- form test -->
		<form action="reviews.php" method="post">

		<p>Movie You'd Like to See Reviews For:</p>
		<input type="text" id="textbox" name="movietoreview">
		<input name="seereviews" type="submit">
		</form>

	<?php
		$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					// if ($_POST['login'] == $_POST['confirm-login']){
					if(isset($_POST['movietoreview']) ){

						if($mysqli == false) {
							die("Error" . mysqli_connect_error());
						}
						$movies = $_POST['movietoreview'];
						$sql = "SELECT * FROM `REVIEWS` WHERE TITLE = '$movies'";
						$result = mysqli_query($mysqli, $sql) or die();
						if($result -> num_rows > 0) {
							while ($row = $result -> fetch_assoc()) {
								echo "Movie Title:  ";
								echo $row["TITLE"]. "<br> Out of 10 Rating:  " .$row["RATING"]. "<br> Review: " .$row["REVIEW_TEXT"]. "<br>";
							}
						}
						else {
							echo "0 results";
						}
					}
			}

			
	?>

		<form action="reviews.php" method="post">
		<h3>Write a Review!</h3>
		<p>Title:</p>
		<input type="text" id="textbox" name="titlereview">
		<p>Rating (1-10):</p>
		<input type="text" id="textbox" name="rating">
		<p>Review Text:</p>
		<textarea name="textreview" cols="40" rows="5"></textarea> <br><br>
		<input name="submitreview" type="submit">
		</form>

		<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if(isset($_POST['titlereview']) && isset($_POST['rating']) && isset($_POST['textreview'])) {
					//value of input
				

					$stmt = $mysqli -> prepare("INSERT into REVIEWS (RATING, REVIEW_TEXT, ACCOUNT_NUM, TITLE) values(?, ?, ?, ?)");

					$stmt -> bind_param("isss", $ratingbox, $reviewbox, $account_num, $titlebox);

					$ratingbox = $_POST['rating'];
					$reviewbox = $_POST['textreview'];
					$account_num= $var;
					$titlebox = $_POST['titlereview'];

					$stmt -> execute();
				}

		}			

		?>
	</body>
</html>


