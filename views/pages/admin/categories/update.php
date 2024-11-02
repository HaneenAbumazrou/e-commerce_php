<?php
$title = 'Add New Products';
$categories = 'active';
ob_start();
?>


<div class="pagetitle">
    <h1>Edit Category</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>


<div class="row">
    <div class="col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body py-3">


                <!-- General Form Elements -->
                <form action="/admin/categories/update?id=<?= $categories_data["id"] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mt-3 row mb-3">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="<?php echo $categories_data["name"] ?? null ?>">
                            <span class="text-danger">
                                <?= $_SESSION["add_product_errors"]["name_error"] ?? null ?>
                            </span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Images</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" multiple name="images" value="<?php echo $category_data["images"] ?? null ?>">
                            <span class="text-danger">
                                <?= $_SESSION["add_product_errors"]["images_error"] ?? null ?>
                            </span>
                        </div>
                    </div>












                    <div class="row my-3">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10 d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </div>
</div>






<?php
$content = ob_get_clean();
unset($_SESSION['success_message']);
require "./views/pages/admin/layout.php";
?>