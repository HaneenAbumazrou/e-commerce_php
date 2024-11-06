<?php

require "./controller/admin/users/UserController.php";


function check_if_exists(){
  return (new User())->where("SELECT email FROM admins WHERE email = " . $_SESSION['user']['email']);
}

function validation($data){

  $result = true;
  $password = (new User())->where('SELECT password FROM users WHERE id='. $_SESSION['user']['user_id']);


  if(!$data["current_password"]){
    $result = false;
    $_SESSION["update_password_errors"]["current_password_error"] = "The current password field is required.";
  }

  if(!$data["password"] || !$data["password_confirmation"]){
    $result = false;
    $_SESSION["update_password_errors"]["password_error"] = "The password field is required.";
  }

  if($password == password_hash($data['password'], PASSWORD_DEFAULT)){
    $result = false;
    $_SESSION["update_password_errors"]["current_password_error"] = "The password doesn't match with your current password.";
  }
  elseif (!preg_match('/^(?=.*[A-Z]).{8,}$/', $data["password"])){
    $result = false;
    $_SESSION["update_password_errors"]["password_error"] = "The password field must consists from 8 chars and at least one upper case";
  }
  else if ($data["password"] != $data["password_confirmation"]){
    $result = false;
    $_SESSION["update_password_errors"]["password_error"] = "The passwords aren't same.";
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
    
    $password = clean($_POST['password']);


    (new User())->update(['password' => password_hash($password, PASSWORD_DEFAULT)], $_SESSION['user']['user_id']);
    $_SESSION['updateProfileSuccessfully'] = "Your password Updated Successfully.";

  }
  $activation = "active show";
  header("Location: /user/profile");
  die;


}
else {
  require "./views/pages/404.php";
  die;
}