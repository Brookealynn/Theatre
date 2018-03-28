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
		  <li><a href="./index.html">Home</a></li>
		  <li><a href="./purchasetickets.html">Purchase Tickets</a></li>
		  <li><a href="./browsemovies.php">Browse Movies</a></li>
		  <li><a href="./about.html">About</a></li>
		  <li style="float:right"><a class="active" href="./account.html">Account Settings</a></li>
		</ul>
		</nav>
		</center>
	</header>

	<!--Table-->
	<table>
		<thead>
			<tr>
				<th>Movie</th>
				<th>Tickets</th>
				<th>Theatre</th>
				<th>Start Time</th>
				<th>Complex</th>
			</tr>
		</thead>
		<tbody>
	<!-- form test -->
		<!-- <form action="browsemovies.php" method="post"> -->
		<!-- Need to add rows to table -->
		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (isset($_POST['purchases'])) {
					$sqlDisplayMovies = "SELECT * FROM `MOVIES`";
					$resultDisplayMovies = mysqli_query($mysqli, $sqlDisplayMovies);

					while ($row = mysqli_fetch_array($resultDisplayMovies)) {
						//trying to grab stuff from DB
						echo "<tr>";
							echo "<td>" .row['title'] . "</td>";
							echo "<td>" .row['rating'] . "</td>";
						echo "</tr>";
					}
				}
			} $mysqli->close();
		?>
		</tbody>
	</table>




</html>