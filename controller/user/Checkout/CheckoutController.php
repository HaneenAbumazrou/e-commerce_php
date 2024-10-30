<?php
require "./model/Address.php"; 

class CheckoutController{
    public function create($data){
        $address = new Address();
        $address->create($data);
    }
}

        