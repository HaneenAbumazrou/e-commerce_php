<?php
require "./controller/user/Cart/CartController.php";
require "./model/Product.php";


// Handle adding a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $qtn = (new Product())->select($_GET["product"], '=', 'stock_quantity');
  if($qtn['stock_quantity'] < $_POST['quantity']){
    $_SESSION['cart_errors']['qtn_error'] = "You cann't add over stock quantity.";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }


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