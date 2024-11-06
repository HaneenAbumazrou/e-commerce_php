<?php

require "./model/User.php";



class UserController {

  private $user;

  function __constuct(){
    $this->user = new User();
  }

  public function all(){
    return $this->user->all();
  }

  public function where($query){
    return (new User())->where($query);
  }

  public function find($pk){
    return (new User())->find($pk);
  }


}


