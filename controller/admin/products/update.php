<?php
$title = 'Edit Product';
$products = 'active';
ob_start();

// Assume $product is fetched from the database using the product ID passed as a parameter
// Example: $product = $productController->getById($productId);

?>

<div class="pagetitle">
    <h1>Edit Product</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Products</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body">

                <!-- General Form Elements -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id']) ?>">

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" multiple name="images[]">
                            <small class="text-muted">Leave empty to keep existing images</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="price" min="0" name="price" value="<?= htmlspecialchars($product['price']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Stock Quantity</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" id="stock_quantity" min="0" name="stock_quantity" value="<?= htmlspecialchars($product['stock_quantity']) ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="category" aria-label="Default select example">
                                <option value="" disabled>Select</option>
                                <option value="1" <?= $product['category'] == 1 ? 'selected' : '' ?>>One</option>
                                <option value="2" <?= $product['category'] == 2 ? 'selected' : '' ?>>Two</option>
                                <option value="3" <?= $product['category'] == 3 ? 'selected' : '' ?>>Three</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="description"><?= htmlspecialchars($product['description']) ?></textarea>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10 d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Product</button>
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