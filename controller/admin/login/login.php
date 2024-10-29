<?php
session_start();
require "./controller/admin/login/LoginController.php";

$error = false; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]); 

        $adminModel = new Admin();
        $admin = $adminModel->where("SELECT email, password, username FROM admins WHERE email = '$email'");

        if ($admin && password_verify($password, $admin[0]["password"])) {

            $_SESSION['admin_username'] = $admin[0]['username'];
            $_SESSION['admin_email'] = $admin[0]['email'];


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
            $error = true; // Set error flag

      
        }
    }



require "./views/pages/admin/Login/login.php";