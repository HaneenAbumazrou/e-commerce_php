<?php
$title = 'Add New Products';
$products = 'active';
ob_start();
?>


<div class="pagetitle">
  <h1>Add New Product</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item">Products</li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
  </nav>
</div>


<div class="row">
  <div class="col-sm-12 col-lg-6">
    <div class="card">
      <div class="card-body py-3">


        <?php if (isset($_SESSION["success_message"])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION["success_message"] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- General Form Elements -->
        <form action="/admin/products/create" method="POST" enctype="multipart/form-data">
          <div class="mt-3 row mb-3">
            <label class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" value="<?php echo $_POST["name"] ?? null ?>">
              <span class="text-danger">
                <?= $_SESSION["add_product_errors"]["name_error"] ?? null ?>
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Images</label>
            <div class="col-sm-10">
              <input class="form-control" type="file" id="formFile" multiple name="images[]" value="<?php echo $_POST["images"] ?? null ?>">
              <span class="text-danger">
                <?= $_SESSION["add_product_errors"]["images_error"] ?? null ?>
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
              <input class="form-control" type="number" id="price" min=0 name="price" value="<?php echo $_POST["price"] ?? null ?>">
              <span class=" text-danger">
                <?= $_SESSION["add_product_errors"]["price_error"] ?? null ?>
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Stock Quantity</label>
            <div class="col-sm-10">
              <input class="form-control" type="number" id="price" min=0 name="stock_quantity" value="<?php echo $_POST["stock_quantity"] ?? null ?>">
              <span class=" text-danger">
                <?= $_SESSION["add_product_errors"]["stock_quantity_error"] ?? null ?>
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example" name="category" value="<?php echo $_POST["category"] ?? null ?>">
                <option selected>Select</option>
                <?php foreach ($all_categories as $category_data): ?>
                  <option value="<?= $category_data["id"] ?>"><?= $category_data["name"] ?></option>
                <?php endforeach; ?>
              </select>
              <span class="text-danger">
                <?= $_SESSION["add_product_errors"]["category_error"] ?? null ?>
              </span>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" style="height: 100px" name="description" value="<?php echo $_POST["description"] ?? null ?>"></textarea>
              <span class=" text-danger">
                <?= $_SESSION["add_product_errors"]["description_error"] ?? null ?>
              </span>
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