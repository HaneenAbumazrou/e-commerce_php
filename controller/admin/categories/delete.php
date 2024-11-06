<?php
require "./controller/admin/categories/CategoryController.php";


// Create a new instance of the ProductController
$categoryController = new CategoryController();
$all_categories = (new CategoryController())->show($_GET["id"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the product ID from the POST request
    unlink($all_categories["image_path"] . $all_categories['image']);
    ($categoryController)->delete($_GET['id']);
}

header("Location: /admin/categories");

exit;
