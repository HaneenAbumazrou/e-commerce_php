<?php

require_once "./controller/admin/products/ProductController.php"
;



if(isset($_GET["product_id"]) && $_GET["product_id"] != null){

  $product = (new ProductController)->where("SELECT * FROM products WHERE id='$_GET[product_id]'");
  $product_images = (new ProductController)->where("SELECT * FROM product_images WHERE products_id='$_GET[product_id]'");

  
  $query = "SELECT p.*, pi.path
    FROM products p
    LEFT JOIN product_images pi 
        ON p.id = pi.products_id
        AND pi.id = (
            SELECT id 
            FROM product_images 
            WHERE products_id = p.id 
            ORDER BY created_at ASC 
            LIMIT 1
        )
    WHERE p.id != $_GET[product_id]
    AND p.category_id = {$product[0]['category_id']}
    ORDER BY p.id
    LIMIT 4
    ";


  $relates = (new ProductController)->where($query);



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