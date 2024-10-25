<?php 



$pwordacceptable = false;

$is_invalid = false;
if (isset($_POST["loginbtn"])) {
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		// collects all the informtation needed from the table where the email is matching the one entered by the user 
		$mysqli = require __DIR__ . "/database.php";

		$userEmail = $mysqli->prepare("SELECT * FROM user WHERE email=?");

		$userEmail->bind_param("s",$_POST['email']);

		$userEmail->execute();

		$email = $userEmail->get_result();

		$email = $email->fetch_assoc();

	//	$pwordcheck = password_verify($_POST['password'], $email['password_hash']);

		if (! $email) {
			$isValid = False;

		} 
		else {

			if (password_verify($_POST['password'], $email['password_hash'])) {

				$isValid = true;
				if ($email['admin']){

					$isAdmin = True;

				} 
				else {

					$isAdmin = False;

				}



			} 
			else {

				$isValid = false;

			}
		}

		
		// checks if the user is an admin and assigns to $isAdmin

		if ($isValid) {
			
			session_start();
			session_regenerate_id();
			$_SESSION["user_id"] = $email["id"];

			if ($isAdmin) {
				header("Location: teacherindex.php");
				exit;
			} else {
				header("Location: index.php");
				exit;
			}

		}else {
			$is_invalid = true;
		}

		}else {
			echo 'server error';
		}


	}


?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PriLang - Login</title>
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
<h1 class="title bebas-neue-regular"> Login </h1>
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
	<!-- Information and buttons section -->
	<div class="login-container">
		<div class="login-grid">
			<!-- beginning of row -->
			<div></div>
			<div>
			<form name="login" method="post">
				<?php if ($is_invalid): ?>
					<em style="color: red;"><b>Invalid Login</b></em>
					<br>
					<br>
				<?php endif; ?>
				<input type="email" name="email" placeholder="Email" id="email" color="white" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
				</div>
				<div></div>
				<!-- end of row -->
				<!-- beginning of row -->
				<div></div>
				<div>
					<input type="password" name="password" placeholder="Password" id="password">
				</div>
				<div></div>
				<!-- end of row -->
				<!-- beginning of row -->
				<div></div>
				<div>
					<button name="loginbtn" class="loginsignup">Login</button>
				</div>
				<div></div>
				<!-- end of row -->
				<!-- beginning of row -->
				<div></div>
				<div>
					<button type="button"  onClick="TheSignup('signup.php')" class="loginsignup">Signup</button>
				</div>
				<div></div>
				<!-- end of row -->
			</form>
		</div>
	</div>
	<br>
	<!-- Forgot Password section -->
	<div class="fgtpword-container">
		<div class="fgtpword-grid">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div><p class="fgtpword" onClick="TheSignup('fgtpword.php')">Forgot password?</p></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
	</div>
	<!-- Flags at the bottom -->
	<div class="fixbottom" >
			<img src="../img/flags.png" alt="Picture of the flags of the UK/America, Poland and Italy" >
	</div>
</body>
</html>