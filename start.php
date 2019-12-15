<?php
	session_start();

	require_once "config.php";

	//kalau udah bisa ngirim data dari arduino, buat kodingan buat validasi sesuai spek atau nggak
?>

<!DOCTYPE html>
<html>
<head>
	<title> Smart Incubator: Start </title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<style type="text/css">
		html, body {
			height: 100%;
			background-color: #9BB9C0;
		}

		#container {
			padding-top: 122px;
			padding-bottom: 122px;
		}

		#title {
			font-family: 'Fjalla One', sans-serif;
			font-size: 50px;
			text-align: center;
			color: white;
			margin: auto auto 0px auto;
			
		}

		div > div:nth-of-type(2) {
			text-align: center;
		}

		button {
			font-family: 'Fjalla One', sans-serif;
			font-size: 40px;
			color: white;
			background-color: #C0A29B;
			padding: 20px 30px;
			border-radius: 8px;
		}

		button:hover {
			background-color: #B09994;
			transition: background-color 1s;
		}

	</style>
</head>
<body>
	<div id="container">
		<div id="title">
			<h1><i> Press to start taking data </i></h1>
		</div>
		<div>
			<button onclick="window.location.href = 'data.php'"> Start </button>
		</div>
	</div>
</body>
</html>