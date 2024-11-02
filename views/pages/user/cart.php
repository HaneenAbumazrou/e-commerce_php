<?php
	$title = 'User Cart';
	ob_start();
	// include 'controller/user/addcart.php';
?>


	<div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/cart.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
					<h1 class="mb-0 bread">My Cart</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-cart">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mt-5">
        <table  class="table">
            <thead class="table-dark">
                <tr>
                    <th>&nbsp;</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_products as $index => $item): ?>
                    <tr>
                        <td><img src="<?= ltrim($item['product'][0]['first_image'], ".") ?>" width="100"></td>
                        <td>
                            <a href="/product?product_id=<?= $item['product'][0]['id'] ?>">
                                <?= $item['product'][0]['name'] ?>
                            </a>
                        </td>
                        <td>$<?= $item['product'][0]['price'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>$<?= $item['product'][0]['price'] * $item['quantity'] ?></td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm" 
                                    onclick="confirmRemove(<?= $index ?>)">
                                <i class="fas fa-trash-alt me-1"></i> Remove
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script >
	 // SweetAlert confirmation before removing a product
        function confirmRemove(index) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to remove this item from your cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/user/cart/delete?cart_product=${index}`;
                }
            })
        }
    </script>


<!-- Inside cart page -->
<div class="row justify-content-end">
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
            <h3>Coupon Code</h3>
            <p>Enter your coupon code if you have one</p>
            <form action="/admin/coupons/apply" method="POST" class="info">
                <div class="form-group">
                    <label for="coupon_code">Coupon code</label>
                    <input type="text" name="coupon_code" class="form-control text-left px-3" placeholder="Enter code here">
                    <span class="text-danger">
                        <?= $_SESSION["apply_coupon_errors"]["coupon_code_error"] ?? null ?>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary py-3 px-4 ">Apply Coupon</button>
            </form>
        </div>
    </div>
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