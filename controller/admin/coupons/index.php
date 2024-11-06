<?php
require_once "./function/is_admin_auth.php";

require "./controller/admin/coupons/CouponController.php";

$all_coupons = (new CouponController)->index();

require "./views/pages/admin/coupons/index.php";