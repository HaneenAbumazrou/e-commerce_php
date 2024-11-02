<?php
if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit;
}

require "./model/Address.php"; 

class CheckoutController{

    public function create($data){
        return (new Address())->create($data);
    }
}
