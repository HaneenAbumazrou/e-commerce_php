<?php
session_start();

require "./controller/admin/admins/AdminController.php";


/**
 * Check if the data are valid or not.
 * is empty --
 * use clean()
 * check if email
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
  $admin = new AdminController();
  $admins = $admin->create($_POST);


  if(validation($_POST)){

    $_POST["first_name"]  = clean($_POST["first_name"]);
    $_POST["last_name"]  = clean($_POST["last_name"]);
    $_POST["username"]  = clean($_POST["username"]);
    $_POST["email"]  = clean($_POST["email"]);
    $_POST["password"]  = clean($_POST["password"]);
    $_POST["role"]  = clean($_POST["role"]);

  }
  else{
    // dd($_SESSION["add_admin_errors"]);
    // var_dump($_SESSION["add_admin_errors"]["first_name_error"] ?? null);
  }




}?>

<?php
require "./views/pages/admin/admins/create.php";

unset($_SESSION["add_admin_errors"]);