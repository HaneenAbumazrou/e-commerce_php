<?php
require "./controller/user/Cart/CartController.php";


// Handle adding a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// dd((new Cart())->getItems());

  $product = [
    "id" => $_GET["product"],
    "quantity" => $_POST['quantity'],
  ];

  new Cart();
  $cart->addProduct($product);
  header("Location: ". $_SERVER["HTTP_REFERER"]);
  exit();
}
else {
  require "./views/pages/404.php";
}