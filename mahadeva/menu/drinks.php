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
		<h2 class="mahadeva-font text-center">Drinks<h2>
	<?php	
require '../src/config.php';
	
	$dbConnection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	$dishes = array();
	if ($dbConnection->connect_error) {
		header('Location: /mahadeva/login.php');
	}
	else {
		
		$result = mysqli_query($dbConnection,"SELECT * FROM drink");
		echo "<div class=\"row justify-content-center\>
		<div class=\"col-auto\"><table class=\" table-center mahadeva-font  table table-responsive\">";
		echo "<tr >
				<td>Name</td>
				<td>Size</td>
				<td>Category</td>
				<td>Description</td>
				<td>Price</td>
			</tr>";
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['name'] . "</td>";
			switch($row['drink_size_id']){
				case 1:
					echo "<td>0.3</td>";
					break;
				case 2:
						echo "<td>0.5</td>";
				 	break;
				case 3:
							echo "<td>0.2</td>";
					break;
				
				default:
				echo "<td>None</td>";
			};

			switch($row['drink_category_id']){
				case 1:
					echo "<td>Soft drinks</td>";
					break;
				case 2:
						echo "<td>Beers</td>";
				 	break;
				case 3:
							echo "<td>Coffee</td>";
					break;
				
				default:
				echo "<td>None</td>";
			};
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['price'] . "</td>";
			echo "</tr>";
		}
		echo "</table></div></div>";
	}
?>
	
	</main>	
	
	<?php require_once '../views/_footer.php'; ?>
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</body>
</html>