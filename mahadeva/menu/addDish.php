<?php
session_start();

if (empty($_SESSION['username'])) {
	header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mahadeva · Add Dish</title>
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Uncial+Antiqua&display=swap" rel="stylesheet">
    <style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	@media ( min-width : 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
	</style>
</head>
<body class="text-center">

    <?php require_once '../views/_header.php'; ?>

    <main role="main" class="container">
        <form class="form-signin" action="/mahadeva/src/dishesHandler.php" method="POST">
		<img class="mb-3" src="../assets/img/logo.png" alt="Mahadeva logo" width="80" height="80">
		<h1 class="h3 mb-3 font-weight-normal mahadeva-font">Add new Dish</h1>
		<label for="inputName" class="sr-only">Name</label>
		<input type="text" id="inputName" name="inputName" class="form-control" placeholder="Name" required autofocus>
        
        <label for="inputCategory">Category:</label>
        <select id="inputCategory" name="inputCategory">
                <option value="1">Appetizers</option>
                <option value="5">Desserts</option>
                <option value="2">Salads</option>
                <option value="3">Soups</option>
                <option value="4">Starters</option>
        </select>

        <div class="checkbox mb-3">
			<label> <input type="checkbox" name = "isGlutenFree" value="1"> Gluten Free</label>
        </div>
        <div class="checkbox mb-3">
			<label> <input type="checkbox" name = "isVegan" value="1"> Vegan</label>
        </div>
        
        <label for="inputDescription" class="sr-only">Description</label>
		<input type="text" id="inputDescription" name="inputDescription" class="form-control" placeholder="Description" required autofocus>
        

        <label for="inputPrice" class="sr-only">Price</label>
		<input type="text" id="inputPrice" name="inputPrice" class="form-control" placeholder="Price" required autofocus>
        
		<button class="btn btn-lg btn-primary btn-block" type="submit">Add Dish</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-<?= date('Y') ?></p>
</main>
	
	
</div>
	
	<?php require_once '../views/_footer.php'; ?>
	
</body>
</html>
