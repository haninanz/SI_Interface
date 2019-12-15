<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title> Smart Incubator: Home </title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<style type="text/css">
		html, body {
			height: 100%;
		}

		#left-container {
			background-image: url(http://cdn130.picsart.com/250983141018202.gif);
			background-color: #ccc;
			background-repeat: no-repeat;
			background-size: cover;
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
			background-color: #CA9C83;
			float: left;
			width: 50%;
			height: 100%;
		}

		#right-container > div {
			height: 75%;
			margin: auto;
			transform: translate(0, 15%);
		}

		h1 {
			font-family: 'Fjalla One', sans-serif;
			padding: 35px 65px 0px;
			font-size: 50px;
			color: white;
		}

		ul {
			padding: 15px 65px;
		}

		ul li {
			margin: 25px 0px;
		}

		li a {
			color: white;
		}

		.box {
			display: block;
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
	</style>
</head>
<body>
	<div id="left-container"></div>
	<div id="right-container">
		<div>
			<h1><i> Home </i></h1>
			<ul>
				<li class="box" title="Login to check on your baby!"> <a href="login.php"> <i> Login </i> </a> </li>
				<li class="box" title="About us"> <a href=""> <i> About </i> </a> </li>
				<li class="box" title="No account yet? Sign up here!"> <a href="signup.php"> <i> Signup </i> </a> </li>
			</ul>
		</div>
	</div>
</body>
</html>