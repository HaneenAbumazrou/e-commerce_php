<?php
session_start();

require "./controller/admin/products/ProductController.php";
require "./controller/admin/categories/CategoryController.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Sanitize the ID input to prevent SQL injection

    // Now you can use $id to get the product and images
    $productController = new ProductController();
    $product = $productController->show($id);
    $images = $productController->showImage($id);
    $all_categories = (new CategoryController())->index();
} else {
    // Handle the case where the ID is not provided
    echo "Error: No product ID provided.";
    exit;
}


function validateProduct($data)
{
    $result = true;

    if (empty($data["name"])) {
        $result = false;
        $_SESSION["add_product_errors"]["name_error"] = "The name field is required.";
    }

    if (empty($data["price"]) || !is_numeric($data["price"]) || $data["price"] < 0) {
        $result = false;
        $_SESSION["add_product_errors"]["price_error"] = "The price must be a valid number greater than or equal to 0.";
    }

    if (empty($data["stock_quantity"]) || !is_numeric($data["stock_quantity"]) || $data["stock_quantity"] < 0) {
        $result = false;
        $_SESSION["add_product_errors"]["stock_quantity_error"] = "The stock quantity must be a valid number greater than or equal to 0.";
    }

    if (empty($data["description"])) {
        $result = false;
        $_SESSION["add_product_errors"]["description_error"] = "The description field is required.";
    }

    if (empty($data["category"])) {
        $result = false;
        $_SESSION["add_product_errors"]["category_error"] = "The category field is required.";
    }

    // Validate image upload
    // if (empty($_FILES["images"]["name"][0])) {
    //     $result = false;
    //     $_SESSION["add_product_errors"]["images_error"] = "At least one image is required.";
    // }

    return $result;
}

function clean($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productController = new ProductController($id);

    // dd($_POST);

    if (validateProduct($_POST)) {
        // Clean the input data
        $name = clean($_POST["name"]);
        $price = clean($_POST["price"]);
        $stock_quantity = clean($_POST["stock_quantity"]);
        $category = clean($_POST["category"]);
        $description = clean($_POST["description"]);

        // Handle file uploads
        $imagePaths = [];

        // Create product
        $productData = [
            "name" => $name,
            "price" => $price,
            "stock_quantity" => $stock_quantity,
            "category_id" => $category,
            "description" => $description,
        ];

        $product_id = $productController->update($productData, $id);



        // dd($_FILES['images']);
        if (!empty($_FILES["images"]["name"][0])) {

            // Use unlink() function to delete a file 


            $images = (new ProductController)->showImage($_GET['id']);

            foreach ($images as $image) {
                unlink($image["path"]);
                (new ProductImage)->delete($image['id']);
            }
            // dd($images);
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                $fileName = basename($_FILES['images']['name'][$key]);
                $targetFilePath = "./public/admin/assets/images/products/" . uniqid('', true) . $fileName;

                // Create product image
                $productImageData = [
                    "name" => $fileName,
                    "path" => $targetFilePath,
                    "products_id" => $_GET['id'],
                ];


                $productController = new ProductController();
                $productController->createImage($productImageData);


                if (move_uploaded_file($tmpName, $targetFilePath)) {
                    $imagePaths[] = $targetFilePath;
                } else {
                    $_SESSION["add_product_errors"]["images_error"] = "Failed to upload image: " . $fileName;
                }
            }
        } else {
            echo (" has been deleted");
        }








        header('Location: /admin/products/show?id=' . $_GET['id']);
        die;
    }





    unset($_POST);

    $_SESSION["success_message"] = "Product updated successfully!";

    // if ($result) {
    //     header("Location: /admin/products");
    //     exit;
    // } else {
    //     $_SESSION["error_message"] = "Failed to add the product. Please try again.";
    // }
} else {
    // dd($_SESSION["add_product_errors"]);
}


require "./views/pages/admin/products/update.php";
