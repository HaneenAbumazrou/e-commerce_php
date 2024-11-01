<?php

require "./controller/user/Search/SearchController.php";

if (isset($_GET['search'])) {
    $query = $_GET['search'];

    $product = new Product();

    $safeQuery = htmlspecialchars($query);

    // dd($safeQuery);
    $search = new SearchController();
    // $results = $search->where("SELECT * FROM products WHERE name LIKE '%$safeQuery%'");
    $results = $search->where("SELECT 
            p.*, 
            pi.path AS first_image
        FROM 
            products p
        LEFT JOIN 
            product_images pi ON p.id = pi.products_id
        WHERE 
            p.name LIKE '%$safeQuery%'
        GROUP BY 
            p.id
        HAVING 
            MIN(pi.id)
        ");





}





require "./views/pages/user/result.php";