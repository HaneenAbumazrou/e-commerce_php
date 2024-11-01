<?php
	$title = 'Coupons';
	$messages = 'active';
	ob_start();
?>

  <div class="pagetitle">
    <h1>Contact Messages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Messages</li>
      </ol>
    </nav>
  </div>




  <section class="section">
    <div class="card">
      <div class="card-header">

        <div class="row">
          <div class="col-1">
            <img src="https://img.freepik.com/premium-vector/stylish-default-user-profile-photo-avatar-vector-illustration_664995-352.jpg" alt="" class="img-fluid" width="75%">
          </div>

          <div class="col-11">
            <p class="m-0"><?= $message["name"] ?></p>
            <p class="m-0"><?= $message["email"] ?></p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h5 class="card-title"><?= $message["subject"] ?></h5>

        <?= $message["message"] ?>
      </div>
      <div class="card-footer">
        <a href="mailto:<?= $message["email"] ?>" class="btn btn-success">Reply</a>
      </div>
    </div>
  </section>




<?php
	$content = ob_get_clean();
	require './views/pages/admin/layout.php';
?>