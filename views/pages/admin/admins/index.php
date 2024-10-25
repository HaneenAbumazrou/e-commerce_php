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
          <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
            <div>
              <a href="/admin/admins/create" class="btn btn-primary">Add New Admin</a>
            </div>
          </div>
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
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td>brandoo</td>
              <td>brand@beranm.com</td>
              <td>Super Admin</td>
              <td>20-10-2017</td>
              <td><a href="/admin/admins/show?id=1" class="btn btn-primary">Show</a></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Brandon Jacob</td>
              <td>brandoo</td>
              <td>brand@beranm.com</td>
              <td>Admin</td>
              <td>20-10-2017</td>
              <td><a href="/admin/admins/show?id=1" class="btn btn-primary">Show</a></td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>








<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>