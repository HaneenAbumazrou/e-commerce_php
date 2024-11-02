<?php
require './controller/user/Auth/AuthController.php';
if(isset($_SESSION["user"])) {
    header("Location: /");
    die;
}

/**
 * is empty
 * is email
 */
function validation($data){
    $result = true;

    if(empty($data["email"])){
        $result = false;
        $_SESSION["login_errors"]["email_error"] = "The email field is required.";
    }
    elseif (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $data["email"])) {
        $result = false;
        $_SESSION["login_errors"]["email_error"] = "You must enter a vaild email address.";
    }

    if(empty($data["password"])){
        $result = false;
        $_SESSION["login_errors"]["password_error"] = "The password field is required.";
    }

    return $result;
}

/**
 * trim()
 * htmlspecialchars()
 * strip_tags()
 */
function clean($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if(validation($_POST)){
        $data["email"] = clean($_POST["email"]);
        $data["password"] = clean($_POST["password"]);


        $auth = new AuthController();
        $login_result = $auth->login($data["email"], $data["password"]);
        
        if($login_result){
            header("Location: /");
            die;
        }
    }

}



require "./views/pages/user/login.php";
unset($_SESSION["login_errors"]);