<?php
require_once "./function/is_admin_auth.php";

  require "./controller/admin/coupons/CouponController.php";


if($_SERVER["REQUEST_METHOD"] = "POST"){

  if(isset($_GET["coupon_id"]) && $_GET["coupon_id"] != null){
    $coupon = (new CouponController)->find($_GET["coupon_id"]);
    
    if(!$coupon){
      header("Location: /admin/coupons");
      die;
    }
  }
  else{
    require "./views/pages/admin/404.php";
    die;
  }


  (new CouponController)->update(["status" => "inactive"], $coupon["id"]);
  header("Location: /admin/coupons");

}
else {
  require "./views/pages/admin/404.php";
  die;
}