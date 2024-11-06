<?php

require "./controller/admin/users/UserController.php";


function check_if_exists(){
  return (new User())->where("SELECT email FROM admins WHERE email = " . $_SESSION['user']['email']);
}

function validation($data){

  $result = true;

  if(!$data["first_name"]){
    $result = false;
    $_SESSION["update_user_errors"]["first_name_error"] = "The first name field is required.";
  }

  if(!$data["last_name"]){
    $result = false;
    $_SESSION["update_user_errors"]["last_name_error"] = "The last name field is required.";
  }

  if(!$data["email"]){
    $result = false;
    $_SESSION["update_user_errors"]["email_error"] = "The email field is required.";
  }
  else if(!preg_match("/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/", $data["email"])) {
    $result = false;
    $_SESSION["update_user_errors"]["email_error"] = "You must enter a vaild email address.";
  }
  else if(check_if_exists()) {
    $result = false;
    $_SESSION["update_user_errors"]["email_error"] = "The email already used.";
  }

  if(!$data["username"]){
    $result = false;
    $_SESSION["update_user_errors"]["username_error"] = "The username field is required.";
  }

  if(!$data["phone"]){
    $result = false;
    $_SESSION["update_user_errors"]["phone_error"] = "The phone field is required.";
  }
  elseif (strlen($data["phone"]) == 10 && is_numeric($data["phone"])) {
    $result = false;
    $_SESSION["update_user_errors"]["phone_error"] = "The phone isn't valid.";
  }

  return $result;
}


function clean($data){
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);

  return $data;
}




if ($_SERVER['REQUEST_METHOD'] == "POST"){


  if (validation($_POST)){
    
    $_SESSION['user']["first_name"] = clean($_POST['first_name']);
    $_SESSION['user']["last_name"] = clean($_POST['last_name']);
    $_SESSION['user']["email"] = clean($_POST['email']);
    $_SESSION['user']["username"] = clean($_POST['username']);
    $_SESSION['user']["phone"] = clean($_POST['phone']);




    (new User())->update($_SESSION['user'], $_SESSION['user']['user_id']);
    $_SESSION['updateProfileSuccessfully'] = "Your Profile Updated Successfully.";

  }
  header("Location: /user/profile");
  die;


}
else {
  require "./views/pages/404.php";
  die;
}