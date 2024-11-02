<?php
require "./controller/user/Cart/CartController.php";
require "./model/Product.php";

$cart = new Cart();
$pro = new Product();


$cart->removeProduct($_GET["cart_product"]);

header("Location: /user/cart");
die;