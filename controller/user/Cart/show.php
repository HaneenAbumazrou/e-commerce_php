<?php
require "./controller/user/Cart/CartController.php";
require "./model/Product.php";

$cart = new Cart();
$pro = new Product();

$total_price = 0;
$cart_products = [];
foreach ($cart->getItems() as $item){

  $temp = [];
  $temp['product'] = $pro->where("SELECT p.*, 
        (SELECT pi.path 
        FROM product_images pi 
        WHERE pi.products_id = p.id 
        ORDER BY pi.created_at ASC 
        LIMIT 1) AS first_image
        FROM products p 
        WHERE p.id = " . $item["id"]);

    $total_price += $temp['product'][0]["price"] * $item["quantity"];

  $temp['quantity'] = $item["quantity"];

  array_push($cart_products, $temp);
}
$_SESSION["price_before_coupon"] = $total_price;


require "./views/pages/user/cart.php";
unset($_SESSION["apply_coupon_errors"]);