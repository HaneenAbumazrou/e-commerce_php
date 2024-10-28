<?php
session_start();

require "./controller/admin/admins/AdminController.php";


function check_if_exists($email){
  return (new Admin())->where("SELECT email FROM admins WHERE email = '$email'");
}

/**
 * Check if the data are valid or not.
 * is empty --
 * use clean()
 * check if email
 * check if email is exsit
 * check if passwords are same. -- 
 * @param data : the data sent to check if valid.
 * @return true if all data are valid, flase otherwise.
 */
function validation($data){

  $result = true;

  if(!$data["first_name"]){
    $result = false;
    $_SESSION["add_admin_errors"]["first_name_error"] = "The first name field is required.";
  }

  if(!$data["last_name"]){
    $result = false;
    $_SESSION["add_admin_errors"]["last_name_error"] = "The last name field is required.";
  }

  if(!$data["email"]){
    $result = false;
    $_SESSION["add_admin_errors"]["email_error"] = "The email field is required.";
  }
  else if(!preg_match("/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/", $data["email"])) {
    $result = false;
    $_SESSION["add_admin_errors"]["email_error"] = "You must enter a vaild email address.";
  }
  else if(check_if_exists($data["email"])) {
    $result = false;
    $_SESSION["add_admin_errors"]["email_error"] = "The email already used.";
  }

  if(!$data["username"]){
    $result = false;
    $_SESSION["add_admin_errors"]["username_error"] = "The username field is required.";
  }

  if(!$data["password"] || !$data["password_confirmation"]){
    $result = false;
    $_SESSION["add_admin_errors"]["password_error"] = "The password field is required.";
  }
  else if ($data["password"] != $data["password_confirmation"]){
    $result = false;
    $_SESSION["add_admin_errors"]["password_error"] = "The passwords aren't same.";
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


if($_SERVER["REQUEST_METHOD"] == "POST") {

  if(validation($_POST)){

    $data["first_name"]  = clean($_POST["first_name"]);
    $data["last_name"]  = clean($_POST["last_name"]);
    $data["username"]  = clean($_POST["username"]);
    $data["email"]  = clean($_POST["email"]);
    $data["password"]  = password_hash(clean($_POST["password"]), PASSWORD_BCRYPT);
    $data["role"]  = clean($_POST["role"]);


    $admin = new AdminController();
    $admins = $admin->create($data);

    $_SESSION["addingNewAdminSuccessfully"] = "The new admin added successfully.";
  }

}


require "./views/pages/admin/admins/create.php";

unset($_SESSION["addingNewAdminSuccessfully"]);
unset($_SESSION["add_admin_errors"]);