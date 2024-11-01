<?php

require_once "./controller/admin/products/ProductController.php";



if(isset($_GET["product_id"]) && $_GET["product_id"] != null){

  $product = (new ProductController)->where("SELECT * FROM products WHERE id='$_GET[product_id]'");
  $product_images = (new ProductController)->where("SELECT * FROM product_images WHERE products_id='$_GET[product_id]'");


  if(!$product){
    require "./views/pages/404.php";
    die;
  }

}
else{
  require "./views/pages/404.php";
  die;
}





require "./views/pages/user/product.php";