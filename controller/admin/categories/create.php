<?php

require "./controller/admin/categories/CategoryController.php";

$all_categories = (new CategoryController())->index();

/**)
 * Validates category data.
 * @param array $data The form data.
 * @return bool True if all data is valid, false otherwise.
 */
function validateCategory($data)
{
    $result = true;
    $_SESSION["category_errors"] = [];

    // Validate name
    if (empty($data["name"])) {
        $result = false;
        $_SESSION["category_errors"]["name_error"] = "The name field is required.";
    }

    // Validate image upload
    if (empty($_FILES["image"]["name"])) {
        $result = false;
        $_SESSION["category_errors"]["image_error"] = "An image is required.";
    } elseif (!getimagesize($_FILES["image"]["tmp_name"])) {
        $result = false;
        $_SESSION["category_errors"]["image_error"] = "Invalid image file.";
    }

    return $result;
}

/**
 * Cleans input data.
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $categoryController = new CategoryController();

    if (validateCategory($_POST)) {
        // Clean input data

        $imageName = basename($_FILES["image"]["name"]);
        $name = clean($_POST["name"]);
        $newName =  uniqid('', true) . basename($_FILES["image"]["name"]);

        // Handle file upload for category image
        $imagePath = "./public/admin/assets/images/categories/";
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath . $newName)) {
            // Prepare category data
            $categoryData = [
                "name" => $name,
                "image" => $newName,
                "image_path" => $imagePath,
            ];

            // Create category
            $result = $categoryController->create($categoryData);
            $_SESSION["success_message"] = "Product added successfully!";
            //     if ($result) {
            //         $_SESSION["success_message"] = "Category added successfully!";
            //         header("Location: /admin/categories");
            //         exit;
            //     } else {
            //         $_SESSION["error_message"] = "Failed to add category. Please try again.";
            //     }
            // } else {
            //     $_SESSION["category_errors"]["image_error"] = "Failed to upload image.";
        }
    }

    header("Location: /admin/categories");
    exit;
}

require "./views/pages/admin/categories/index.php";
