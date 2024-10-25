<?php 
include 'fgtpword-process.php'
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PriLang - Forgot Password</title>
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
</head>
<h1 class="title bebas-neue-regular"> Forgot Password </h1>
<header onLoad="MM_preloadImages('../img/monkeylogowithbanana.png')">
<div class="logo-container">
	<div class="logo-grid">
		  <div></div>
		  <div>
			<a onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('monkeylogowithbanana','','../img/monkeylogowithbanana.png',1)"><img src="../img/monkeylogo.png" alt="Logo images that rollover to a monkey with a banana" width="145" height="223" id="monkeylogowithbanana"></a> 
		  </div>
		  <div></div>
	</div>
</div>
</header>
<body>
	<h1 class="bebas-neue-regular" style="text-align: center;">Use the box below to enter your email and retrieve your hint.</h1>
<br>
	<div class="forgot-page"> 
		<div></div>
		<div>
			<form action="fgtpword-process.php" name="fgtpword" method="post">
				<input type="email" name="emailcheck" placeholder="Email here" id="emailcheck" color="white">
				<br>
				<br>
				<br>
				<button>Submit Email</button>
				<p>&nbsp</p>
			</form>
			<button onClick="javascript:Return('../php/login.php')">Return</button>
		</div>
	</div>
	<br>
<?php if(isset($_GET['user'])): ?>
	<h1 class="bebas-neue-regular" style="text-align:center">Your password reset is: <?= $_GET['user'] ? htmlspecialchars($_GET['user']) : 'Undefined' ?>.</h1>
<?php endif; ?>

</body>
</html>