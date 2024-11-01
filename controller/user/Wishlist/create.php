<?php
require "./controller/user/Wishlist/WishlistController.php";


$wishlist = new WishlistController();

if ($_SERVER["REQUEST_METHOD"] = "POST"){


  $wishlist->addToWishlist($_GET["product"]);


}




require "./views/pages/user/wishlist.php";