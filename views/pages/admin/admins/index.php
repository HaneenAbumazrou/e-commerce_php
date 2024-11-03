<?php
	$title = 'All Admins';
	$admins = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>All Admins</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Admins</li>
      </ol>
    </nav>
  </div>





  <div class="card">
    <div class="card-body">
        <div class="row card-title px-2">
          <div class="col col-sm-6 col-lg-10">
            <h5>All Admins</h5>
          </div>

          <?php if($_SESSION['admin']['role'] == "super admin"): ?>
            <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
              <div>
                <a href="/admin/admins/create" class="btn btn-primary">Add New Admin</a>
              </div>
            </div>
          <?php endif ?>
        </div>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Register at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($all_admins as $index => $admin): ?>

            <tr>
            <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $admin['first_name'] . ' ' . $admin['last_name'] ?></td>
                    <td><?= $admin['username'] ?></td>
                    <td><?= $admin['email'] ?></td>
                    <td><?= $admin['role'] ?></td>
                    <td><?= date("d-m-Y", strtotime($admin['created_at'])) ?></td>
                    <td><a href="./admins/show?id=<?= $admin['id'] ?>" class="btn btn-primary">Show</a></td>
                    </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>








<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>