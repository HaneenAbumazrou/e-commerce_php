<?php

  if(isset($_SESSION["admin"])) {
    header("Location: /admin/dashboard");
    die;
  }
// dd("FROM LOGIN PAGE");
require "./controller/admin/login/LoginController.php";

$error = false;
$errors = []; 


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
        if(empty($email) ){
            $errors['email_required'] = "Please enter your email.";
        }
        if(empty($password) ){
            $errors['password_required'] = "Please enter your password.";
        }

        if (!$admin) {
            $errors['email'] = "Invalid email ";
        }
        else if(!password_verify($password, $admin['password'])) {
            $errors['password'] = "Invalid password.";
            $emailValue = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : '';

        }
        else{
            $errors['invalid'] = "Invalid email or password.";
            $emailValue = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : '';

    }
}}
else{
    $emailValue = isset($_COOKIE['remember_email']) ? $_COOKIE['remember_email'] : '';

}

require "./views/pages/admin/Login/login.php";
