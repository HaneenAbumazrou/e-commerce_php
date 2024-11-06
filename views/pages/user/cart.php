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

    <?php if (count($cart_products)): ?>
      <section class="container mt-5">
        <div class="row">
          <!-- Cart Table Column -->
          <div class="col-sm-12 col-lg-9">
            <div class="table-responsive">
              <table class="table">
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
                    <td><img src="<?= ltrim($item['product'][0]['first_image'], ".") ?>" width="100px"></td>
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
            
            <div class="mt-3">
              <a href="/user/order/checkout" class="btn btn-primary py-3 px-4">Checkout</a>
            </div>
          </div>

          <!-- Coupon Form Column -->
          <div class="col-sm-12 col-lg-3   mt-3 mt-lg-0">
            <div class="p-4 border rounded bg-light">
              <h3>Coupon Code</h3>
              <p>Enter your coupon code if you have one</p>
              <form action="/admin/coupons/apply" method="POST">
                <div class="form-group mb-3">
                  <label for="coupon_code">Coupon code</label>
                  <input type="text" name="coupon_code" class="form-control" placeholder="Enter code here">
                  <span class="text-danger">
                    <?= $_SESSION["apply_coupon_errors"]["coupon_code_error"] ?? null ?>
                  </span>
                </div>
                <input type="submit" value="Apply Coupon" class="btn btn-primary w-100 py-3">
              </form>
            </div>
          </div>
        </div>
      </section>

      <script>
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
    <?php else: ?>
      <div class="d-flex justify-content-center my-4">
        <h4>Your cart is empty.</h4>
      </div>
    <?php endif ?>

  </section>


<?php
  $content = ob_get_clean();
  unset($_SESSION["apply_coupon_errors"]);
  include './views/pages/user/layout.php';
?>