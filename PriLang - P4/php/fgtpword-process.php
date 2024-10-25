<?php

$isTrue = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$mysqli = require __DIR__ . "/database.php";

	$sql = sprintf("SELECT forgotpassword FROM user WHERE email = '%s'",$mysqli->real_escape_string($_POST["emailcheck"]));

	
	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();

	$answer = $user['forgotpassword'];
	
   // $success = ($user !== null);



    if ($user){
    	header("location: ../php/fgtpword.php?user=".$answer);
    }
}

?>