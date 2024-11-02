<?php
require "./model/Address.php"; 

class CheckoutController{

    public function create($data){
        return (new Address())->create($data);
    }
}
