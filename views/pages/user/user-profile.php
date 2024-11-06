<?php
	$title = 'User Profile';
	ob_start();
?>


  <div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/profile.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Profile</span></p>
					<h1 class="mb-0 bread">My Profile</h1>
				</div>
			</div>
		</div>
	</div>




  <div class="container my-5">
    <?php if(isset($_SESSION['updateProfileSuccessfully'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $_SESSION['updateProfileSuccessfully'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom-color: #000;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">Change Password</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link <?= $activation ?? null ?>" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false">My Orders</button>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active row" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">

        <form class="mx-3 my-5 col-sm-12 col-lg-9" action="/user/profile/edit" method="POST">

          <div class="row my-2">
            <div class="col col-sm-12 col-lg-6">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" value="<?= $_SESSION['user']['first_name'] ?>">
              <span class="text-danger"><?= $_SESSION["update_user_errors"]["first_name_error"] ?? null ?></span>
            </div>

            <div class="col col-sm-12 col-lg-6">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" value="<?= $_SESSION['user']['last_name'] ?>">
              <span class="text-danger"><?= $_SESSION["update_user_errors"]["first_name_error"] ?? null ?></span>
            </div>
          </div>
          
          <div class="my-2">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?= $_SESSION['user']['username'] ?>">
            <span class="text-danger"><?= $_SESSION["update_user_errors"]["username_error"] ?? null ?></span>
          </div>
          
          <div class="my-2">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?= $_SESSION['user']['email'] ?>">
            <span class="text-danger"><?= $_SESSION["update_user_errors"]["email_error"] ?? null ?></span>
          </div>
          
          <div class="my-2">
            <label>Phone</label>
            <input type="text" class="form-control" name="phone" value="<?= $_SESSION['user']['phone'] ?? null ?>">
            <span class="text-danger"><?= $_SESSION["update_user_errors"]["phone_error"] ?? null ?></span>
          </div>





          <div class="text-center py-5 d-grid gap-2">
            <input type="submit" value="Update Profile" class="btn btn-primary">
          </div>
        </form>

      </div>


      <div class="tab-pane fade row <?= $activation ?? null ?>" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
        <form class="mx-3 my-5 col-sm-12 col-lg-9" action="/user/profile/edit/password" method="POST">
          <div class="my-2">
            <label class="m-0">Current Password</label>
            <input type="password" class="form-control" name="current_password">
            <span class="text-danger"><?= $_SESSION["update_password_errors"]["current_password_error"] ?? null ?></span>
          </div>

          <div class="my-2">
            <label class="m-0">New Password</label>
            <input type="password" class="form-control" name="password">
            <span class="text-danger"><?= $_SESSION["update_password_errors"]["password_error"] ?? null ?></span>
          </div>

          <div class="my-2">
            <label class="m-0">Retype New Password</label>
            <input type="password" class="form-control" name="password_confirmation">
          </div>

          <div class="text-center py-5 d-grid gap-2">
            <input type="submit" value="Update Profile" class="btn btn-primary">
          </div>
        </form>
      </div>
      
      
      <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">

        <div class="mx-3 my-5">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead class="table-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">no. of items</th>
                  <th scope="col">original price</th>
                  <th scope="col">price after discount</th>
                  <th scope="col">discount</th>
                  <th scope="col">order date</th>
                  <th scope="col">Details</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach($orders as $order): ?>
                  <?php //var_dump($order); ?>
                  <tr>
                    <td scope="row" class="fw-bold">
                      <a href="/user/profile/order?order_id=<?= $order['id'] ?>" style="color: #4287F5;">#<?= str_pad("$order[id]", 4, 0, STR_PAD_LEFT) ?></a>
                    </td>
                    <td><?= $order['item_count'] ?></td>
                    <td><?= $order['original_price'] ?> JOD</td>
                    <td><?= $order['total_amount'] ?></td>
                    <td><?= $order['discount_percentage'] ?? 0 ?>%</td>
                    <td><?= date_format(date_create($order['created_at']), 'j-M-y') ?></td>
                    <td><a href="/user/profile/order?order_id=<?= $order['id'] ?>" class="btn btn-primary">Show</a></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php
  $content = ob_get_clean();
  unset($_SESSION['updateProfileSuccessfully']);
  unset($_SESSION['update_user_errors']);
  unset($_SESSION['update_password_errors']);
  include './views/pages/user/layout.php';
?>