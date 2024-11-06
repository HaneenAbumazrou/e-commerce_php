<?php

require "./controller/admin/users/UserController.php";

// $orders = (new UserController)->where("SELECT * FROM orders WHERE user_id=" . $_SESSION['user']['user_id']);
$orders = (new UserController)->where("SELECT 
    o.*,
    c.code,
    c.discount_percentage,
    COUNT(oi.id) AS item_count
    FROM 
        orders o
    LEFT JOIN 
        coupons c ON o.coupon_id = c.id
    LEFT JOIN 
        order_items oi ON oi.order_id = o.id
    WHERE 
        o.user_id = " . $_SESSION['user']['user_id'] ."
    GROUP BY 
        o.id
");


require "./views/pages/user/user-profile.php";