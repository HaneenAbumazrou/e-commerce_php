<?php
	$title = 'Checkout';
	ob_start();
?>


	<div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/checkout.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Checkout</span></p>
					<h1 class="mb-0 bread">Checkout</h1>
				</div>
			</div>
		</div>
	</div>


	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<form action="/user/order/checkout" method="POST" class="billing-form row justify-content-center">
					<div class="col-xl-7 ftco-animate">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
							<div class="row align-items-end">
								<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">Firt Name</label>
										<input type="text" class="form-control" name="first_name" value="<?= $_SESSION['user']["first_name"] ?? $_POST['first_name'] ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["first_name_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lastname">Last Name</label>
										<input type="text" class="form-control" name="last_name" value="<?= $_SESSION['user']["last_name"] ?? $_POST['last_name'] ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["last_name_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="country">City</label>
										<div class="select-wrap">
											<div class="icon"><span class="ion-ios-arrow-down"></span></div>
											<select class="form-control" name="city">
												<option selected >Select</option>
												<?php foreach($cities as $city): ?>
													<option value="<?= strtolower($city) ?>"><?= $city ?></option>
												<?php endforeach ?>
											</select>
											<span class="text-danger">
												<?= $_SESSION["checkout_errors"]["city_error"] ?? null ?>
											</span>
										</div>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="streetaddress">Street Address</label>
										<input type="text" class="form-control" name="address" value="<?= $_POST['address'] ?? null ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["address_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="streetaddress">Appartment</label>
										<input type="text" class="form-control" name="appartment" value="<?= $_POST['appartment'] ?? null ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["appartment_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="phone">Phone</label>
										<input type="text" class="form-control" name="phone" value="<?= @$_SESSION['user']["phone"] ?? @$_POST['phone'] ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["phone_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="emailaddress">Email Address</label>
										<input type="text" class="form-control" name="email" value="<?= $_SESSION['user']["email"] ?? $_POST['email'] ?>">
										<span class="text-danger">
											<?= $_SESSION["checkout_errors"]["email_error"] ?? null ?>
										</span>
									</div>
								</div>
								<div class="w-100"></div>

								<div class="col-md-6">
									<input type="submit" value="Submit" class="btn btn-primary">
								</div>
							</div>
						<!-- END -->
					</div>


					<div class="col-xl-5">
						<div class="row mt-5 pt-3">
							<div class="col-md-12 d-flex mb-5">
								<div class="cart-detail cart-total p-3 p-md-4">
									<h3 class="billing-heading mb-4">Cart Total</h3>
									<p class="d-flex">
										<span>Subtotal</span>
										<span>JOD <?= $_SESSION["price_before_coupon"] ?? null ?></span>
									</p>

									
									<p class="d-flex mb-0">
										<span>Discount</span>
										<span><?= @$_SESSION["coupon"][0]['discount_percentage'] ?? 0 ?>%</span>
									</p>
									<p class="d-flex mt-0">
										<span></span>
										<?php $price = (isset($_SESSION["total_amount"]) )? $_SESSION["total_amount"] : $_SESSION["price_before_coupon"] ?>
										<span>JOD <?= $_SESSION["price_before_coupon"] - $price ?></span>
									</p>

									<p class="d-flex">
										<span>After discount</span>
										<span>JOD <?php
											if(isset($_SESSION["total_amount"]))
												echo $_SESSION["total_amount"];
											else 
												echo $_SESSION["price_before_coupon"]
											?>
										</span>
									</p>


									<p class="d-flex">
										<span>Delivery</span>
										<span>JOD 3.00</span>
									</p>


									<hr>
									<p class="d-flex total-price">
										<span>Total</span>
										<span>JOD <?php
											if(isset($_SESSION["total_amount"]))
												echo $_SESSION["total_amount"]+3;
											else 
												echo $_SESSION["price_before_coupon"]+3
											?></span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</form> <!-- .col-md-8 -->
			</div>

		</div>
	</section> <!-- section -->





<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>
