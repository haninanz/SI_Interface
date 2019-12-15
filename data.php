<?php
	session_start();

	if(!isset($_SESSION['status']) || !($_SESSION['status'] === true)) {
		session_unset();
		header("location:home.php");
		exit();
	}
	else {
		if(!isset($_SESSION['id'])) {
			session_unset();
			header("location:home.php");
			exit();
		}
	}
	
	require_once "config.php";

	$id = $_SESSION['id'];
	// $_SESSION['out'] = false;

	//retrieve data from temp_humid table
	$sql = "SELECT * FROM temp_humid WHERE ID_User = $id";

	$result = mysqli_query($link, $sql) OR die(mysqli_error($link));
	$row1 = mysqli_num_rows($result);

	if($row1 == 1) {
		$sql = "SELECT tempData, humidData FROM temp_humid WHERE ID_User = $id";

		$query = mysqli_query($link, $sql) OR die(mysqli_error($link));
		$status = mysqli_fetch_assoc($query);

		//assigning values
		$_SESSION['temp'] = $status["tempData"];
		$_SESSION['humid'] = $status["humidData"];
	}

	//retrieve data from breathing table
	$sql = "SELECT * FROM breathing WHERE ID_User = $id";

	$result = mysqli_query($link, $sql) OR die(mysqli_error($link));
	$row2 = mysqli_num_rows($result);

	if($row2 == 1) {
		$sql = "SELECT breathing_con FROM breathing WHERE ID_User = $id";

		$query = mysqli_query($link, $sql) OR die(mysqli_error($link));
		$status = mysqli_fetch_assoc($query);

		//assigning values
		if($status["breathing_con"] == 1) {
			$_SESSION['breathing'] = 'Normal';
		}
		else {
			$_SESSION['breathing'] = 'Abnormal';
		}
	}

	//retrieve data from hb_oc table
	$sql = "SELECT * FROM hb_oc WHERE ID_User = $id";

	$result = mysqli_query($link, $sql) OR die(mysqli_error($link));
	$row3 = mysqli_num_rows($result);

	if($row3 == 1) {
		$sql = "SELECT oxyConcentration, heartBeat FROM hb_oc WHERE ID_User = $id";

		$query = mysqli_query($link, $sql) OR die(mysqli_error($link));
		$status = mysqli_fetch_assoc($query);

		$_SESSION['oc'] = $status["oxyConcentration"];
		$_SESSION['hb'] = $status["heartBeat"];
	}

	// if($_SESSION['out'] == true) {
	// 	session_destroy();
	// 	header("location:home.php");
	// 	exit();
	// }
?>

<!DOCTYPE html>
<html>
<head>
	<title> SI: Check your baby </title>
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">
	<style type="text/css">
		html, body {
			height: 100%;
		}
		#left-container {
			width: 25%;
			height: 100%;
			background-color: #B4C6CA;
			position: relative;
			float: left;
			overflow-wrap: break-word;
		}

		h1 {
			font-family: 'Fjalla One', sans-serif;
			font-size: 50px;
			color: white;
			text-align: left;
			padding: 0px 25px;
		}

		#right-container {
			display: grid;
			float: left;
			width: 75%;
			height: 100%;
			grid-template-columns: 50% 50%;
		}

		.grid-container {
			display: grid;
			width: 100%;
			grid-template-rows: 50% 50%;
		}

		.grid-item {
			display: inline-block;
			background-color: white;
			opacity: 75%;
		}

		h3 {
			font-family: 'Fjalla One', sans-serif;
			color: white;
			padding: 15px;
		}

		ul {
			padding: 0px;
		}

		ul li {
			list-style-type: none;
			font-family: 'Fjalla One', sans-serif;
			font-size: 25px;
			padding: 15px 5px;
			border: 1px solid #A7B4B7;
			background-color: #A7B4B7;
			border-radius: 5px;
			box-shadow: 5px 5px grey;
			width: 60%;
			margin: 15px 25px;
		}

		ul li:hover {
			width: 77%;
			transition: width 1s;
		}

		li a {
			color: white;
		}

		.item {
			padding: 10px 30px;
			margin: 30px auto;
			font-size: 20px;
			font-family: 'Fjalla One', sans-serif;
			text-align: left;
			background-color: #939A9B;
			height: 75%;
			width: 75%;
			box-shadow: 5px 5px grey;
			color: white;
		}

		.item:hover {
			height: 80%;
			width: 80%;
			font-size: 23px;
			transition: height width font-size 2s;
		}

	</style>
</head>
<body>
	<div id="left-container">
		<h1><i> Check your baby's condition here </i></h1>
		<div>
			<ul>
				<li><a href=""><i> User Guide </i></a></li>
				<li><a href=""><i> Newsletter </i></a></li>
				<li><a href="home.php"><i> <span> Logout </span> <?php session_destroy(); ?> </i></a></li>
			</ul>
		</div>
	</div>
	<div id="right-container">
		<div class="grid-container">
			<div class="grid-item">
				<div class="item">
					<h3> <i> Temperature and Humidity </i> </h3>
					<p><i> <span> Temperature: </span> <?php echo $_SESSION['temp']; ?> °C </i></p>
					<p><i> <span> Humidity: </span> <?php echo $_SESSION['humid']; ?> % </i></p>
				</div>
			</div>
			<div class="grid-item">
				<div class="item">
					<h3> <i> Breathing Condition </i> </h3>
					<p><i> <span> Breathing: </span> <?php echo $_SESSION['breathing']; ?> </i></p>
				</div>
			</div>
		</div>
		<div class="grid-container">
			<div class="grid-item">
				<div class="item">
					<h3><i> Heartbeat </i></h3>
					<p><i> The baby's heartbeat is normal. </i></p>
					<p><i> <span> Hearbeat: </span> <?php echo $_SESSION['hb']; ?> BPM </i></p>
				</div>
			</div>
			<div class="grid-item">
				<div class="item">
					<h3><i> Oxygen Concentration </i></h3>
					<p><i> The oxygen concetration in blood is normal. </i></p>
					<p><i> <span> Concentration: </span> <?php echo $_SESSION['oc']; ?> </i></p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>