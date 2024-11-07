<?php
require_once "./function/is_admin_auth.php";
require "./controller/admin/users/UserController.php";
require_once "./model/Address.php";


// check if id exsits and correct.
if($_SERVER["REQUEST_METHOD"] == "GET"){
  $user = (new UserController)->find($_GET["user_id"]);
  $user["address"] = @(new Address())->where("SELECT * FROM addresses WHERE user_id = ". $user['id'])[0];
  if(isset($_GET["user_id"]) && $_GET["user_id"] != null){
    
    if(!$user){
      header("Location: /admin/users");
      die;
    }
  }
  else{
    require "./views/pages/admin/404.php";
    die;
  }

  // dd($user);



  $user_orders = (new UserController)->where("SELECT 
      o.*,
      c.code,
      c.discount_percentage,
      COUNT(oi.id) AS item_count
      FROM 
          orders o
      LEFT JOIN 
          coupons c ON o.coupon_id = c.id
      LEFT JOIN 
          order_items oi ON oi.order_id = o.id
      WHERE 
          o.user_id = " . $_GET['user_id'] ."
      GROUP BY o.id
      ORDER BY o.id DESC
      ");


          // dd($user_orders);

}

require "./views/pages/admin/users/show.php";