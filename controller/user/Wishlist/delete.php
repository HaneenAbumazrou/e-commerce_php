<?php
require "./controller/user/Wishlist/WishlistController.php";



if($_SERVER["REQUEST_METHOD"] == "POST"){
  $wishlist = new WishlistController();

  // dd(isset($_GET["product"]));

  if (isset($_GET["product"])) {
    $wishlist->delete($_GET["product"]);
  }

  
  header("Location: /user/wishlist");
  exit;


} else {
  require "./views/pages/404.php";
}