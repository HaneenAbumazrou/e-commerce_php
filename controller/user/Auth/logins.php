<?php
session_start();
require './controller/user/Auth/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $authController = new AuthController();
        if ($authController->login($email, $password)) {
            header("Location: /");
            exit;
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}



require "./views/pages/user/login.php";