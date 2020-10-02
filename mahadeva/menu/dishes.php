<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mahadeva · Welcome</title>
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
</head>
<body>		
	<?php require_once '../views/_header.php'; ?>
	<main role="main" class="container">
	
		<img src="../assets/img/logo.png" class="mx-auto d-block" alt="Mahadeva logo">
		<h2 class="mahadeva-font text-center">Dishes<h2>
	</br>

		<?php

		

require '../src/config.php';
	
	$dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	$dishes = array();
	if ($dbConnection->connect_error) {
		header('Location: /mahadeva/login.php');
	}
	else {
		
		$result = mysqli_query($dbConnection,"SELECT * FROM dish");
		echo "<div class=\"row justify-content-center\>
		<div class=\"col-auto\"><table class=\" table-center table table-responsive\">";
		echo "<tr class=\"mahadeva-font text-center\">
				<td>Name</td>
				<td>Category</td>
				<td>Gluten Free</td>
				<td>Vegan</td>
				<td>Description</td>
				<td>Price</td>
			</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			switch($row['dish_category_id']){
				case 1:
					echo "<td>Appetizers</td>";
					break;
				case 2:
						echo "<td>Salads</td>";
				 	break;
				case 3:
							echo "<td>Soups</td>";
					break;
				case 4:
					echo "<td>Starters</td>";
					 break;
				case 5:
						echo "<td>Desserts</td>";
					break;
				default:
				echo "<td>None</td>";
			};
			if($row['gluten_free']==1){
				echo "<td>Yes</td>";
			} else{
				echo "<td>No</td>";
			};

			if($row['vegan']==1){
				echo "<td>Yes</td>";
			}else {
				echo "<td>No</td>";
			};

			
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			echo "</tr>";

		}
		echo "</table></div></div>";
	}
?>

	</main>	
	
</body>
</html>