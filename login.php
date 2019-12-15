<?php
	//initialize session
	session_start();

	if(isset($_SESSION['status']) && ($_SESSION['status'] === true)) {
		header("location:start.php");
		exit();
	}

	require_once "config.php";

	//define variables
	$username = $password = "";

	//variable used later
	$_SESSION['datasent'] = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//assume the username and password input are always right
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password'";

		$result = mysqli_query($link, $sql) OR die(mysqli_error($link));
		$row = mysqli_num_rows($result);

		if($row == 1) {
			$sql = "SELECT ID_User, Username FROM user WHERE Username = '$username'";

			$result = mysqli_query($link, $sql) OR die(mysqli_error($link));
			$status = mysqli_fetch_assoc($result);

			//assigning values to $_SESSION
			$_SESSION['id'] = $status["ID_User"];
			$_SESSION['username'] = $status["Username"];
			$_SESSION['status'] = true;

			header("location:start.php");
			exit();
		}
		else {
			$invlogin = true;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Smart Incubator: Login </title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<style type="text/css">
		html, body {
			height: 100%;
		}

		#left-container {
			background-image: url(https://vedasri.files.wordpress.com/2018/02/shot_4.gif);
			background-color: #ccc;
			background-repeat: no-repeat;
			background-size: 110% 100%;
			background-position: center;
			position: relative;
			width: 50%;
			height: 100%;
			float: left;
		}

		#left-container:hover {
			opacity: 75%;
		}

		#right-container {
			background-color: #E0C3B4;
			float: left;
			width: 50%;
			height: 100%;
		}

		#right-container > div {
			height: 75%;
			margin: auto;
			transform: translate(0, 19%);
		}

		h1 {
			font-family: 'Fjalla One', sans-serif;
			padding: 35px 65px 0px;
			font-size: 50px;
			color: white;
		}

		.box {
			display: block;
			color: white;
			width: 50%;
			border-radius: 5px;
			background-color: #B18973;
			font-family: 'Fjalla One', sans-serif;
			padding: 10px 20px;
			font-size: 25px;
			box-shadow: 5px 5px grey;
		} 

		.box:hover {
			width: 90%;
			transition: width 1s;
		}

		form {
			padding: 15px 65px;
		}

		label {
			font-family: 'Fjalla One', sans-serif;
			font-size: 25px;
			color: white;
			margin-top: 10px;
			margin-bottom: 5px;
		}

		input {
			margin-bottom: 10px;
			padding: 10px 10px;
			width: 50%;
			border-radius: 5px;
			font-size: 15px;
			box-shadow: 5px 5px grey;
		}

		input:focus {
			width: 80%;
			transition: width 1s;
			border: 2px solid #9EB7C4;
			border-radius: 5px;
		}

		input[type=submit] {
			width: auto;
			font-family: 'Fjalla One', sans-serif;
			font-size: 15px;
			margin: 10px 0px;
			background-color: #B4D1E0;
			color: white;
		}

		input[type=submit]:hover {
			background-color: #9EB7C4;
		}
	</style>
</head>
<body>
	<div id="left-container"></div>
	<div id="right-container">
		<div>
			<h1><i> Login </i></h1>
			<form action="login.php" method="post" autocomplete="off">
				<label for="username" id="username"> <i> Username </i> </label> <br>
				<input type="text" name="username" placeholder="Username" required="true" autofocus="true"> <br>
				<label for="password" id="password"> <i> Password </i> </label> <br>
				<input type="password" name="password" placeholder="Password" required="true"> <br>
				<input type="submit" name="Submit">
			</form>
		</div>
	</div>
</body>
</html>