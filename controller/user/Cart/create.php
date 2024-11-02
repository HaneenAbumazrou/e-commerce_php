<?php
require "./controller/user/Cart/CartController.php";


// Handle adding a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// dd((new Cart())->getItems());

  $product = [
    "id" => $_GET["product"],
    "quantity" => $_POST['quantity'],
  ];

  $cart = new Cart();
  $cart->addProduct($product);
  header("Location: /product?product_id=". $_GET["product"]);
  exit();
}
else {
  require "./views/pages/404.php";
}