<?php
require "./controller/user/Contact/ContactController.php";



function validation($data){

  $result = true;

  if(!$data["name"]){
    $result = false;
    $_SESSION["contact_errors"]["name_error"] = "The name field is required.";
  }

  if(!$data["subject"]){
    $result = false;
    $_SESSION["contact_errors"]["subject_error"] = "The subject field is required.";
  }


  if(!$data["email"]){
    $result = false;
    $_SESSION["contact_errors"]["email_error"] = "The email field is required.";
  }


  if(!$data["message"]){
    $result = false;
    $_SESSION["contact_errors"]["message_error"] = "The message field is required.";
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

if ($_SERVER["REQUEST_METHOD"] == "POST"){


  if(validation($_POST)){

    $_POST["name"] = clean($_POST["name"]);
    $_POST["email"] = clean($_POST["email"]);
    $_POST["subject"] = clean($_POST["subject"]);
    $_POST["message"] = clean($_POST["message"]);


    (new ContactController)->create($_POST);
    $_SESSION["msgSentSuccessfully"] = "The message was sent successfully.";

  }


}


require "./views/pages/user/contact.php";
unset($_SESSION["msgSentSuccessfully"]);
unset($_SESSION["contact_errors"]);