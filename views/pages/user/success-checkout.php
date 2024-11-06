<?php
	$title = 'Success';
	ob_start();
?>


	<div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/in-progress.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Success</span></p>
					<h1 class="mb-0 bread">Your Order in Progress</h1>
				</div>
			</div>
		</div>
	</div>






<?php
  $content = ob_get_clean();
	unset($_SESSION["original_price"]);
	unset($_SESSION["total_amount"]);
	unset($_SESSION["coupon"]);
	unset($_SESSION["total_amount"]);
	unset($_SESSION["apply_coupon_errors"]);
  include './views/pages/user/layout.php';
?>