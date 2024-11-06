<?php
	$title = "Show Orders";
	$orders = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show User's Order</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Orders</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>


  <div class="section profile">
    <div class="card">
      <div class="card-body pt-3">

        <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#order-details">Order Details</button>
          </li>
        </ul>

        <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview" id="order-details">


            <div class="mx-2 mb-5">

            <div class="row justify-content-start flex-row-reverse">
                <div class="col-sm-12 col-lg-4 mx mb-5">
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

                <div class="col-sm-12 col-lg-8 my-5">
                  <h2 class="text-center mb-4">Order Status</h2>
                  <div class="progress-track my-5">
                    <ul id="progressbar">
                      <!-- <?php $count = 1; $active = "active"?>
                      <?php foreach($statuses as $key => $status): ?>
                        <?php if($order['order_status'] == $key) $active = null; ?>
                          
                      <?php endforeach ?> -->
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 0 ? "active fw-bold" : "" ?>" id="step1">Pending</li>
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 1  ? "active fw-bold" : "" ?> text-center" id="step2">In Preparation</li>
                      <li class="step0 <?= array_search($order['order_status'], $statuses) >= 2  ? "active fw-bold" : "" ?> text-right" id="step3"><span id="thre">Out for Delivery</span></li>
                      <li class="step0  <?= array_search($order['order_status'], $statuses) >= 3  ? "active fw-bold" : "" ?> text-right" id="step4">Delivered</li>
                    </ul>
                  </div>
                </div>

              </div>

              
              <div class="row">
                <div class="col col-lg-1 label">Status</div>

                <form action="/admin/orders/show?id=<?= $_GET["id"] ?>" method="post" class="row col col-lg-6">
                  <div class="col col-lg-4">
                    <select class="form-select" name="status">
                      <option value="pending" <?= ($order['order_status'] == "pending")? "selected" : null ?>>Pending</option>
                      <option value="in-preparation" <?= ($order['order_status'] == "in-preparation")? "selected" : null ?>>In Preparation</option>
                      <option value="in-delivery" <?= ($order['order_status'] == "in-delivery")? "selected" : null ?>>In Delivery</option>
                      <option value="completed" <?= ($order['order_status'] == "completed")? "selected" : null ?>>Completed</option>
                    </select>
                  </div>

                  <div class="col col-lg-2">
                    <input type="submit" value="Update" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>


            <div class="table-responsive">
              <table class="table table-borderless table-striped datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
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



<?php
  $content = ob_get_clean();
  // echo $content;
  // exit;
  require "./views/pages/admin/layout.php";
?>