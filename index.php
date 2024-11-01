<?php
session_start();
use Dotenv\Dotenv;
require_once "./function/admin_404.php";
require_once "./function/is_login.php";
require_once "./function/dd.php";
require "./vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();






function check()
{
  global $user_routes;
  global $admin_routes;

  $request_parts = explode("/", $_SERVER["REQUEST_URI"]);
  $request_parts_q = explode("?", $_SERVER["REQUEST_URI"]);
  // dd($request_parts_q[0]);

  if ($request_parts[1] != "admin") {
    
    if (array_key_exists($request_parts_q[0], $user_routes)) {
      // dd(  );
      require $user_routes[$request_parts_q[0]];
      
    } else {
      require $user_routes["/404"];
    }
  } else {

    if (array_key_exists($request_parts_q[0], $admin_routes)) {
      require $admin_routes[$request_parts_q[0]];
    } else {
      require $admin_routes["/admin/404"];
    }
  }
}



$user_routes = [
  ######## User #########
  ## index
  "/" => "views/pages/user/index.php",
  "/about-us" => "views/pages/user/about.php",
  
  "/user/cart" => "controller/user/Cart/show.php",
  "/user/cart/create" => "controller/user/Cart/create.php",



  "/products/categories" => "controller/admin/categories/show.php",
  "/user/order/checkout" => "controller/user/Checkout/create.php",
  "/product" => "controller/admin/products/show-user.php",

  
  "/contact-us" => "controller/user/Contact/create.php",

  "/user/wishlist" => "controller/user/Wishlist/show.php",
  "/user/wishlist/create" => "controller/user/Wishlist/create.php",
  "/user/wishlist/delete" => "controller/user/Wishlist/delete.php",


  "/login" => "controller/user/Auth/login.php",
  "/test" => "controller/user/Checkout/CheckoutController.php",
  "/register" => "controller/user/Auth/register.php",
  "/logout" => "controller/user/Auth/logout.php",
  "/404" => "views/pages/404.php",

  "/search/result" => "controller/user/Search/result.php",
];


$admin_routes = [
  ######## Admin #########
  ## index
  "/admin/dashboard" => "controller/admin/dashboard.php",

  ## Auth


  "/admin/login" => "controller/admin/login/login.php",
  "/admin/logout" => "controller/admin/login/logout.php",

  // admins
  "/admin/admins" => "controller/admin/admins/index.php",
  "/admin/admins/create" => "controller/admin/admins/create.php",
  "/admin/admins/show" => "controller/admin/admins/show.php",
  "/admin/admins/delete" => "controller/admin/admins/delete.php",
  "/admin/admins/profile" => "controller/admin/admins/admin-profile.php",

  //orders
  "/admin/orders" => "controller/admin/orders/order.php",
  "/admin/orders/show" => "controller/admin/orders/show.php",
  
  // users
  "/admin/users" => "views/pages/admin/users/index.php",
  "/admin/users/order" => "views/pages/admin/users/order.php",
  "/admin/users/show" => "views/pages/admin/users/show.php",

  // categories
  "/admin/categories" => "controller/admin/categories/create.php",
  "/admin/categories/edit" => "controller/admin/categories/update.php",

  // products
  "/admin/products" => "controller/admin/products/index.php",

  "/admin/products/create" => "controller/admin/products/create.php",
  "/admin/products/edit" => "controller/admin/products/update.php",
  "/admin/products/show" => "controller/admin/products/show.php",




  // coupons
  "/admin/coupons" => "controller/admin/coupons/index.php",
  "/admin/coupons/create" => "controller/admin/coupons/create.php",
  "/admin/coupons/update" => "controller/admin/coupons/update.php",
  "/admin/coupons/delete" => "controller/admin/coupons/delete.php",
  
  
  // messages
  "/admin/messages" => "controller/admin/messages/index.php",
  "/admin/messages/show" => "controller/admin/messages/show.php",
  "/admin/messages/update" => "controller/admin/messages/update.php",


  "/admin/404" => "views/pages/admin/404.php",

];


check();
