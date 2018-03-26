<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="A nifty tool that assists in tracking Notorious Monster kill timers in FFXIV.">
	<meta name="keywords" content="FFXIV, Final Fantasy 14, Final Fantasy XIV, Eureka, Eureka Anemos, FFXIV Tracker, XIV Tracker, FF Tracker, Eureka Tracker, Eureka Anemos Tracker">
	<meta name="author" content="Dante Sanctus">
	<meta name="theme-color" content="#141619">
	<meta property="og:image" content="http://ffxiv.net/assets/img/element/ice.png">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:alt" content="Eureka Tracker">
	<meta property="og:description" content="A nifty tool that assists in tracking Notorious Monster kill timers in FFXIV.">
	<meta property="og:title" content="Eureka Tracker">
	<title>Eureka Tracker</title>
	<link rel="shortcut icon" href="/assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/assets/css/theme.min.css" rel="stylesheet">
	<link href="/assets/css/custom.css?v1.9" rel="stylesheet"> 
	<link href="/assets/css/helpers.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'> 
	<link href="/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/plugins/animate/animate.min.css" rel="stylesheet">
	<link href="/assets/plugins/animate/animate.delay.css" rel="stylesheet">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
<?php IF(ISSET($_SESSION['style']) && $_SESSION['style'] != 'light'): ?>
	<link href="/assets/css/theme.dark.css?01" rel="stylesheet">
<?php ENDIF ?>
</head>
<body class="fixed-header">
	<header>
		<div class="container">
			<span class="bar hide"></span>
			<a href="/" class="logo">Eureka Tracker</a>
			<nav></nav>
			<nav>
				<div class="nav-control">
					<ul>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Help</a>
							<ul class="dropdown-menu default">
								<li><a href="/help.php">FAQ and User Manual</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<nav>
				<div class="nav-control">
					<ul>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">Join</a>
							<ul class="dropdown-menu default">
								<li><a href="/new.php">New Instance</a></li>
								<li><a href="/join.php">Existing Instance</a></li>
<?php IF(ISSET($_SESSION['currentSLUG'])): ?>
								<li><a href="/track/<?= $_SESSION['currentSLUG'] ?>">Return To <strong><?= $_SESSION['currentNAME'] ?></strong></a></li>
<?php ENDIF ?>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<div class="nav-right">
				<nav>
					<div class="nav-control">
						<ul>
							<li>
								<a href="#"><span id="galeCounter"><img src="/assets/img/weather/Gales_M.png?v1.0"> -</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<div class="weatherContainer">
		<div id="weather1" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title="" style="width:20%;"></div>
		<div id="weather2" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title="" style="width:20%;"></div>
		<div id="weather3" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title="" style="width:20%;"></div>
		<div id="weather4" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title="" style="width:20%;"></div>
		<div id="weather5" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title="" style="width:20%;"></div>
		<div id="weather6" class="weatherBack" data-toggle="tooltip" data-placement="bottom" data-original-title=""></div>
	</div>