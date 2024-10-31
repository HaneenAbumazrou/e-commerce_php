<?php 

require "./model/Admin.php";

class LoginController{

    public function where($query){
        $admin = new Admin();
        $admin = $admin->where($query);
        return $admin;
        
    }

    public function getAdminByEmail($email) {
        $admin = new Admin();
        $query = "SELECT * FROM admins WHERE email = '$email'";
        $result = $admin->where($query); 
        
        return $result ? $result[0] : null;
    }
    
}