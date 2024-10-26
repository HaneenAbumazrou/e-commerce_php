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


}