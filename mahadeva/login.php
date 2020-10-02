<?php
session_start();

if (!empty($_SESSION['username'])) {
	header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mahadeva · Login</title>
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
		crossorigin="anonymous">
	<link href="./assets/css/style.css" rel="stylesheet">
	<link href="./assets/css/login.css" rel="stylesheet">
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

	<form class="form-signin" action="src/loginHandler.php" method="POST">
		<img class="mb-3" src="assets/img/logo.png" alt="Mahadeva logo" width="80" height="80">
		<h1 class="h3 mb-3 font-weight-normal mahadeva-font">Mahadeva</h1>
		<label for="inputUsername" class="sr-only">Username</label>
		<input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
		<div class="checkbox mb-3">
			<label> <input type="checkbox" value="remember-me"> Remember me</label>
		</div>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2017-<?= date('Y') ?></p>
	</form>
	
</body>
</html>
