<?php
	session_start();
	$_SESSION['message'] = '';
	$mysqli = new mysqli('localhost', 'root', '', 'smart_incubator');

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//assign username, email, and password from signup
		$username = $_POST['username']; 
		$email = $_POST['email'];
		$password = $_POST['password'];

		//assign username to the session
		$_SESSION['username'] = $username;

		$sql = "INSERT INTO user (ID_User, Username, Email, Password) " . "VALUES (null, '$username', '$email', '$password')";

		//if the query is successful
		if($mysqli->query($sql) === true) {
			$_SESSION['message'] = 'Signup successful';
			session_unset();
			header("location:home.php");
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Smart Incubator: Signup </title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<style type="text/css">
		html, body {
			height: 100%;
		}

		#left-container {
			background-image: url(https://cdn.dribbble.com/users/496146/screenshots/3913097/baby_galloping.gif);
			background-color: #ccc;
			background-repeat: no-repeat;
			background-size: 120% 100%;
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
			background-color: #D2614A;
			float: left;
			width: 50%;
			height: 100%;
		}

		#right-container > div {
			height: 75%;
			margin: auto;
			transform: translate(0, 12.5%);
		}

		h1 {
			font-family: 'Fjalla One', sans-serif;
			padding: 35px 65px 0px;
			font-size: 50px;
			color: white;
		}

		ul li {
			margin: 25px 0px;
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
			<h1><i> Signup </i></h1>
			<form action="signup.php" method="post" autocomplete="off">
				<label for="username" id="username"> <i> Username </i> </label> <br>
				<input type="text" name="username" placeholder="Username" required="true" autofocus="true"> <br>
				<label for="email" id="email"> <i> E-mail </i> </label> <br>
				<input type="text" name="email" placeholder="E-mail" required="true"> <br>
				<label for="password" id="password"> <i> Password </i> </label> <br>
				<input type="password" name="password" placeholder="Password" required="true"> <br>
				<input type="submit" name="Submit">
			</form>
		</div>
	</div>
</body>
</html>