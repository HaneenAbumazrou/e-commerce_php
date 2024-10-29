<?php
	$title = 'Add New Coupons';
	$coupons = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Add New Coupon</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Coupon</li>
        <li class="breadcrumb-item active">Add Coupon</li>
      </ol>
    </nav>
  </div>



  <div class="row">
    <div class="col-sm-12 col-lg-8">

      <?php if(isset($_SESSION["coupon_added_successfully"])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $_SESSION["coupon_added_successfully"] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Coupon</h5>

            <form action="/admin/coupons/create" method="POST">
              <div class="row my-2">
                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Coupon Code</label>
                  <input type="text" class="form-control" name="code" value="<?= $_POST["code"] ?? null ?>">
                  <span class="text-danger">
                    <?= $_SESSION["add_coupon_errors"]["code_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Discount Percentage</label>
                  <input type="text" class="form-control" placeholder="numeric value"
                  name="discount_percentage" value="<?= $_POST["discount_percentage"] ?? null ?>">
                  <span class="text-danger">
                    <?= $_SESSION["add_coupon_errors"]["discount_percentage_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-4">
                  <label class="form-label">Status</label>
                  <select class="form-select" name="status">
                    <option>Select</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  <span class="text-danger">
                    <?= $_SESSION["add_coupon_errors"]["status_error"] ?? null ?>
                  </span>
                </div>
              </div>

              <div class="row my-2">
                <div class="col-sm-12 col-lg-6">
                  <label class="form-label">Valid From</label>
                  <input type="datetime-local" class="form-control"
                  name="valid_from" value="<?= $_POST["valid_from"] ?? null ?>">
                  <span class="text-danger">
                    <?= $_SESSION["add_coupon_errors"]["valid_from_error"] ?? null ?>
                  </span>
                </div>

                <div class="col-sm-12 col-lg-6">
                  <label class="form-label">Valid Until</label>
                  <input type="datetime-local" class="form-control"
                  name="valid_until" value="<?= $_POST["valid_until"] ?? null ?>">
                  <span class="text-danger">
                    <?= $_SESSION["add_coupon_errors"]["valid_until_error"] ?? null ?>
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