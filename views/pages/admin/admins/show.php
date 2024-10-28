<?php
	$title = "Admin | admin-name";
	$admins = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Admin Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Admins</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>



  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="/public/admin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <h2>Kevin Anderson</h2>
            <h3>Admin</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">

            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li>

            </ul>

            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $full_name ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8"><?= $role ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $email ?></div>
                </div>


                <div class="row">
              <div class="col-lg-3 col-md-4 label">Status</div>
              <div class="col-lg-9 col-md-8">
                <?php if ($status === 'active'): ?>
                  <span class="badge text-bg-success">Active</span>
                <?php else: ?>
                  <span class="badge text-bg-danger">Not Active</span>
                <?php endif; ?>
              </div>
            </div>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label">From</div>
                  <div class="col-lg-9 col-md-8">10-10-2024</div>
                </div>

              </div>

              <?php if ($status === 'active'): ?> <!-- Check if status is active -->

              <div class="tab-pane fade pt-3" id="profile-settings">
                <form action="/admin/admins/delete?id=<?=$admin_id ?>" id="delete-form" method="POST"  onsubmit="return confirmDelete()">
                  <button type="submit" class="btn btn-danger">Deactivate</button>

                </form>
              </div>

              <?php else: ?> <!-- Check if status is not active -->

                <div class="tab-pane fade pt-3" id="profile-settings">
                <form action="/admin/admins/delete?id=<?=$admin_id ?>" id="active-form" method="POST" onsubmit="return confirmActive()">
                  <button type="submit" class="btn btn-success">Activate</button>

                </form>
              </div>


                <?php endif; ?>



            </div>

          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- <div class="card">
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
            <tr>
              <th scope="row"><a href="./order.php">#0001</a></th>
              <td>05</td>
              <td>NEWCUOPON</td>
              <td>$100</td>
              <td>$90</td>
              <td>10%</td>
              <td>6-10-2024</td>
              <td><a href="./order.php" class="btn btn-primary">Show</a></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div> -->






<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>