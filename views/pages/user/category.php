<?php
	$title = 'Category';
	ob_start();
?>



<div class="hero-wrap hero-bread" style="background-image: url(<?= ltrim($category[0]['image_path'], ".").$category[0]['image'] ?>);">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Products</span></p>
				<h1 class="mb-0 bread"><?= $_GET["category"] ?? "All Categories" ?></h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section">
	<div class="container">
		<!-- <div class="row justify-content-center">
			<div class="col-md-10 mb-5 text-center">
				<ul class="product-category">
					<li><a href="#" class="active">All</a></li>
					<li><a href="#">Vegetables</a></li>
					<li><a href="#">Fruits</a></li>
					<li><a href="#">Juice</a></li>
					<li><a href="#">Dried</a></li>
				</ul>
			</div>
		</div> -->

		<div class="row">

			<?php foreach($products as $product): ?>

				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="/product?product_id=<?= $product["id"] ?>" class="img-prod"><img class="img-fluid" src="<?= ltrim($product["first_image"], ".") ?>" alt="Colorlib Template">
							<!-- <span class="status">30%</span>
							<div class="overlay"></div> -->
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="#"><?= $product["name"] ?></a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span class="price-sale">$<?= $product["price"] ?></span></p>
									<!-- <p class="price"><span class="mr-2 price-dc"><?= $product["price"] ?></span><span class="price-sale">$80.00</span></p> -->
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>


									<form action="/user/wishlist/create?product=<?= $product["id"] ?>" method="POST" id="wishlist">
										<!-- <button type="submit" class="btn p-0 border-0" style="background: none;">
											<i class="ion-ios-heart-empty heart-icon" style="font-size: 20px; cursor: pointer; color: red;"></i>
										</button> -->
										<a href="#" onclick="document.getElementById('wishlist').submit();"
										class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			<?php endforeach ?>

		</div>
		<!-- <div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li><a href="#">&lt;</a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">&gt;</a></li>
					</ul>
				</div>
			</div>
		</div> -->
	</div>
</section>










<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">
		<div class="row d-flex justify-content-center py-5">
			<div class="col-md-6">
				<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
				<span>Get e-mail updates about our latest shops and special offers</span>
			</div>
			<div class="col-md-6 d-flex align-items-center">
				<form action="#" class="subscribe-form">
					<div class="form-group d-flex">
						<input type="text" class="form-control" placeholder="Enter email address">
						<input type="submit" value="Subscribe" class="submit px-3">
					</div>
				</form>
			</div>
		</div>
	</div>
</section>




<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>	