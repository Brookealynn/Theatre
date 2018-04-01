<!DOCTYPE>
<html>
<div id="scroll">

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
		

		<?php
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if (($_SERVER['REQUEST_METHOD'] == 'GET') || ($_SERVER['REQUEST_METHOD'] == 'POST')) {

				$sql = "SELECT * FROM `SHOWINGS`";
				$result = mysqli_query($mysqli, $sql) or die();

				if($result -> num_rows > 0) {
					echo "<br>"; 
					while ($row = $result -> fetch_assoc()) {

						echo $row["SHOWING_ID"]. " ". $row["SHOWING_DATE"]. " " . $row["START_TIME"]. " " . $row["END_TIME"]. " " . $row["TITLE"]. " " . $row["COMPLEX_ID"]. " " . $row["SCREENSIZE"] . " " . $row["IMAX_3D"] . " " . $row["MAX_SEATS"] . " ".$row["DURATION"] ."<br>";

					}
				}
	
			}
		
		?>

		</center>
		</header>

		<!-- form test -->
		<form action="updateShowings.php" method="post">
		<center>
		<p>Insert ID of movie to delete</p>
		<input type="text" id="textbox" name="idtodelete"> <br>
		<input name="login" type="submit">
		<br>
		<br>
		<br>
		</form>
		</center>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if (isset($_POST['idtodelete'])){

					$idtodelete = $_POST['idtodelete'];
					$sql = "DELETE FROM `SHOWINGS` WHERE SHOWING_ID = '$idtodelete'";
					$result = mysqli_query($mysqli, $sql) or die ();
					echo "hi";
					mysqli_close($mysqli);
				}
			}
		?>

		<!-- form test -->
		
		<form action="updateShowings.php" method="post">
		<center>
		<p>Add a new showing:</p>
		<p>showing date</p>
		<input type="text" id="textbox" name="showdate"> <br>
		<p>showing start time</p>
		<input type="text" id="textbox" name="starttime"> <br>
		<p>showing end time</p>
		<input type="text" id="textbox" name="endtime"> <br>
		<p>Movie title</p>
		<input type="text" id="textbox" name="movietitle"> <br>
		<p>showing complex ID</p>
		<input type="text" id="textbox" name="complexid"> <br>
		<p>screen size</p>
		<input type="text" id="textbox" name="screensize"> <br>
		<p>is IMAX_3D</p>
		<input type="text" id="textbox" name="imaxd"> <br>
		<p>max seats</p>
		<input type="text" id="textbox" name="maxseats"> <br>
		<input name="login" type="submit">
		</form>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if((isset($_POST['showdate'])) && (isset($_POST['starttime'])) && (isset($_POST['endtime'])) && (isset($_POST['movietitle'])) && (isset($_POST['complexid'])) && (isset($_POST['screensize'])) && (isset($_POST['imaxd'])) && (isset($_POST['maxseats']))){

					$stmt2 = $mysqli -> prepare("INSERT into SHOWINGS (SHOWING_ID, SHOWING_DATE, START_TIME, END_TIME, TITLE, COMPLEX_ID, SCREENSIZE, IMAX_3D, MAX_SEATS) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$stmt2 -> bind_param("sssssisii", $generatedshowingid ,$showdate, $starttime, $endtime, $movietitle, $complexid, $screensize, $imaxd, $maxseats) ;
					$showdate = $_POST['showdate'];
					$starttime = $_POST['starttime'];
					$endtime = $_POST['endtime'];
					$movietitle = $_POST['movietitle'];
					$complexid = $_POST['complexid'];
					$screensize = $_POST['screensize'];
					$imaxd = $_POST['imaxd'];
					$maxseats = $_POST['maxseats'];

					$int1 = 10000;
					$int2 = 99999;

					$checked = FALSE;
					while ($checked == FALSE) {
						$generatedshowingid = (rand ($int1, $int2));
						$sql2 = "SELECT * FROM `SHOWINGS` WHERE SHOWING_ID = '$generatedshowingid'";

						$result2 = mysqli_query($mysqli, $sql2) or die();

						if($result2 -> num_rows == 0){
							$checked = TRUE;
						}
						
					}
					$stmt2 -> execute() or die();
				}
			}
		?>


		</center>
		</header>
		<br>
		<br>
		<br>
		<!-- form test -->
		<form action="updateShowings.php" method="post">
		<center>
		<h3>Insert ID of movie time to update<h3>
		<p>Enter Showing ID </p>
		<input type="text" id="textbox" name="showingID"> <br>
		<p>New start date</p>
		<input type="text" id="textbox" name="startdate"> <br>
		<p>New start time</p>
		<input type="text" id="textbox" name="starttime"> <br>
		<p>New end time</p>
		<input type="text" id="textbox" name="endtime"> <br>
		<input name="login" type="submit">
		<br>
	
		</form>
		</center>

		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				if((isset($_POST['showingID'])) && (isset($_POST['startdate'])) && (isset($_POST['starttime'])) && (isset($_POST['endtime']))){

					$showingID = $_POST['showingID'];
					$startdate = $_POST['startdate'];
					$starttime = $_POST['starttime'];
					$endtime = $_POST['endtime'];

					$sql3 = "UPDATE `SHOWINGS` SET SHOWING_DATE = '$startdate', START_TIME = '$starttime', END_TIME = '$endtime' WHERE SHOWING_ID = '$showingID'";

					$result3 = mysqli_query($mysqli, $sql3) or die();
				}
			}


		?>
	


</div>
</body>
</html>