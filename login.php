<!DOCTYPE><!DOCTYPE>
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
		  <!-- <li><a href="./index.html">Home</a></li>
		  <li><a href="./purchasetickets.html">Purchase Tickets</a></li>
		  <li><a href="./browsemovies.php">Browse Movies</a></li>
		  <li><a href="#about">Theatres</a></li> -->
		  <li style="float:right"><a class="active" href="./login.php">Login</a></li>
		  <li style="float:right"><a class="active" href="./signup.php">Sign Up</a></li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="login.php" method="post">
		<center>
		<p>Account Number:</p>
		<input type="text" id="textbox" name="firstname">
		<input name="login" type="submit">
		</form>
		</center>
		
		<?php
			session_start();
			$mysqli = mysqli_connect('localhost', 'root', '', 'movies');

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// if ($_POST['login'] == $_POST['confirm-login']){
				if((isset($_POST['login']))) {
					//value of input
					$account_num = $_POST['firstname'];
					// echo $account_num;
				} 
				$sql = "SELECT * FROM customers WHERE ACCOUNT_NUM= '$account_num'";
				//Query
				$result = mysqli_query($mysqli, $sql) or die();	
				//Check if the value exists in the table Customers
				//Getting value at account_num
				// while ($row = mysqli_fetch_array($result)) {
				// 	$myString .= $row['ACCOUNT_NUM'] . " ";
				// }
				$count = mysqli_num_rows($result);
				//if query returns 1 row, set a session for that email, redirect to newpage.php
				if ($count !==1) {
					echo "login failed";
				}

				$sql2 = "SELECT * FROM customers WHERE ACCOUNT_NUM= '$account_num'";


				$result2 = mysqli_query($mysqli, $sql2);

				if ($result == NULL) {
					header("location: theatrecomplex.php");
				} 
				if ($count == 1) {
					header("location: newpage.php");
				} 
			 }
		
		?>

</body>
</html>