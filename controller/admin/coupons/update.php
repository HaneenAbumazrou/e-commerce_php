<?php
require_once "./function/is_admin_auth.php";

require "./controller/admin/coupons/CouponController.php";


$coupon = (new CouponController)->find($_GET["coupon_id"]);
// check if id exsits and correct.
if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(isset($_GET["coupon_id"]) && $_GET["coupon_id"] != null){
    
    if(!$coupon){
      header("Location: /admin/coupons");
      die;
    }
  }
  else{
    require "./views/pages/admin/404.php";
    die;
  }

  // dd($_GET);
}


function validation($data){
  $result = true;

  if(!$data["code"]){
    $result = false;
    $_SESSION["update_coupon_errors"]["code_error"] = "The coupon code field is required.";
  }

  if(!$data["discount_percentage"]){
    $result = false;
    $_SESSION["update_coupon_errors"]["discount_percentage_error"] = "The discount field is required.";
  }
  else if(!is_numeric($data["discount_percentage"])) {
    $result = false;
    $_SESSION["update_coupon_errors"]["discount_percentage_error"] = "The discount field must be a numeric value.";
  }

  if($data["status"] == "Select"){
    $result = false;
    $_SESSION["update_coupon_errors"]["status_error"] = "The status field is required.";
  }

  if(!$data["valid_from"]){
    $result = false;
    $_SESSION["update_coupon_errors"]["valid_from_error"] = "The valid from field is required.";
  }

  if(!$data["valid_until"]){
    $result = false;
    $_SESSION["update_coupon_errors"]["valid_until_error"] = "The valid until field is required.";
  }

  if(!is_date_after_current($data["valid_from"])){
    $result = false;
    $_SESSION["update_coupon_errors"]["valid_from_error"] = "The valid from must be equal or greater then current date.";
  }
  if(!is_start_before_end($data["valid_from"], $data["valid_until"])){
    $result = false;
    $_SESSION["update_coupon_errors"]["valid_until_error"] = "The valid until date must be greater than valid from date.";
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


    (new CouponController())->update($data, $coupon['id']);
    $_SESSION["coupon_updated_successfully"] = "The Coupon was added successfully.";

    header("Location: /admin/coupons/update?coupon_id=" . $coupon['id']);
    die;
  }else {
    // dd($_SESSION['update_coupon_errors']);
    header("Location: /admin/coupons/update?coupon_id=" . $coupon['id']);
    die;
  }



}

require "./views/pages/admin/coupons/update.php";
unset($_SESSION['update_coupon_errors']);