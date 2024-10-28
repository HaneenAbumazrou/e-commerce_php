<?php
	$title = 'Coupons';
	$coupons = 'active';
	ob_start();
?>

  <div class="pagetitle">
    <h1>Coupons</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Coupons</li>
      </ol>
    </nav>
  </div>



  <section class="section">
    <div class="card">
      <div class="card-body">
        <div class="row card-title px-2">
          <div class="col col-sm-6 col-lg-10">
            <h5>All Coupons</h5>
          </div>
          <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
            <div>
              <a href="/admin/coupons/create" class="btn btn-primary">Add New Coupons</a>
            </div>
          </div>
        </div>

        <table class="table datatable">
          <thead>
            <tr>
              <th class="table-active">Coupon</th>
              <th>Validity</th>
              <th>Discount</th>
              <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
              <th data-type="date" data-format="YYYY/DD/MM">End Date</th>
              <th>Updated By</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_coupons as $coupon): ?>
              <tr>
                <td class="table-active fw-bold"><?= $coupon["code"] ?></td>
                <td>
                  <?php if (true): ?>
                    <span class="badge text-bg-<?= ($coupon["status"] == "active")? "success" : "danger" ?>">
                      <?= $coupon["status"] ?>
                    </span>
                  <?php endif ?>
                </td>
                <td><?= $coupon["discount_percentage"] ?>%</td>
                <td><?= $coupon["valid_from"] ?></td>
                <td><?= $coupon["valid_until"] ?></td>
                <td>belal-shakra</td>
                <td>
                  <a href="/admin/coupons/update?coupon_id=<?= $coupon['id'] ?>" class="btn btn-success">Update</a>
                  <a type="button" class="btn btn-danger"
                  data-bs-toggle="modal" data-bs-target="#deleteCoupon<?= $coupon["id"] ?>"
                  >Delete</a>
                  <?php require "./views/pages/admin/coupons/delete_model.php"; ?>
                </td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>

      </div>
    </div>
  </section>




<?php
	$content = ob_get_clean();
	require './views/pages/admin/layout.php';
?>