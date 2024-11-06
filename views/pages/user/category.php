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
								<div class="m-auto d-flex align-items-baseline">
									<form action="/user/wishlist/create?product=<?= $product["id"] ?>" method="POST" id="wish"
										style="margin-top: 30px;">
										<a onclick="document.getElementById('wish').submit();" type="button"
										class="buy-now d-flex justify-content-center align-items-center mx-1">
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
	</div>
</section>






<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>	