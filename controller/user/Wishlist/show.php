<?php
require "./controller/user/Wishlist/WishlistController.php";

$wishlist = new WishlistController();
$wishlists = $wishlist->getWishlist();




require "./views/pages/user/wishlist.php";