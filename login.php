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
		  <!-- <li><a href="./index.html">Home</a></li>
		  <li><a href="./purchasetickets.html">Purchase Tickets</a></li>
		  <li><a href="./browsemovies.php">Browse Movies</a></li>
		  <li><a href="#about">Theatres</a></li> -->
		  <li style="float:right"><a class="active" href="./signup.php">Sign Up</a></li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="login.php" method="post">
		<center>
		<p>Account Number:</p>
		<input type="text" id="textbox" name="accountnum">
		<p>Password:</p>
		<input type="text" id="textbox" name="password"> <br>
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
				if(isset($_POST['accountnum']) && isset($_POST['password'])) {
					//value of input
					$account_num = $_POST['accountnum'];
					$account_password = $_POST['password'];
					// echo $account_num;
				} 
				$sql = "SELECT * FROM `customers` WHERE ACCOUNT_NUM= '$account_num' AND ACCOUNT_PASSWORD = '$account_password'";
				//Query
				$result = mysqli_query($mysqli, $sql) or die();

				$row = $result -> fetch_assoc();

				$_SESSION["username"] = $row["FNAME"];
				$_SESSION["userID"] = $row["ACCOUNT_NUM"];
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
				else{
					$sql2 = "SELECT * FROM `customers` WHERE ACCOUNT_NUM= '$account_num' AND ACCOUNT_PASSWORD = '$account_password'";


					$result2 = mysqli_query($mysqli, $sql2);

					$row = $result2 -> fetch_assoc();
					if (($row["PRIMARY_COMPLEX"]) == NULL) {
						header("location: selectprimarycomplex.php");
				} 
				}


				
			 }
		
		?>

</body>
</html>