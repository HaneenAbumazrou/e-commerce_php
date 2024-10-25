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
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td>brandoo</td>
              <td>+932 452379444</td>
              <td>brand@beranm.com</td>
              <td>20-10-2017</td>
              <td><a href="/admin/users/show" class="btn btn-primary">Show</a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Brandon Jacob</td>
              <td>brandoo</td>
              <td>+932 452379444</td>
              <td>brand@beranm.com</td>
              <td>20-10-2017</td>
              <td><a href="/admin/users/show" class="btn btn-primary">Show</a></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Brandon Jacob</td>
              <td>brandoo</td>
              <td>+932 452379444</td>
              <td>brand@beranm.com</td>
              <td>20-10-2017</td>
              <td><a href="/admin/users/show" class="btn btn-primary">Show</a></td>
            </tr>
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