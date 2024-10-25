<?php

if (empty($_POST["name"])){
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







      //  header("Location:../html/signup-success.html");