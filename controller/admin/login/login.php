<?php
session_start();
require "./controller/admin/login/LoginController.php";

$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]);

    $loginController = new LoginController();
    $admin = $loginController->getAdminByEmail($email); 

    if ($admin && password_verify($password, $admin['password'])) {
        unset($admin['password']);

      
        $_SESSION['admin'] = $admin;

        if ($remember) {
            setcookie('remember_email', $email, time() + (86400 * 30), "/"); 
        } else {
            if (isset($_COOKIE['remember_email'])) {
                setcookie('remember_email', '', time() - 3600, "/"); 
            }
        }
        
        session_write_close();

        header("Location: /admin/dashboard");
        exit();
    } else {
        $error = true; 
    }
}

require "./views/pages/admin/Login/login.php";
