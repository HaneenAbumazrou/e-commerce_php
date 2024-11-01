<?php
  if(!isset($_SESSION["admin"])) {
    header("Location: /admin/login");
    die;
  }
require "./model/Coupon.php";

class CouponController {

  private $coupon;

  function __construct(){
    $this->coupon = new Coupon();
  }


  public function index(){
    return $this->coupon->where("SELECT * FROM coupons ORDER BY status");
  }

  public function create($data){
    $this->coupon->create($data);
  }

  public function find($pk){
    return $this->coupon->find($pk);
  }

  public function update($data, $pk){
    $this->coupon->update($data, $pk);
  }



}