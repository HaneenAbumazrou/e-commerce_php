<?php

require "./controller/admin/orders/OrderController.php";
require "./controller/admin/users/UserController.php";

// check if id exsits and correct.
if ($_SERVER["REQUEST_METHOD"] == "GET") {



  $order = (new OrderController)->find($_GET["order_id"]);
  if (isset($_GET["order_id"]) && $_GET["order_id"] != null) {


    if (!$order) {
      // header("Location: /admin/orders");
      die;
    } else {
      $order = (new UserController)->where("SELECT 
        o.id AS order_id,
        o.user_id AS order_user_id,
        o.coupon_id AS order_coupon_id,
        o.total_amount AS total_amount,
        o.status AS order_status,
        o.created_at AS order_created_at,
        o.updated_at AS order_updated_at,
        
        oi.id AS order_item_id,
        oi.order_id AS order_item_order_id,
        oi.product_id AS order_item_product_id,
        oi.quantity AS order_item_quantity,
        oi.price AS order_item_price,
        oi.created_at AS order_item_created_at,
        oi.updated_at AS order_item_updated_at,
        
        c.id AS coupon_id,
        c.code AS coupon_code,
        c.discount_percentage AS coupon_discount_percentage,
        c.created_at AS coupon_created_at,
        c.updated_at AS coupon_updated_at
        FROM 
            orders o
        LEFT JOIN 
            order_items oi ON oi.order_id = o.id
        LEFT JOIN 
            coupons c ON o.coupon_id = c.id
        WHERE 
            o.id = " . $_GET["order_id"])[0];






      $order_items = (new UserController)->where("SELECT
        p.*,
        pi.path AS first_image_path,
        oi.quantity
        FROM 
            order_items oi
        JOIN 
            products p ON oi.product_id = p.id
        LEFT JOIN 
            product_images pi ON pi.products_id = p.id 
              AND pi.id = (
                  SELECT id 
                  FROM product_images 
                  WHERE products_id = p.id 
                  ORDER BY created_at ASC 
                  LIMIT 1
              )
        WHERE 
        oi.order_id = " . $order['order_id']);




$statuses = [
    0 => 'pending',
    1 => 'in-preparation',
    2 => 'in-delivery',
    3 => 'completed',
  ];



}
  } else {
    require "./views/pages/404.php";
    die;
  }
}



require "./views/pages/user/order.php";
