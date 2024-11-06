<?php
	$title = 'All Users';
	$users = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>All Users</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div>


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">All Users</h5>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Full Name</th>
              <th scope="col">Username</th>
              <th scope="col">Phone</th>
              <th scope="col">Email</th>
              <th scope="col">Register at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $count = 0; ?>
            <?php foreach($all_users as $user): ?>
              <tr>
              <th scope="row"><?= ++$count ?></th>
                <td><?= $user['first_name'] . " " .$user['last_name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= date_format(date_create($user['created_at']), 'j-M-y') ?></td>
                <td><a href="/admin/users/show?user_id=<?= $user['id'] ?>" class="btn btn-primary">Show</a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- End Table with stripped rows -->

    </div>
  </div>





<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>