<?php
$is_invalid = false;
if (isset($_POST['signup'])){

	if (empty($_POST["name"])){
		$is_invalid = true;	
	}

	if (empty($_POST["email"])){
		$is_invalid = true;
	}

	if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$is_invalid = true;
	}

	if (strlen($_POST["password"])<8) {
		$is_invalid = true;		
	}

	if (empty($_POST["forgotpassword"])){
		$is_invalid = true;
	}

	if (! preg_match("/[a-z]/i", $_POST["password"])) {
		$is_invalid = true;
	}

	if (! preg_match("/[0-9]/", $_POST["password"])) {
		$is_invalid = true;
	}

	if ($_POST["password"] !== $_POST["confirmpassword"]) {
		$is_invalid = true;
	}

	if ($_POST["email"] !== $_POST["confirmemail"]){
		$is_invalid = true;
	}

	if(empty($_POST['admin'])) {
	   $isAdmin = False;
	} else {
	  $isAdmin = True;
	}


	if ( ! $is_invalid){
		$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

		$mysqli = require __DIR__ . "/database.php";

		$sql = "INSERT INTO user (name, email, password_hash, forgotpassword, admin) VALUES (?,?,?,?,?)";

		$stmt = $mysqli->stmt_init();

		if (! $stmt->prepare($sql)){
			die("SQL Error: " . $mysqli->error);
		}

		$stmt->bind_param("sssss", $_POST["name"], $_POST["email"], $password_hash, $_POST["forgotpassword"], $isAdmin);

		try {
			if ($stmt->execute()) {
				if ($isAdmin===true) {
					header("Location:../html/payment.html");

					exit;
				} elseif ($isAdmin===false) {;
					header("Location:../html/payment.html");
			} else {
				throw new Exception("Error executing statement.");
			}
		}
		} catch (Exception $e) {
			if ($mysqli->errno === 1062) {
				die("Email already taken.");
			} else {
				die($mysqli->error . " " . $mysqli->errno);
			}
	}

	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PriLang - Signup</title>
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
<h1 class="title bebas-neue-regular"> Signup </h1>
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
<form method="post">
	<div class="signup-container">
		<div class="signup-grid">
			<!-- Beginning of row -->
			<div></div>	
			<div>
				
			</div>
			<div></div>
			<!-- End of row -->
			<!-- Beginning of row -->
			<div></div>	
			<div>
				<form method="post" id ="signup">
						<?php if ($is_invalid): ?>
						<em style="color: red;"><b>Invalid Signup</b></em>
						<br>
						<br>
						<?php endif; ?>
						<div>
							<label for="name">&nbsp</label>
							<input type="text" id="name" name="name" placeholder="Name">
						</div>
						<div>
							<label for="email">&nbsp</label>
							<input type="email" id="email" name="email" placeholder="Email Address">
						</div>
						<div>
							<label for="confirmemail">&nbsp</label>
							<input type="email" id="confirmemail" name="confirmemail" placeholder="Confirm Email Address">
						</div>		
						<div>
							<label for="password">&nbsp</label>
							<input type="password" id="passsword" name="password" placeholder="Password">
						</div>
						<div>
							<label for="confirmpassword">&nbsp</label>
							<input type="password" id="confirm_password" name="confirmpassword" placeholder="Confirm Password">
						</div>
						<div>
							<label for="forgot password">&nbsp</label>
							<input type="text" id="forgotpassword" name="forgotpassword" placeholder="Forgot Password">
						</div>	
						<br>	
			</div>
			<div></div>
			<!-- End of row -->
			<!-- Beginning of row -->
			<div></div>	
			<div>
				
			</div>
			<div></div>
			<!-- End of row -->
			<!-- Beginning of row -->
			<div></div>	
			<div>
			</div>
			<div></div>
			<!-- End of row -->
			<!-- Beginning of row -->
			<div></div>	
			<div>
			</div>
			<div></div>
			<!-- End of row -->
		</div>
		<div class="languages-grid">
			<!-- Beginning of row -->
			<div></div>	
			<div>
			<hi class="title bebas-neue-regular">Language to be learnt</hi>
			</div>
			<div></div>
			<!-- End of row -->
			<!-- Beginning of row -->
			<div></div>	
			<div class="languages-child">
				<div></div>	
				<div>
					<input type="checkbox">
				</div>
				<div>
					<label>English</label>
				</div>	
				<div></div>	
				<div></div>
				<div>
					<input type="checkbox">
				</div>
				<div>
					<label>Polish</label>
				</div>	
				<div></div>
				<div></div>
				<div>
					<input type="checkbox">
				</div>
				<div>
					<label>Italian</label>
				</div>
				<div></div>	
			</div>
			<div></div>
			<div></div>
			<div class="languages-child">
				<div></div>
				<div>
					<input type="checkbox" name="admin" id="admin" value="1">
				</div>
				<div>
					<label>Teacher</label>
				</div>	
				<div></div>	
				<div></div>
				<div>
					<input type="checkbox" name="student" id="student" value="0">
				</div>
				<div>
					<label>Student</label>
				</div>
			</div>
			<div></div>
			<!-- End of row -->
		</div>
		<br>
		<div class="signup-button-grid">
			<div></div>
			<div>
				<button name="signup">signup</button>
			</div>
							
</form>
			<div></div>
			<div></div>
			<div>
				<button type="button" class="btn btn-lg return " onClick="javascript:Return('../php/login.php')">Back</button>
			</div>
			<div></div>
		</div>
	</div>
</body>