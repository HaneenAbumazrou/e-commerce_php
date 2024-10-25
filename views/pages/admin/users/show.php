<?php
	$title = "User | user_name";
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
            <h2>Kevin Anderson</h2>
            <h3>kevin_anderson</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card" style="min-height: 490px;">
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
                  <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Username</div>
                  <div class="col-lg-9 col-md-8">kevin_anderson</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">+962 772 231 333</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">
                      Amman, Al-abdaly, ppr st.
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Status</div>
                  <div class="col-lg-9 col-md-8">
                    <span class="badge text-bg-success">Active</span>
                    <!-- <span class="badge text-bg-danger">Inactive</span>
                    <span class="mx-2">22-4-2024</span> -->
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">From</div>
                  <div class="col-lg-9 col-md-8">10-10-2024</div>
                </div>

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
                <form action="" method="post">
                  <!-- <input type="submit" value="Active" class="btn btn-success"> -->
                  <input type="submit" value="Deactive" class="btn btn-danger">
                </form>
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
            <tr>
              <th scope="row"><a href="/admin/users/order">#0001</a></th>
              <td>05</td>
              <td>NEWCUOPON</td>
              <td>$100</td>
              <td>$90</td>
              <td>10%</td>
              <td>6-10-2024</td>
              <td><a href="/admin/users/order" class="btn btn-primary">Show</a></td>
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