<?php
	$title = "User's Orders";
	$users = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show User's Order</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Orders</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>


  <div class="section profile">
    <div class="card">
      <div class="card-body pt-3">

        <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#order-details">Order Details</button>
          </li>
        </ul>

        <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview" id="order-details">
            <h5 class="card-title">Order #233</h5>


            <div class="mx-2 mb-5">
              <div class="row">
                <div class="col col-lg-12 label">Order Number</div>
                <div class="col col-lg-12">003</div>
              </div>

              <div class="row">
                <div class="col col-lg-12 label">Applyed Coupon</div>
                <div class="col col-lg-12">NEW30</div>
              </div>

              <div class="row">
                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">Price</div>
                  <div class="col col-lg-6">$99</div>
                </div>

                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">New Price</div>
                  <div class="col col-lg-6">$99</div>
                </div>

                <div class="col col-md-4 col-lg-2">
                  <div class="col col-lg-6 label">Total Amount</div>
                  <div class="col col-lg-6">$99</div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-6 label">Address</div>
                <div class="col col-lg-6">Amman, Al-abdaly, ppr st.</div>
              </div>

              <div class="row">
                <div class="col col-lg-1 label">Status</div>
                <div class="col col-lg-10">
                  <span class="badge text-bg-success">Delivered</span>
                  <span class="badge text-bg-danger">Not Delivered</span>
                </div>
              </div>
            </div>


            <div class="table-responsive">
              <table class="table table-borderless table-striped datatabl">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Qtn</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
    
                <tbody>
                  <tr>
                    <th scope="row"><a href="/admin/products/show">#0001</a></th>
                    <td>IPhone 77 Pro Max</td>
                    <td class="text-truncate pe-3" style="max-width: 260px;">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, ab voluptatem nemo atque sapiente placeat. Quas optio nihil adipisci deserunt atque vitae non. Magni ipsam deserunt odit corporis blanditiis dolorem dolores distinctio possimus unde! Voluptas soluta accusantium veritatis unde commodi distinctio, suscipit consectetur exercitationem. Illum libero recusandae quo cumque facilis iste commodi excepturi, tenetur inventore ab quisquam nulla distinctio. Dolore esse dignissimos libero reprehenderit delectus voluptatum explicabo ratione officia, quibusdam atque molestias nam consectetur natus reiciendis neque fugit cumque excepturi inventore itaque. Nihil eum commodi sed fugiat aspernatur sit ut aut eligendi quod inventore numquam, corrupti, deleniti exercitationem amet ratione.
                    </td>
                    <td>1</td>
                    <td>$99</td>
                    <td>
                      <a href="/admin/products/show" class="btn btn-primary">Show</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="/admin/products/show">#0002</a></th>
                    <td>IPhone 79 Pro Max</td>
                    <td class="text-truncate pe-3" style="max-width: 260px;">
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, ab voluptatem nemo atque sapiente placeat. Quas optio nihil adipisci deserunt atque vitae non. Magni ipsam deserunt odit corporis blanditiis dolorem dolores distinctio possimus unde! Voluptas soluta accusantium veritatis unde commodi distinctio, suscipit consectetur exercitationem. Illum libero recusandae quo cumque facilis iste commodi excepturi, tenetur inventore ab quisquam nulla distinctio. Dolore esse dignissimos libero reprehenderit delectus voluptatum explicabo ratione officia, quibusdam atque molestias nam consectetur natus reiciendis neque fugit cumque excepturi inventore itaque. Nihil eum commodi sed fugiat aspernatur sit ut aut eligendi quod inventore numquam, corrupti, deleniti exercitationem amet ratione.
                    </td>
                    <td>2</td>
                    <td>$99</td>
                    <td>
                      <a href="/admin/products/show" class="btn btn-primary">Show</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>



<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>