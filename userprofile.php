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
		  ?>
		  </a>
		  </li>
		</ul>
		</nav>
		</center>
	</header>

		<!-- form test -->
		<form action="userprofile.php" method="post">
		<center>

		<p>First Name:</p>
		<input type="text" id="textbox" name="Fname"> <br>
		<input name="varfname" type = "submit">
		<p>Last Name:</p>
		<input type="text" id="textbox" name="Lname"> <br>
		<input name="varlname" type = "submit">
		<p>Password:</p>
		<input type="text" id="textbox" name="password"> <br>
		<input name="varpassword" type = "submit">
		<p>City:</p>
		<input type="text" id="textbox" name="city"> <br>
		<input name="varcity" type = "submit">
		<p>Street:</p>
		<input type="text" id="textbox" name="street"> <br>
		<input name="varstreet" type = "submit">
		<p>Postal Code:</p>
		<input type="text" id="textbox" name="postalcode"> <br>
		<input name="varpostalcode" type = "submit">
		<p>Phone Number:</p>
		<input type="text" id="textbox" name="phonenumber"> <br>
		<input name="varphonenumber" type = "submit">
		<p>Credit Card Number:</p>
		<input type="text" id="textbox" name="creditnum"> <br>
		<input name="varcreditcard" type = "submit">
		<p>Credit Card Expiry:</p>
		<input type="text" id="textbox" name="creditexpiry"> <br> <br>
		<input name="varcreditexpiry" type = "submit">
		</form>
		</center>

		<?php
			session_start();
			print_r($_SESSION["username"]);
			$var = ($_SESSION["userID"]);
			$mysqli = mysqli_connect('localhost', 'root', 'tuid2y17', 'movies');

			

			if($mysqli == false) {
				die("Error" . mysqli_connect_error());
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if(isset($_POST['varfname'])){
					$user_Fname = $_POST['Fname'];
					if ($user_Fname == NULL){
						echo "no name";
					}
					else{
						$sql = "UPDATE `CUSTOMERS` SET FNAME = '$user_Fname' where ACCOUNT_NUM = '$var'";
						$result = mysqli_query($mysqli, $sql) or die();
						$_SESSION["username"] = $user_Fname;
					}
			
				}

				if(isset($_POST['varlname'])){
					$user_Lname = $_POST['Lname'];
					if ($user_Lname == NULL){
						echo "no name";
					}
					else{
						$sql2 = "UPDATE `CUSTOMERS` SET LNAME = '$user_Lname' where ACCOUNT_NUM = '$var'";
						$result2 = mysqli_query($mysqli, $sql2) or die();
					}
			
				}

				if(isset($_POST['varpassword'])){
					$user_password = $_POST['password'];
					if ($user_password == NULL){
						echo "no password";
					}
					else{
						$sql3 = "UPDATE `CUSTOMERS` SET ACCOUNT_PASSWORD = '$user_password' where ACCOUNT_NUM = '$var'";
						$result3 = mysqli_query($mysqli, $sql3) or die();
					}
			
				}
				if(isset($_POST['varcity'])){
					$user_city = $_POST['city'];
					if ($user_city == NULL){
						echo "no city";
					}
					else{
						$sql4 = "UPDATE `CUSTOMERS` SET ADDRESS_CITY = '$user_city' where ACCOUNT_NUM = '$var'";
						$result4 = mysqli_query($mysqli, $sql4) or die();
					}
			
				}

				if(isset($_POST['varstreet'])){
					$user_street = $_POST['street'];
					if ($user_street == NULL){
						echo "no street";
					}
					else{
						$sql5 = "UPDATE `CUSTOMERS` SET ADDRESS_STREET = '$user_street' where ACCOUNT_NUM = '$var'";
						$result5 = mysqli_query($mysqli, $sql5) or die();
					}
			
				}

				if(isset($_POST['varpostalcode'])){
					$user_postalcode = $_POST['postalcode'];
					if ($user_postalcode == NULL){
						echo "no postalcode";
					}
					else{
						$sql6 = "UPDATE `CUSTOMERS` SET ADDRESS_POSTALCODE = '$user_postalcode' where ACCOUNT_NUM = '$var'";
						$result6 = mysqli_query($mysqli, $sql6) or die();
					}
			
				}

				if(isset($_POST['varphonenumber'])){
					$user_phonenumber = $_POST['phonenumber'];
					if ($user_phonenumber == NULL){
						echo "no phone number";
					}
					else{
						$sql7 = "UPDATE `CUSTOMERS` SET PHONE = '$user_phonenumber' where ACCOUNT_NUM = '$var'";
						$result7 = mysqli_query($mysqli, $sql7) or die();
					}
			
				}

				if(isset($_POST['varcreditcard'])){
					$user_creditcard = $_POST['creditnum'];
					if ($user_creditcard == NULL){
						echo "no credit card";
					}
					else{
						$sql8 = "UPDATE `CUSTOMERS` SET CREDIT_CARD_NUM = '$user_creditcard' where ACCOUNT_NUM = '$var'";
						$result8 = mysqli_query($mysqli, $sql8) or die();
					}
			
				}

				if(isset($_POST['varcreditexpiry'])){
					$user_creditexpiry = $_POST['creditexpiry'];
					if ($user_creditexpiry == NULL){
						echo "no credit expiry";
					}
					else{
						$sql9 = "UPDATE `CUSTOMERS` SET CREDIT_CARD_EXP = '$user_creditexpiry' where ACCOUNT_NUM = '$var'";
						$result9 = mysqli_query($mysqli, $sql9) or die();
					}
			
				}
			}


		
		?>

</body>
</html>