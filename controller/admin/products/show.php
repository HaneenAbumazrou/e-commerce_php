<?php
require_once "./function/is_admin_auth.php";

require "./controller/admin/products/ProductController.php";

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Sanitize the ID input to prevent SQL injection

    // Now you can use $id to get the product and images
    $productController = new ProductController();
    $product = $productController->show($id);
    $images = $productController->showImage($id);
} else {
    // Handle the case where the ID is not provided
    echo "Error: No product ID provided.";
    exit;
}


$product = (new ProductController())->show($id);
$images = (new ProductController())->showImage($id);





require "./views/pages/admin/products/show.php";
