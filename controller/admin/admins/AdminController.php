<?php

require "./model/Admin.php";

class AdminController {

  // private $admin;

  // function __construct(){
    
  //   $this->admin =  new Admin();
  // }


  public function index(){
    $admin = new Admin();
    $admins = $admin->where("SELECT * FROM admins WHERE role = 'admin'");
    return $admins;
  }


  public function create($data){
        $admin = new Admin();
        
        // // Hash the password
        // $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        // // Remove password confirmation from the data
        // unset($data['password_confirmation']);
        
        // // Use the Admin model to create an entry in the database
        $admin->create($data);
    }

  public function find($id){
    $admin = new Admin();
    $admin = $admin->find($id);
    return $admin;  
  }


  public function update($data, $id){
    $admin = new Admin();
    $admin->update($data, $id);
  }

  public function where($query){
    $admin = new Admin();
    $admins = $admin->where($query);
    return $admins;
  }

  public function delete($id){
    $admin = new Admin();
    $admin->delete($id);
  }

}