<?php
	$title = 'Add New Admins';
	$admins = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Add New Admin</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Admins</li>
        <li class="breadcrumb-item active">Add Admin</li>
      </ol>
    </nav>
  </div>



  <div class="row">
    <div class="col-sm-12 col-lg-8">

      <?php if(isset($_SESSION["addingNewAdminSuccessfully"])): ?>
        <div class="alert alert-success">
          <?php echo $_SESSION["addingNewAdminSuccessfully"] ?>
        </div>
      <?php endif ?>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add Admin</h5>

          <form action="/admin/admins/create" method="POST">
            <div class="row my-2">
              <div class="col-sm-12 col-lg-4">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name">
                <span class="text-danger">
                  <?= $_SESSION["add_admin_errors"]["first_name_error"] ?? null ?>
                </span>
              </div>
              
              <div class="col-sm-12 col-lg-4">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name">
                <span class="text-danger">
                  <?= $_SESSION["add_admin_errors"]["last_name_error"] ?? null ?>
                </span>
              </div>

              <div class="col-sm-12 col-lg-4">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
                <span class="text-danger">
                  <?= $_SESSION["add_admin_errors"]["username_error"] ?? null ?>
                </span>
              </div>
            </div>


            <div class="my-2">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="email">
              <span class="text-danger">
                <?= $_SESSION["add_admin_errors"]["email_error"] ?? null ?>
              </span>
            </div>

            <div class="row my-2">
              <div class="col-sm-12 col-lg-6">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
                <span class="text-danger">
                  <?= $_SESSION["add_admin_errors"]["password_error"] ?? null ?>
                </span>
              </div>
              <div class="col-sm-12 col-lg-6">
                <label class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" name="password_confirmation">
              </div>
            </div>

            <div class="my-2">
              <label class="form-label">Role</label>
              <select name="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="super admin">Super Admin</option>
              </select>
              <span class="text-danger">
                <?= $_SESSION["add_admin_errors"]["_error"] ?? null ?>
              </span>
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