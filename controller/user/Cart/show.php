<?php
require "./controller/user/Cart/CartController.php";
require "./model/Product.php";

$cart = new Cart();
$pro = new Product();

$cart_products = [];
foreach ($cart->getItems() as $item){

  $temp = [];
  $temp['product'] = $pro->where("SELECT * FROM products WHERE id=". $item["id"])[0];
  $temp['quantity'] = $item["quantity"];

  array_push($cart_products, $temp);
}

// dd($cart_products[0]);


require "./views/pages/user/cart.php";