<?php
session_start();
require './controller/user/Auth/AuthController.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userData = [
        'username' => $_POST['username'],
        'first_name' => $_POST['firstname'],
        'last_name' => $_POST['lastname'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ];

    $authController = new AuthController();
    try {
        $authController->register($userData);
        echo "Registration successful!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


require "./views/pages/user/registers.php";