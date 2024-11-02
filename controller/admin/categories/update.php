<?php
session_start();


require "./controller/admin/categories/CategoryController.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Sanitize the ID input to prevent SQL injection

    // Now you can use $id to get the product and images
    $categoryController = new CategoryController();
    $categories_data = $categoryController->show($id);
} else {
    // Handle the case where the ID is not provided
    echo "Error: No product ID provided.";
    exit;
}


function validateCategory($data)
{
    $result = true;

    if (empty($data["name"])) {
        $result = false;
        $_SESSION["add_product_errors"]["name_error"] = "The name field is required.";
    }

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
    $categoryController = new CategoryController($id);

    // dd($categories_data);
    if (validateCategory($_POST)) {
        // Clean the input data
        $name = clean($_POST["name"]);
        // Create Category
        $category_data = [
            "name" => $name,
        ];

        // dd($categories_data);
        $category_id = $categoryController->update($category_data, $id);


        if (!empty($_FILES["images"]["name"][0])) {

            // Use unlink() function to delete a file 
            $fileName = basename($_FILES['images']['name']);
            $filePath =  "./public/admin/assets/images/categories/";
            $imageNewName = uniqid('', true) . $fileName;
            $targetFilePath = "./public/admin/assets/images/categories/" . $imageNewName;

            $categoryImageData = [
                "image" => $imageNewName,
                "image_path" => $filePath,
            ];

            if (move_uploaded_file($_FILES['images']['tmp_name'], $targetFilePath)) {
                $imagePaths = $targetFilePath;
            } else {
                $_SESSION["add_category_errors"]["images_error"] = "Failed to upload image: " . $fileName;
            }

            $categoryController = new CategoryController();
            $categoryController->update($categoryImageData, $id);
            // dd($categories_data["image_path"] . $categories_data["image"]);
            unlink($categories_data["image_path"] . $categories_data["image"]);


            // dd($images);


            // Create product image

        } else {
            echo (" has been deleted");
        }
    }





    unset($_POST);

    $_SESSION["success_message"] = "Category updated successfully!";

    header("Location: /admin/categories");

    exit;
    // if ($result) {
    //     header("Location: /admin/products");
    //     exit;
    // } else {
    //     $_SESSION["error_message"] = "Failed to add the product. Please try again.";
    // }
} else {
    // dd($_SESSION["add_product_errors"]);
}


require "./views/pages/admin/categories/update.php";
