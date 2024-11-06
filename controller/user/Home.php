<?php

require "./model/Product.php";
require "./model/Category.php";

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
ORDER BY RAND()
LIMIT 8;
";

$home_products = (new Product())->where($query);

$query1 = "SELECT id, name, image, image_path 
FROM categories
ORDER BY RAND()
LIMIT 16;
";

$home_categories = (new Category())->where($query1);

require "./views/pages/user/index.php";