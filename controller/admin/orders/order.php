<?php 

require "./controller/admin/orders/OrderController.php";


$order = new OrderController();
$all_orders = $order->where("SELECT o.*, c.code
FROM orders o
LEFT JOIN coupons c ON o.coupon_id = c.id;
");
// $all_orders = $order->index();


// dd($all_orders);




require "./views/pages/admin/orders/orders.php";