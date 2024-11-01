<?php

require "./model/Message.php";

class ContactController {

  private $msg;

  function __construct(){
    $this->msg = new Message();
  }

  public function index(){
    return $this->msg->where("SELECT * FROM messages");
  }


  public function create($data){
    $this->msg->create($data);
  }


  public function update($data,$pk){
    return $this->msg->update($data, $pk);
  }

  public function find($pk){
    return $this->msg->find($pk);
  }

}