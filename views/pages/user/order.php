<?php
$title = 'Full Name | #'. str_pad("$order[order_id]", 4, 0, STR_PAD_LEFT);
ob_start();
?>


  <div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/profile.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-"><a href="/">Home</a></span> <span>Profile</span> <span>Orders</span></p>
					<h1 class="mb-0 bread">order #<?= str_pad("$order[order_id]", 4, 0, STR_PAD_LEFT) ?></h1>
				</div>
			</div>
		</div>
	</div>



  <div class="container my-5">
    <div class="section profile">
      <div class="card">
        <div class="card-body pt-3">

          <ul class="nav nav-tabs nav-tabs-bordered">
            <li class="nav-item">
              <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#order-details"><span class="pe-2">Order ID</span> #2354</button>
            </li>
          </ul>

          <div class="tab-content pt-2">

            <div class="tab-pane fade show active profile-overview" id="order-details">


              <div class="row justify-content-start flex-row-reverse">
                <div class="col col-sm-12 col-lg-4 mx mb-5">
                  <table class="mb-2">
                    <th class="pe-3">Status</th>
                    <td><span class="badge text-bg-success"><?= $order['order_status'] ?></span></td>
                  </table>


                  <table class="mb-2">
                    <th class="pe-3">Applied Coupon</th>
                    <td><?= $order['coupon_code'] ?? null ?></td>
                  </table>


                  <div style="width: fit-content;">
                    <div class="p-2 border-bottom border-2 border-dark" style="width: fit-content; background-color: #F2F2F2;">
                      <table class="mb-3">
                        <tbody>
                          <tr>
                            <th class="pe-5">Price</th>
                            <td><?= $order['order_item_price'] ?> JOD</td>
                          </tr>

                          <tr>
                            <th class="pe-5">Discount</th>
                            <td><?= $order['coupon_discount_percentage'] ?? 0 ?>%</td>
                          </tr>

                          <tr>
                            <th class="pe-5">New Price</th>
                            <td><?= $order['order_item_price'] * (1- ($order['coupon_discount_percentage']/ 100)) ?> JOD</td>
                          </tr>

                          <tr>
                            <th class="pe-5">Delivery</th>
                            <td>3 JOD</td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                  
                    <table class="mb-2 row pt-2">
                      <th class="pe-3 col-8">Total</th>
                      <td class="col-4"><?= $order['total_amount'] ?> JOD</td>
                    </table>
                  </div>
                </div>

                <div class="col col-sm-12 col-lg-8 my-5">
                  <h2 class="text-center mb-4">Order Status</h2>
                  <div class="progress-track my-5">
                    <ul id="progressbar">
                      <!-- <?php $count = 1; $active = "active"?>
                      <?php foreach($statuses as $key => $status): ?>
                        <li class="step0 <?= $active ?>" id="step<?= $count++ ?>"><?= $status ?></li>

                        <?php if($order['order_status'] == $key) $active = null; ?>
                          
                      <?php endforeach ?> -->
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 0 ? "active fw-bold" : "" ?>" id="step1">Pending</li>
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 1  ? "active fw-bold" : "" ?> text-center" id="step2">In Preparation</li>
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 2  ? "active fw-bold" : "" ?> text-right" id="step3"><span id="three">Out for Delivery</span></li>
                      <li class="step0  <?= array_search($order['order_status'], $statuses) >= 3  ? "active fw-bold" : "" ?> text-right" id="step4">Delivered</li>
                    </ul>
                  </div>
                </div>

              </div>


              <div class="table-responsive">
                <table class="table table-borderless table-striped datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Qtn</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php foreach($order_items as $item): ?>
                      <tr>
                        <td scope="col">1</td>
                        <td scope="col" style="width: 15%;">
                          <img class="img-fluid" width="55%"
                          src="<?= ltrim($item['first_image_path'], ".") ?>" alt="Product Image">
                        </td>
                        <td scope="col"><?= $item['name'] ?></td>
                        <td scope="col" class="text-truncate" style="max-width: 25rem;"><?= $item['description'] ?></td>
                        <td scope="col"><?= $item['stock_quantity'] ?></td>
                        <td scope="col"><?= $item['price'] ?> JOD</td>
                        <td scope="col"><a href="/product?product_id=<?= $item['id'] ?>" class="btn btn-primary">Show</a></td>
                      </tr>
                    <?php endforeach ?>

                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>





<?php
$content = ob_get_clean();
include './views/pages/user/layout.php';
?>