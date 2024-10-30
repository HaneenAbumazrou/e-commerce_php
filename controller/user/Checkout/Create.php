<?php

require "./controller/user/Checkout/CheckoutController.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // dd($_POST);
    $checkoutData = [
        'city' => $_POST['city'],
        'address' => $_POST['address'],
        'user_id'  => 1,

        // 'apartment' => $_POST['apartment']
    ];

    if (empty($checkoutData['city'])) {
        $errors[] = "City is required.";
    }

    if (empty($checkoutData['address'])) {
        $errors[] = "Address is required.";
    }

   
    //contain just letter
    if (!preg_match("/^[a-zA-Z\s]+$/", $checkoutData['city'])) {
        $errors[] = "City should only contain letters.";
    }

    if (empty($errors)) {

    $checkoutController = new CheckoutController();
    try {
        $checkoutController->create($checkoutData);
        echo "Checkout successful!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    } else {
        foreach  ($errors as $error) {
            echo $error . "<br>";
            }

    }
}

require "./views/pages/user/checkout.php"; 