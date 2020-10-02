<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand mahadeva-font" href="/mahadeva/index.php">
		<img src="/mahadeva/assets/img/logo.png" width="30" height="30" alt=""> Mahadeva</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
		aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Menu </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/mahadeva/menu/dishes.php">Dishes</a>
					<a class="dropdown-item" href="/mahadeva/menu/drinks.php">Drinks</a>
				</div></li>
			<li class="nav-item">
				<a class="nav-link" href="#">Reservation</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Contact</a>
			</li>
			<?php if (!empty($_SESSION['username'])): ?>
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
				href="/mahadeva" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false"> Edit </a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/mahadeva/menu/addDish.php">Add Dish</a>
					<a class="dropdown-item" href="/mahadeva/menu/addDrink.php">Add Drinks</a>
				</div></li>
			
			<?php endif; ?>
		</ul>
		<ul class="navbar-nav">
		<?php if (empty($_SESSION['username'])): ?>
			<li class="nav-item">
				<a class="nav-link" href="/mahadeva/login.php">Login</a>
			</li>
		<?php else: ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle"
				href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="false">
				<span style="height: 100%; vertical-align: middle;">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  		<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
				  		<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
				  		<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
					</svg>
				</span>
				 <?= $_SESSION['username'] ?> </a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="/mahadeva/logout.php">Logout</a>
				</div>
			</li>
		<?php endif; ?>
		</ul>
	</div>
</nav>
</header>