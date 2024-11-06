<?php
require './controller/user/Auth/AuthController.php';



function check_if_exists($email){
    return (new User())->where("SELECT email FROM users WHERE email = '$email'");
}


function validation($data){

    $result = true;

    if(!$data["first_name"]){
        $result = false;
        $_SESSION["register_errors"]["first_name_error"] = "The first name field is required.";
    }

    if(!$data["last_name"]){
        $result = false;
        $_SESSION["register_errors"]["last_name_error"] = "The last name field is required.";
    }

    if(!$data["email"]){
        $result = false;
        $_SESSION["register_errors"]["email_error"] = "The email field is required.";
    }
    else if(!preg_match("/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/", $data["email"])) {
        $result = false;
        $_SESSION["register_errors"]["email_error"] = "You must enter a vaild email address.";
    }
    else if(check_if_exists($data["email"])) {
        $result = false;
        $_SESSION["register_errors"]["email_error"] = "The email already used.";
    }

    if(!$data["username"]){
        $result = false;
        $_SESSION["register_errors"]["username_error"] = "The username field is required.";
    }

    if(!$data["password"] || !$data["password_confirmation"]){
        $result = false;
        $_SESSION["register_errors"]["password_error"] = "The password field is required.";
    }
    elseif (!preg_match('/^(?=.*[A-Z]).{8,}$/', $data["password"])){
        $result = false;
        $_SESSION["register_errors"]["password_error"] = "The password field must consists from 8 chars and at least one upper case";
    }
    else if ($data["password"] != $data["password_confirmation"]){
        $result = false;
        $_SESSION["register_errors"]["password_error"] = "The passwords aren't same.";
    }

    return $result;
}

function clean($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = strip_tags($data);

    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if(validation($_POST)){
        $data["first_name"] = clean($_POST["first_name"]);
        $data["last_name"] = clean($_POST["last_name"]);
        $data["username"] = clean($_POST["username"]);
        $data["email"] = clean($_POST["email"]);
        $data["password"] = password_hash(clean($_POST["password"]), PASSWORD_DEFAULT);

        (new AuthController())->register($data);

        header("Location: /");
        die;
    }

}



$signup = "s--signup";
require "./views/pages/user/login.php";
unset($_SESSION["register_errors"]);