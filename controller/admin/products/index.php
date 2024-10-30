<?php
session_start();

require "./controller/admin/products/ProductController.php";

require "./controller/admin/categories/CategoryController.php";



$all_products = (new ProductController())->index();
$all_categories = (new CategoryController())->index();







require "./views/pages/admin/products/index.php";
