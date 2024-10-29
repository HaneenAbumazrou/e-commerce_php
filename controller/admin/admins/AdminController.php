<?php

require "./model/Admin.php";

class AdminController {

  private $admin;

  function __construct(){
    
    $this->admin =  new Admin();
  }


  public function index(){
    $admins = $this->admin->where("SELECT * FROM admins");
    return $admins;
  }


  public function create($data){
    // dd($data);
  }


<<<<<<< Updated upstream
=======
  public function update($data, $id){
    $admin = new Admin();
    $admin->update($data, $id);
    $this->admin->create($data);

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

>>>>>>> Stashed changes
}