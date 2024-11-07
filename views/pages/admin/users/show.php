<?php
	$title = "User | " . $user['first_name'] .' '. $user['last_name'];
	$users = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>


  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="https://media.istockphoto.com/id/1300512215/photo/headshot-portrait-of-smiling-ethnic-businessman-in-office.jpg?s=612x612&w=0&k=20&c=QjebAlXBgee05B3rcLDAtOaMtmdLjtZ5Yg9IJoiy-VY="
            alt="Profile" class="rounded-circle">
            <h2><?= $user['first_name'] .' '. $user['last_name'] ?></h2>
            <h3><?= $user['username'] ?></h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card" style="min-height: 405px;">
          <div class="card-body pt-3">

            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

            </ul>

            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $user['first_name'] .' '. $user['last_name'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8"><?= $user['username'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $user['email'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?= $user['phone'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?= $user['address']['address'] ?? null ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">From</div>
                  <div class="col-lg-9 col-md-8"><?= date_format(date_create($user['created_at']), 'j-M-y') ?></div>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">User Orders</h5>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">no. of items</th>
              <th scope="col">applyed cuopon</th>
              <th scope="col">original price</th>
              <th scope="col">price after discount</th>
              <th scope="col">discount</th>
              <th scope="col">order date</th>
              <th scope="col">Details</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach($user_orders as $order): ?>
              <tr>
                <th scope="row"><a href="/admin/users/order">#<?= str_pad("$order[id]", 4, 0, STR_PAD_LEFT) ?></a></th>
                <td><?= $order['item_count'] ?></td>
                <td><?= $order['code'] ?? null ?></td>
                <td><?= ($order['original_price'] == (int)$order['original_price'])? (int)$order['original_price'] : $order['original_price'] ?> JOD</td>
                <td><?= $order['original_price'] * (1- ($order['discount_percentage']/ 100)) ?> JOD</td>
                <td><?= ($order['discount_percentage'] == (int)$order['discount_percentage'])? (int)$order['discount_percentage'] : $order['discount_percentage'] ?>%</td>
                <td><?= date_format(date_create($order['created_at']), 'j-M-y') ?></td>
                <td><a href="/admin/orders/show?id=<?= $order['id'] ?>" class="btn btn-primary">Show</a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>






<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>