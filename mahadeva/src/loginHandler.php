<?php

session_start();

require './config.php';
require './models/User.php';

use models\User;

if (isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
	
	$inputUsername = filter_var($_POST['inputUsername'], FILTER_SANITIZE_STRING);
	$inputPassword = filter_var($_POST['inputPassword'], FILTER_SANITIZE_STRING);
	
	$dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	if ($dbConnection->connect_error) {
		header('Location: login.php');
	}
	else {
		$statment = $dbConnection->prepare("SELECT * FROM user WHERE username = ?");
		$statment->bind_param('s', $inputUsername);
		$statment->execute();
		$userResult = $statment->get_result();
		$fetchedUser = $userResult->fetch_assoc();
		
		if (password_verify($inputPassword, $fetchedUser['password'])) {
			$_SESSION['username'] = $fetchedUser['username'];
			header('Location: /mahadeva/index.php');
			//$currentUser = new User();
		}
		else {
			header('Location: /mahadeva/login.php');
		}
	}
	
}
else {
	header('Location: /mahadeva');
}

?>
