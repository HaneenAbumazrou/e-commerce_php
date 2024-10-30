<?php 

require "./model/Admin.php";

class LoginController{

    public function where($query){
        $admin = new Admin();
        $admin = $admin->where($query);
        return $admin;
        
    }
    
}