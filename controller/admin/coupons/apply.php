<?php


require "./controller/admin/coupons/CouponController.php";

function is_coupon_valid($coupon){
  $_SESSION["coupon"] = (new CouponController)->where("SELECT * FROM coupons WHERE code='$coupon'");
  return $_SESSION["coupon"];
}


function validation($data){
  $result = true;

  if(!$data["coupon_code"]){
    $result = false;
    $_SESSION["apply_coupon_errors"]["coupon_code_error"] = "The coupon code field is required.";
  }
  elseif (!is_coupon_valid($_POST["coupon_code"])){
    $result = false;
    $_SESSION["apply_coupon_errors"]["coupon_code_error"] = "The coupon code is incorrect.";
  }
  elseif(is_coupon_valid($_POST["coupon_code"])[0]["status"] == "inactive"){
    $result = false;
    $_SESSION["apply_coupon_errors"]["coupon_code_error"] = "The coupon code expired.";
  }


  return $result;
}



if ($_SERVER["REQUEST_METHOD"] == "POST"){

  if(validation($_POST)){

    $_SESSION["original_price"] = $_SESSION["price_before_coupon"];
    $_SESSION["total_amount"] = $_SESSION["price_before_coupon"] * (1- $_SESSION["coupon"][0]['discount_percentage']/100);


    header("Location: /user/order/checkout");
    die;
  }
  else {
    header("Location: /user/cart");
    die;
  }
}