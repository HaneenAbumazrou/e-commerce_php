<?php 


require "./model/Order.php";


class OrderController
{
    public function index()
    {
        $order = new Order();
        $order = $order->where("SELECT * FROM orders");
        return $order;
    }


    public function find($id){
        $order = new Order();
        $order = $order->find($id);
        return $order;  
      }


      public function where($query){
        $order = new Order();
        $order = $order->where($query);
        return $order;
      }
}