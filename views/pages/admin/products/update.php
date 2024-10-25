<?php
	$title = 'Add New Products';
	$products = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Update Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Update</li>
      </ol>
    </nav>
  </div>


  <div class="row">
    <div class="col-sm-12 col-lg-6">
      <div class="card">
        <div class="card-body">

          <!-- General Form Elements -->
          <form action="" method="POST">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Images</label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile" multiple name="images">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
                <input class="form-control" type="number" id="price" min=0 name="price">
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Select</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" name="decription"></textarea>
              </div>
            </div>




            <div class="row my-3">
              <div class="col-lg-2"></div>
              <div class="col-lg-10 d-grid gap-2">
                <button type="submit" class="btn btn-primary">Add Product</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>
    </div>
  </div>






<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>