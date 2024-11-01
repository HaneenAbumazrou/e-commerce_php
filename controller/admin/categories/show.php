<?php

require_once "./controller/admin/categories/CategoryController.php";
require_once "./controller/admin/products/ProductController.php";
require_once "./controller/admin/products/ProductController.php";



if(isset($_GET["category"]) && $_GET["category"] != null){

  $category = (new CategoryController)->where("SELECT * FROM categories WHERE name='$_GET[category]'");


  $query = "SELECT
      p.*, 
      pi.path AS first_image
    FROM 
      products p
    LEFT JOIN 
      product_images pi ON p.id = pi.products_id
    WHERE 
      pi.id = (
          SELECT MIN(id) 
          FROM product_images 
          WHERE products_id = p.id
      )
      AND 
      p.category_id = " . $category[0]['id'];

  $products = (new ProductController)->where($query);


// dd($products);

  if(!$category){
    require "./views/pages/404.php";
    die;
  }

}
else{
  require "./views/pages/404.php";
  die;
}





require "./views/pages/user/category.php";