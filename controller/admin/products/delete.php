<?php
require_once "./function/is_admin_auth.php";


require "./controller/admin/products/ProductController.php";


// Create a new instance of the ProductController
$productController = new ProductController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $images = (new ProductController)->showImage($_GET['id']);

    foreach ($images as $image) {
        unlink($image["path"]);
        (new ProductImage)->delete($image['id']);
    }
    // Retrieve the product ID from the POST request
    $productId = $_GET["id"];
    $result = $productController->delete($productId);
}

//     if ($productId > 0) {
//         // Attempt to delete the product


//         if ($result) {
//             $_SESSION["success_message"] = "Product deleted successfully!";
//         } else {
//             $_SESSION["error_message"] = "Failed to delete the product. Please try again.";
//         }
//     } else {
//         $_SESSION["error_message"] = "Invalid product ID.";
//     }

//     // Redirect to the products list page
//     header("Location: /admin/products");
//     exit;
// }


// If accessed directly without a POST request, redirect to the products list
// } catch (Exception $e) {
//     // Handle any exceptions
//     $_SESSION["error_message"] = "An error occurred: " . $e->getMessage();
//     header("Location: /admin/products");
//     exit;


header("Location: /admin/products");

exit;
