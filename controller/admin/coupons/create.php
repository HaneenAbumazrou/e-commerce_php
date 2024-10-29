<?php
session_start();
require "./controller/admin/coupons/CouponController.php";


function validation($data){
  $result = true;

  if(!$data["code"]){
    $result = false;
    $_SESSION["add_coupon_errors"]["code_error"] = "The coupon code field is required.";
  }

  if(!$data["discount_percentage"]){
    $result = false;
    $_SESSION["add_coupon_errors"]["discount_percentage_error"] = "The discount field is required.";
  }
  else if(!is_numeric($data["discount_percentage"])) {
    $result = false;
    $_SESSION["add_coupon_errors"]["discount_percentage_error"] = "The discount field must be a numeric value.";
  }

  if($data["status"] == "Select"){
    $result = false;
    $_SESSION["add_coupon_errors"]["status_error"] = "The status field is required.";
  }

  if(!$data["valid_from"]){
    $result = false;
    $_SESSION["add_coupon_errors"]["valid_from_error"] = "The valid from field is required.";
  }

  if(!$data["valid_until"]){
    $result = false;
    $_SESSION["add_coupon_errors"]["valid_until_error"] = "The valid until field is required.";
  }

  if(!is_date_after_current($data["valid_from"])){
    $result = false;
    $_SESSION["add_coupon_errors"]["valid_from_error"] = "The valid from must be equal or greater then current date.";
  }
  if(!is_start_before_end($data["valid_from"], $data["valid_until"])){
    $result = false;
    $_SESSION["add_coupon_errors"]["valid_until_error"] = "The valid until date must be greater than valid from date.";
  }


  return $result;
}


function is_start_before_end($start, $end){
  $start = new DateTime($start);
  $end = new DateTime($end);

  return $start < $end;
}

function is_date_after_current($date){
  $date = new DateTime($date);
  $current = new DateTime();

  return $current <= $date;
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




if($_SERVER["REQUEST_METHOD"] == "POST"){


  if (validation($_POST)) {

    $data["code"] = clean($_POST["code"]);
    $data["discount_percentage"] = clean($_POST["discount_percentage"]);
    $data["status"] = clean($_POST["status"]);
    $data["valid_from"] = clean($_POST["valid_from"]);
    $data["valid_until"] = clean($_POST["valid_until"]);


    $data["admin_id"] = 1;
    (new CouponController())->create($data);
    $_SESSION["coupon_added_successfully"] = "The Coupon was added successfully.";
  
    unset($_POST);
  }



}



require "./views/pages/admin/coupons/create.php";

unset($_SESSION["coupon_added_successfully"]);
unset($_SESSION["add_coupon_errors"]);