<?php

use Dotenv\Dotenv;

require_once "./function/admin_404.php";
require_once "./function/is_login.php";
require_once "./function/dd.php";
require "./vendor/autoload.php";

$dotenv = Dotenv::createImmutable(__DIR__);


$dotenv->load();





function check(){
  global $user_routes;
  global $admin_routes;

  $request_parts = explode("/", $_SERVER["REQUEST_URI"]);
  $request_parts_q = explode("?", $_SERVER["REQUEST_URI"]);

  if($request_parts[1] != "admin"){
    if(array_key_exists($request_parts_q[0], $user_routes)){
      require $user_routes[$request_parts_q[0]];
    }
    else {
      require $user_routes["/404"];
    }
  }
  else {
    
    if(array_key_exists($request_parts_q[0], $admin_routes)){
      require $admin_routes[$request_parts_q[0]];
    }
    else {
      require $admin_routes["/admin/404"];
    }
  }

}



$user_routes = [
  ######## User #########
  ## index
  "/" => "views/pages/user/index.php",
  "/about-us" => "views/pages/user/about.php",
  "/user/cart" => "views/pages/user/cart.php",
  "/products/categories" => "views/pages/user/category.php",
  "/user/order/checkout" => "views/pages/user/checkout.php",
  "/product" => "views/pages/user/product.php",
  "/contact-us" => "views/pages/user/contact.php",
  "/user/wishlist" => "views/pages/user/wishlist.php",
  "/404" => "views/pages/404.php",
];


$admin_routes = [
  ######## Admin #########
  ## index
  "/admin/dashboard" => "controller/admin/dashboard.php",

  ## Auth
  "/admin/login" => "views/pages/admin/Login/login.php",
  
  // admins
  "/admin/admins" => "controller/admin/admins/index.php",
  "/admin/admins/create" => "controller/admin/admins/create.php",
  "/admin/admins/show" => "views/pages/admin/admins/show.php",
  "/admin/admins/profile" => "controller/admin/admins/admin-profile.php",
  
  
  // users
  "/admin/users" => "views/pages/admin/users/index.php",
  "/admin/users/order" => "views/pages/admin/users/order.php",
  "/admin/users/show" => "views/pages/admin/users/show.php",
  
  // categories
  "/admin/categories" => "views/pages/admin/categories/index.php",
  "/admin/categories/create" => "views/pages/admin/categories/create.php",
  "/admin/categories/edit" => "views/pages/admin/categories/update.php",
  
  // products
  "/admin/products" => "views/pages/admin/products/index.php",
  "/admin/products/create" => "views/pages/admin/products/create.php",
  "/admin/products/edit" => "views/pages/admin/products/update.php",
  "/admin/products/show" => "views/pages/admin/products/show.php",
  
  "/admin/404" => "views/pages/admin/404.php",

];


check();