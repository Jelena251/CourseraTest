<?php

session_start();

require './config.php';
require './models/User.php';

use models\User;

if (isset($_POST['inputName'])) {
	
    $inputName = filter_var($_POST['inputName'], FILTER_SANITIZE_STRING);
    $inputSize = filter_var($_POST['inputSize'], FILTER_SANITIZE_NUMBER_INT);
	$inputCategory = filter_var($_POST['inputCategory'], FILTER_SANITIZE_NUMBER_INT);
	$inputDescription = filter_var($_POST['inputDescription'], FILTER_SANITIZE_STRING);
	$inputPrice = filter_var($_POST['inputPrice'], FILTER_SANITIZE_NUMBER_INT);
	
	$dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	if ($dbConnection->connect_error) {
		header('Location: login.php');
	}
	else {
		$statment = $dbConnection->prepare("INSERT INTO drink(name, drink_size_id, drink_category_id, description, price)
		 VALUES (?,?,?,?,?)");
		$statment->bind_param('siisi', $inputName, $inputSize, $inputCategory, $inputDescription, $inputPrice);
		$statment->execute();
		header('Location: /mahadeva/menu/drinks.php');
	}
	
}
else {
	header('Location: /mahadeva');
}

?>
