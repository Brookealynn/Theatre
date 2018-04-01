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
		<form action="signup.php" method="post">
		<center>

		<p>First Name:</p>
		<input type="text" id="textbox" name="Fname"> <br>
		<p>Last Name:</p>
		<input type="text" id="textbox" name="Lname"> <br>
			<p>Password:</p>
		<input type="text" id="textbox" name="password"> <br>
		<p>City:</p>
		<input type="text" id="textbox" name="city"> <br>
		<p>Street:</p>
		<input type="text" id="textbox" name="street"> <br>
		<p>Postal Code:</p>
		<input type="text" id="textbox" name="postalcode"> <br>
		<p>Phone Number:</p>
		<input type="text" id="textbox" name="phonenumber"> <br>
		<p>Credit Card Number:</p>
		<input type="text" id="textbox" name="creditnum"> <br>
		<p>Credit Card Expiry:</p>
		<input type="text" id="textbox" name="creditexpiry"> <br> <br>
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
				if(isset($_POST['password']) && isset($_POST['Fname']) && isset($_POST['Lname']) && isset($_POST['city']) && isset($_POST['street']) && isset($_POST['postalcode']) && isset($_POST['phonenumber']) && isset($_POST['creditnum']) && isset($_POST['creditexpiry'])) {
					//value of input
				
					

					$stmt = $mysqli -> prepare("INSERT into CUSTOMERS (ACCOUNT_NUM, ACCOUNT_PASSWORD, FNAME, LNAME, ADDRESS_CITY, ADDRESS_STREET, ADDRESS_POSTALCODE, PHONE, CREDIT_CARD_NUM, CREDIT_CARD_EXP) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

					$stmt -> bind_param("ssssssssss", $generatedAccountNum, $account_password, $user_Fname, $user_Lname, $user_city, $user_street, $user_postalcode, $user_phonenumber, $user_creditnum, $user_creditexpiry);

					$account_password = $_POST['password'];
					$user_Fname = $_POST['Fname'];
					$user_Lname = $_POST['Lname'];
					$user_city = $_POST['city'];
					$user_street = $_POST['street'];
					$user_postalcode = $_POST['postalcode'];
					$user_phonenumber = $_POST['phonenumber'];
					$user_creditnum = $_POST['creditnum'];
					$user_creditexpiry = $_POST['creditexpiry'];

					$int1 = 10000;
					$int2 = 99999;

					$checked = FALSE;
					while ($checked == FALSE) {
						$generatedAccountNum = (rand ($int1, $int2));
						$sql = "SELECT * FROM `CUSTOMERS` WHERE ACCOUNT_NUM = '$generatedAccountNum'";

						$result = mysqli_query($mysqli, $sql) or die();

						if($result -> num_rows == 0){
							$checked = TRUE;
						}
						
					}
					echo "This is your Account Number. You'll need it to sign in!  ";
					echo $generatedAccountNum;

					$stmt -> execute();

				} 
				
			 }
		
		?>

</body>
</html>