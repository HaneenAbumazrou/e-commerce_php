<?php
require "./controller/user/Checkout/CheckoutController.php";
require "./controller/user/Cart/CartController.php";
require "./controller/admin/products/ProductController.php";
require_once "./model/Address.php";
require_once "./model/Order.php";
require_once "./model/OrderItem.php";

$cities = [
  "Amman",
  "Zarqa",
  "Irbid",
  "Aqaba",
  "Mafraq",
  "Jerash",
  "Madaba",
  "Salt",
  "Ajloun",
  "Ma'an",
  "Tafila",
  "Karak",
  
];

function validation($data, $cities){

  $result = true;

  if(!$data["first_name"]){
    $result = false;
    $_SESSION["checkout_errors"]["first_name_error"] = "The first name field is required.";
  }

  if(!$data["last_name"]){
    $result = false;
    $_SESSION["checkout_errors"]["last_name_error"] = "The last name field is required.";
  }

  if(!$data["city"] || strtolower($data["city"]) == "select"){
    $result = false;
    $_SESSION["checkout_errors"]["city_error"] = "The city field is required.";
  }
  // elseif(!in_array($data["city"], $cities)) {
  //   $result = false;
  //   $_SESSION["checkout_errors"]["city_error"] = "The city must be in Jordan.";
  // }


  if(!$data["address"]){
    $result = false;
    $_SESSION["checkout_errors"]["address_error"] = "The address field is required.";
  }

  if(!$data["appartment"]){
    $result = false;
    $_SESSION["checkout_errors"]["appartment_error"] = "The appartment field is required.";
  }

  if(!$data["phone"]){
    $result = false;
    $_SESSION["checkout_errors"]["phone_error"] = "The phone field is required.";
  }

  if(!$data["email"]){
    $result = false;
    $_SESSION["checkout_errors"]["email_error"] = "The email field is required.";
  }



  return $result;
}



/**
 * trim()
 * htmlspecialchars()
 * strip_tags()
 */
function clean($data){
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = strip_tags($data);

  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){


  if(validation($_POST, $cities)){

    $_POST["first_name"] = clean($_POST["first_name"]);
    $_POST["last_name"] = clean($_POST["last_name"]);
    $_POST["city"] = clean($_POST["city"]);
    $_POST["address"] = clean($_POST["address"]);
    $_POST["appartment"] = clean($_POST["appartment"]);
    $_POST["phone"] = clean($_POST["phone"]);
    $_POST["email"] = clean($_POST["email"]);


    $total_amount = $_SESSION["total_amount"] ?? $_SESSION["price_before_coupon"];

      $order_id = (new Order())->create([
      "user_id" => $_SESSION["user"]["user_id"],
      "coupon_id" => @$_SESSION["coupon"][0]['id'] ?? 0,
      "status" => 'pending',
      "original_price" => $_SESSION["price_before_coupon"],
      "total_amount" => $total_amount +3,
    ]);




    // add to addresses table
    (new Address)->create([
      "user_id" => $_SESSION["user"]["user_id"],
      "city" => $_POST["city"],
      "address" => $_POST["address"],
      "is_default" => false,
    ]);






    $count = 0;
    foreach((new Cart)->getItems() as $item){
      $price = (new Product)->where("SELECT price, stock_quantity from products WHERE id = ".$item['id']);

      (new OrderItem)->create([
        'order_id' => $order_id,
        'product_id' => $item['id'],
        'quantity' => $item['quantity'],
        'price' => $price[0]['price'] * $item['quantity'],
      ]);

      (new Product())->update([
        'stock_quantity'=> $price[0]['stock_quantity'] -$item['quantity']
      ], $item['id']);

      (new Cart)->removeProduct($count);
      $count++;
    }

    header("Location: /user/order/checkout/success");
    exit;
  }

}
else {
  if(!count((new Cart())->getItems())){
    header("Location: /user/cart");
    exit;
  }
}



require "./views/pages/user/checkout.php";
unset($_SESSION['checkout_errors']);