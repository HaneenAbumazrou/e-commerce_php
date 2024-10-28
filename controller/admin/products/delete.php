<?php
session_start();

require "./controller/admin/products/ProductController.php";

try {
    // Create a new instance of the ProductController
    $productController = new ProductController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the product ID from the POST request
        $productId = isset($_POST["id"]) ? (int)$_POST["id"] : 0;

        if ($productId > 0) {
            // Attempt to delete the product
            $result = $productController->delete($productId);

            if ($result) {
                $_SESSION["success_message"] = "Product deleted successfully!";
            } else {
                $_SESSION["error_message"] = "Failed to delete the product. Please try again.";
            }
        } else {
            $_SESSION["error_message"] = "Invalid product ID.";
        }

        // Redirect to the products list page
        header("Location: /admin/products");
        exit;
    }

    // If accessed directly without a POST request, redirect to the products list
    header("Location: /admin/products");
    exit;
} catch (Exception $e) {
    // Handle any exceptions
    $_SESSION["error_message"] = "An error occurred: " . $e->getMessage();
    header("Location: /admin/products");
    exit;
}
