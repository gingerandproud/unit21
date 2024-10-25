<?php 

session_start();

if (isset($_SESSION["user_id"])) {
	
	$mysqli = require __DIR__ . "/database.php";

	$sql = "SELECT * FROM user WHERE id={$_SESSION['user_id']}";

	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PriLang - Student Home</title>
	<link rel="icon" type="image/x-icon" href="../img/monkeylogo.ico">
	<!-- CSS files -->
	<link rel="stylesheet" type="text/css" href="../css/resetsheet.css">
	<link rel="stylesheet" type="text/css" href="../css/text.css">
	<link rel="stylesheet" type="text/css" href="../css/general.css">
	<link rel="stylesheet" type="text/css" href="../css/backgrounds.css">
	<link rel="stylesheet" type="text/css" href="../css/grids.css">
	<!-- Google font connections -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	
	<!-- JS scripts -->
	<script src="../js/prilang.js"></script>
<body>
	<?php if (isset($user)): ?>
			<div class="header-container">
				<div class="header-grid">
					<div></div>
					<div>
						<h1 class="title bebas-neue-regular"> Student Home </h1>
					</div>
					<div>
						<form action="../php/logout.php" method="post>">
						<button>Logout</button>
						</form>
				</div>
			</div>
			<body onLoad="MM_preloadImages('../img/monkeylogowithbanana.png')">
			<div class="logo-container">
				<div class="logo-grid">
					  <div></div>
					  <div>
						<a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('monkeylogowithbanana','','../img/monkeylogowithbanana.png',1)"><img src="../img/monkeylogo.png" alt="Logo images that rollover to a monkey with a banana" width="145" height="223" id="monkeylogowithbanana"></a> 
					  </div>
					  <div></div>
				</div>
			</div>
		<h1 class="title bebas-neue-regular">Welcome <?= htmlspecialchars($user["name"]) ?>!</h1>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/1BppkVF4D7s?si=DCHe70v8P8P7UY3R" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="centerimage"></iframe>	<div class="navigation-buttons-container">
		<p>&nbsp</p>
		<div class="navigation-buttons-grid">
			<div></div>
			<div>
				<button type="button" onClick="javascript:learn('../html/learn.html')" target="_self">Learn</button>
			</div>
			<div>
				<h3 class="bebas-neue-regular h4">/10</h3>
			</div>
			<div>
				<h4 class="bebas-neue-regular h4">You must complete the learning activity at least 10 times before continuing.</h4>
			</div>
			<div></div>
			<div>
				<button type="button" onclick="javascript:test('../html/test.html')" target="_self">Test</button>
			</div>
			<div></div>
			<div></div>
			<div></div>
			<div>
				<button type="button" onclick="javascript:games('../html/games.html')" target="_self">Games</button>
			</div>
			<div></div>
			<div></div>
			<div></div>
			<div>
				<button type="button" onclick="javascript:progress('../html/progress.html')" target="_self">Progress</button>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="header-container">
			<div class="header-grid">
				<div></div>
				<div>
					<h1 class="title bebas-neue-regular"> Home </h1>
				</div>
				<div>
					<form action="../php/logout.php" method="post>">
					<button>Logout</button>
					</form>
				</div>
			</div>
		</div>
		<body onLoad="MM_preloadImages('../img/monkeylogowithbanana.png')">
		<div class="logo-container">
			<div class="logo-grid">
				  <div></div>
				  <div>
					<a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('monkeylogowithbanana','','../img/monkeylogowithbanana.png',1)"><img src="../img/monkeylogo.png" alt="Logo images that rollover to a monkey with a banana" width="145" height="223" id="monkeylogowithbanana"></a> 
				  </div>
				  <div></div>
			</div>
		</div>
		<h1 class="title bebas-neue-regular">You must login <a href="login.php">here</a> or sign up <a href="signup.php">here</a></h1>
	<?php endif; ?>
	
</body>