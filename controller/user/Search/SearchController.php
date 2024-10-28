<?php
require "./model/Product.php"; 



class SearchController{


    public function where($query)  {
        $product = new Product();
        return $product->where($query);
    }
}



