<?php
require "./controller/user/Wishlist/WishlistController.php";

$wishlist = new WishlistController();
$wishlists = $wishlist->getWishlist();


// dd($wishlists);

require "./views/pages/user/wishlist.php";