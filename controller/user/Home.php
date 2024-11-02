<?php

require "./model/Product.php";

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
LIMIT 16;
";

$home_products = (new Product())->where($query);


require "./views/pages/user/index.php";