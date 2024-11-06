
<nav class="navbar navbar-expand-md navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="/">MobixStore</a>
		<form method="GET" action="/search/result">
			<input style='border:0;box-shadow: 1px 1px 6px #d9d9d9;border-radius:5px;padding:4px;padding-left:8px;width:300px' type="text" class="" placeholder="Search" name="search">
		</form>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a href="/" class="nav-link">Home</a></li>


				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="/products/categories" id="categories" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
					<div class="dropdown-menu" aria-labelledby="categories">
						<!-- <a class="dropdown-item" href="/products/categories">All Categories</a> -->
						<?php foreach($full_categories as $category): ?>
							<a class="dropdown-item" href="/products/categories?category=<?= $category["name"] ?>"><?= $category["name"] ?></a>
						<?php endforeach ?>
					</div>
				</li>


				<li class="nav-item"><a href="/about-us" class="nav-link">About</a></li>
				<li class="nav-item"><a href="/contact-us" class="nav-link">Contact</a></li>
				<li class="nav-item cta cta-colored">
					<a href="/user/cart" class="nav-link"><span class="icon-shopping_cart"></span>[<?= $cartItemsNum ?>]</a>
				</li>
				

				<?php if(isset($_SESSION['user'])): ?>
					<div class="d-flex align-items-center pb-2 px-2 ms-2" style="background-color: #D4AF7A; color: #fff;">
					<li class="nav-item dropdown">
						<a class="dropdown-toggle text-white" href="#" id="dropdown_profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION['user']["username"] ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdown_profile">
							
							<a href="/user/profile" class="dropdown-item">My Profile</a>
							<a href="/user/wishlist" class="dropdown-item">Wishlist</a>

							<form action="/logout" method="post">
								<input type="submit" value="Logout" class="dropdown-item">
							</form>


						</div>
					</li>
					</div>
				<?php else: ?>
					<div class="d-flex align-items-center pb-2">
						<li class="nav-item"><a href="/login" class="login"><i class="bi bi-box-arrow-in-right"></i></a></li>
					</div>
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>
