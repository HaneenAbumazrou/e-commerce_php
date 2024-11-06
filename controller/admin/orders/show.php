<?php
require_once "./function/is_admin_auth.php";

require "./controller/admin/orders/OrderController.php";

$orderModel = new OrderController();

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $order = $orderModel->find($order_id);


    // Query to get product names for a specific order_id



    if ($order) {
        $order_id = $order['id'];
        $user_id = $order['user_id'];
        $status = $order['status'];
        // $products = $order_products;
        $created_at = date("d-m-Y", strtotime($order['created_at']));
        $original_price = $order['original_price'];
        $total_amount = $order['total_amount'];

        // coupon---------------------------------------------------------------------
        $coupon_id = $order['coupon_id'];
        $couponQuery = "SELECT discount_percentage FROM coupons WHERE id = $coupon_id";
        $coupon = $orderModel->where($couponQuery);
        $discount_percentage = $coupon[0]['discount_percentage'] ?? 0;
        $discount_amount = ($original_price * $discount_percentage) / 100;
        $new_price = $original_price - $discount_amount;
        // coupon---------------------------------------------------------------------


        //address---------------------------------------------------------------------
        $addressQuery = "
            SELECT CONCAT(city, ', ', address) AS full_address
            FROM addresses
            WHERE user_id = $user_id
            LIMIT 1
        ";
        $userAddressResult = $orderModel->where($addressQuery);
        $userAddress = $userAddressResult[0]['full_address'] ?? 'No address found';
        //address---------------------------------------------------------------------


        //products---------------------------------------------------------------------
        // Get product details for the order
        $productDetailsQuery = "
            SELECT products.id AS product_id,
            products.name AS product_name, 
            products.description, 
            order_items.quantity AS qtn, 
            products.price
            FROM products
            JOIN order_items ON products.id = order_items.product_id
            WHERE order_items.order_id = $order_id
        ";
        $productDetails = $orderModel->where($productDetailsQuery);
        // $product_id = $productDetails[0]['product_id'];
        //products---------------------------------------------------------------------



        if (isset($order['coupon_id']) && !empty($order['coupon_id'])) {
            $couponQuery = "SELECT code FROM coupons WHERE id = " . intval($order['coupon_id']);
            $couponResult = $orderModel->where($couponQuery);

            // Ensure $couponResult is not empty and get the coupon code
            $coupon_code = !empty($couponResult) ? $couponResult[0]['code'] : 'No coupon applied';
        } else {
            $coupon_code = 'No coupon applied';
        }
    } else {
        echo "Order not found.";
        exit;
    }
} else {
    require "./views/pages/404.php";
    exit;
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    (new Order)->update($_POST, $_GET["id"]);
    header("refresh: 0.1");
}



require "./views/pages/admin/orders/show.php";
