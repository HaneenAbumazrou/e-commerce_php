<?php

require "./controller/user/Search/SearchController.php";

if (isset($_GET['search'])) {
    $query = $_GET['search'];

    $product = new Product();

    $safeQuery = htmlspecialchars($query);

    // dd($safeQuery);
    $search = new SearchController();
    $results = $search->where("SELECT * FROM products WHERE name LIKE '%$safeQuery%'");



} else {
    echo "Please enter a search query.";
}





require "./views/pages/user/result.php";