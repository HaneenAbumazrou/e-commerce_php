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
              <div class="row">
                <div class="col col-lg-12 label">Order ID</div>
                <div class="col col-lg-12"><?= $order_id?></div>
              </div>

              <div class="row">
                <div class="col col-lg-12 label">Applied Coupon</div>
                <div class="col col-lg-12"><?= $coupon_code ?>  </div>
              </div>

              <div class="row">
                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">Price</div>
                  <div class="col col-lg-6"><?= $original_price ?></div>
                </div>

                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">New Price</div>
                  <div class="col col-lg-6"><?= $new_price ?></div>
                </div>

                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">Total Amount</div>
                  <div class="col col-lg-6"><?= $new_price ?></div>
                </div>
              </div>

              
              <div class="row">
                <div class="col col-lg-2 label">Address</div>
                <div class="col col-lg-3"><?= $userAddress?></div>

              </div>
              <div class="row">
                <div class="col col-lg-1 label">Status</div>

                <form action="/admin/orders/show?id=<?= $_GET["id"] ?>" method="post" class="row col col-lg-6">
                  <div class="col col-lg-4">
                    <select class="form-select" name="status">
                      <option value="pinding" <?= ($status == "pending")? "selected" : null ?>>Pending</option>
                      <option value="completed" <?= ($status == "completed")? "selected" : null ?>>Completed</option>
                      <option value="rejected" <?= ($status == "rejected")? "selected" : null ?>>Rejected</option>
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
                <?php if (!empty($productDetails)): ?>
                  <?php foreach ($productDetails as $index => $product): ?>
                    <tr>
                        <th scope="row"><a href="/admin/products/show"><?= $index + 1 ?></a></th>
                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                        <td class="text-truncate pe-3" style="max-width: 260px;">
                            <p><?= htmlspecialchars($product['description']) ?></p>
                        </td>
                        <td><?= htmlspecialchars($product['qtn']) ?></td>
                        <td>$<?= htmlspecialchars($product['price']) ?></td>
                        <td>
                            <a href="/admin/products/show?id=<?= $product['product_id'] ?>" class="btn btn-primary">Show</a>
                        </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                      <td colspan="6">No products found for this order.</td>
                  </tr>
                <?php endif; ?>
                 
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
  require "./views/pages/admin/layout.php";
?>