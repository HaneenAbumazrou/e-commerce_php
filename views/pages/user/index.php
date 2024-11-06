<?php
	$title = 'MobixStore';
	ob_start();
	
?>



	<section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			<div class="slider-item" style="background-image: url(https://9to5mac.com/wp-content/uploads/sites/6/2023/09/iphone-15-pro-wallpaper-2.webp?w=1600);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-md-12 ftco-animate text-center">
							<h1 class="mb-2">MobixStore</h1>
							<h2 class="subheading mb-4">Discover, Upgrade to the Latest, Anytime, Anywhere! 
								<br> MobixStore Make it Easy</h2>
							<p class="m-3">
								<a href="#home-product" class="call-to-action">Start Now</a>
							</p>
						</div>

					</div>
				</div>
			</div>

			<!-- <div class="slider-item" style="background-image: url(./public/user/assets/images/bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-sm-12 ftco-animate text-center">
							<h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
							<h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
							<p><a href="#" class="btn btn-primary">View Details</a></p>
						</div>

					</div>
				</div>
			</div> -->
		</div>
	</section> 

	<section class="ftco-section ftco-category">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Categories</span>
                <h2 class="mb-4">Discover our Categories</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($home_categories as $index => $category): ?>
                <?php if ($index % 3 === 0 && $index !== 0): ?>
                    </div><div class="row justify-content-center">
                <?php endif; ?>

                <div class="col-md-4 d-flex justify-content-center mb-4">
                    <div class="category-wrap ftco-animate img d-flex align-items-end"
                         style="background-image: url(<?= ltrim($category['image_path'], '.') . $category['image'] ?>);">
                        <div class="text px-3 py-1">
                            <h2><a href="/products/categories?category=<?= urlencode($category['name']) ?>"><?= htmlspecialchars($category['name']) ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>






	<section class="ftco-section" id="home-product">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Featured Products</span>
					<h2 class="mb-4">Our Products</h2>
				</div>
			</div>   		
		</div>
		<div class="container">
			<div class="row">
				<?php foreach($home_products as $product): ?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="/product?product_id=<?= $product['id'] ?>" class="img-prod"><img class="img-fluid" src="<?= $product["path"] ?>" alt="Colorlib Template">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#"><?= $product["name"] ?></a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="price-sale"><?= $product["price"] ?> JOD</span></p>
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