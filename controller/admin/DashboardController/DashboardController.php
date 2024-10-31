<?php

require "./model/Admin.php";

require "./model/Order.php";
// require "./model/OrderItem.php";
// require "./model/User.php";
// require "./model/Product.php";


class DashboardController{

    public function where($query){
        $order = new Order();
        $order = $order->where($query);
        return $order;
    }

}
