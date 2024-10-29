<?php 

require "./controller/admin/orders/OrderController.php";


$order = new OrderController();
$all_orders = $order->index();





require "./views/pages/admin/orders/orders.php";