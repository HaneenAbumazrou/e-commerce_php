<?php
session_start();

require "./controller/admin/products/ProductController.php";

/**
 * Validates the product data.
 * Checks for empty fields and correct formats.
 * @param array $data The form data.
 * @return bool True if all data is valid, false otherwise.
 */
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

    if (empty($data["category"]) || $data["category"] == "Select") {
        $result = false;
        $_SESSION["add_product_errors"]["category_error"] = "The category field is required.";
    }

    // Validate image upload
    if (empty($_FILES["images"]["name"][0])) {
        $result = false;
        $_SESSION["add_product_errors"]["images_error"] = "At least one image is required.";
    }

    return $result;
}

/**
 * Cleans the input data.
 * Uses trim(), htmlspecialchars(), and strip_tags().
 * @param string $data The data to clean.
 * @return string The cleaned data.
 */
function clean($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productController = new ProductController();

    // validateProduct($_POST);
    // dd($_SESSION["add_product_errors"]);

    if (validateProduct($_POST)) {
        // Clean the input data
        $name = clean($_POST["name"]);
        $price = clean($_POST["price"]);
        $stock_quantity = clean($_POST["stock_quantity"]);
        $category = clean($_POST["category"]);
        $description = clean($_POST["description"]);

        // Handle file uploads
        $imagePaths = [];

        // dd($_FILES['images']);
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $fileName = basename($_FILES['images']['name'][$key]);
            $targetFilePath = "./public/admin/assets/images/products/" . uniqid('', true) . $fileName;

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            } else {
                $_SESSION["add_product_errors"]["images_error"] = "Failed to upload image: " . $fileName;
            }
        }

        // Create product
        $productData = [
            "name" => $name,
            "price" => $price,
            "stock_quantity" => $stock_quantity,
            "category_id" => $category,
            "description" => $description,
        ];


        $result = $productController->create($productData);
        $_SESSION["success_message"] = "Product added successfully!";

        // if ($result) {
        //     header("Location: /admin/products");
        //     exit;
        // } else {
        //     $_SESSION["error_message"] = "Failed to add the product. Please try again.";
        // }
    } else {
        // dd($_SESSION["add_product_errors"]);
    }
}

require "./views/pages/admin/products/create.php";
unset($_SESSION["add_product_errors"]);
unset($_SESSION["success_message"]);
