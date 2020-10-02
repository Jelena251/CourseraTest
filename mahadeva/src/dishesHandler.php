<?php

session_start();

require './config.php';
require './models/User.php';

use models\User;

if (isset($_POST['inputName'])) {
	
	$inputName = filter_var($_POST['inputName'], FILTER_SANITIZE_STRING);
	$inputCategory = filter_var($_POST['inputCategory'], FILTER_SANITIZE_NUMBER_INT);
	$isGlutenFree = filter_var($_POST['isGlutenFree'], FILTER_SANITIZE_NUMBER_INT);
	$isVegan = filter_var($_POST['isVegan'], FILTER_SANITIZE_NUMBER_INT);
	$inputDescription = filter_var($_POST['inputDescription'], FILTER_SANITIZE_STRING);
	$inputPrice = filter_var($_POST['inputPrice'], FILTER_SANITIZE_NUMBER_INT);
	
	$dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	if ($dbConnection->connect_error) {
		header('Location: login.php');
	}
	else {
		$statment = $dbConnection->prepare("INSERT INTO dish(name, dish_category_id, gluten_free, vegan, description, price)
		 VALUES (?,?,?,?,?,?)");
		$statment->bind_param('siiisi', $inputName, $inputCategory, $isGlutenFree, $isVegan, $inputDescription, $inputPrice);
		$statment->execute();
		header('Location: /mahadeva/menu/dishes.php');
	}
	
}
else {
	header('Location: /mahadeva');
}

?>
