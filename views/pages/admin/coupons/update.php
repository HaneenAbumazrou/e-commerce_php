<?php
	$title = 'Update Coupons';
	$coupons = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Update Coupon | <?= $coupon["code"] ?></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Coupon</li>
        <li class="breadcrumb-item active">Update Coupon</li>
      </ol>
    </nav>
  </div>



  <div class="row">
    <div class="col-sm-12 col-lg-8">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Coupon</h5>

            <form action="/admin/coupons/update?coupon_id=<?= $coupon["id"] ?>" method="POST">
              <div class="row my-2">
                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Coupon Code</label>
                  <input type="text" class="form-control" name="code" value="<?= $_POST["code"] ?? $coupon["code"] ?>">
                  <span class="text-danger">
                    <?= $_SESSION['update_coupon_errors']["code_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Discount Percentage</label>
                  <input type="text" class="form-control" placeholder="numeric value"
                  name="discount_percentage" value="<?= $_POST["discount_percentage"] ?? $coupon["discount_percentage"] ?>">
                  <span class="text-danger">
                    <?= $_SESSION['update_coupon_errors']["discount_percentage_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status">
                    <option selected>Select</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  <span class="text-danger">
                    <?= $_SESSION['update_coupon_errors']["status_error"] ?? null ?>
                  </span>
                </div>
              </div>

              <div class="row my-2">
                <div class="col-sm-12 col-lg-6">
                  <label class="form-label">Valid From</label>
                  <input type="datetime-local" class="form-control"
                  name="valid_from" value="<?= $_POST["valid_from"] ?? $coupon["valid_from"] ?>">
                  <span class="text-danger">
                    <?= $_SESSION['update_coupon_errors']["valid_from_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-6">
                  <label class="form-label">Valid Until</label>
                  <input type="datetime-local" class="form-control"
                  name="valid_until" value="<?= $_POST["valid_until"] ?? $coupon["valid_until"] ?>">
                  <span class="text-danger">
                    <?= $_SESSION['update_coupon_errors']["valid_until_error"] ?? null ?>
                  </span>
                </div>
              </div>




              <div class="my-5 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>

        </div>
      </div>
    </div>
  </div>



<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>