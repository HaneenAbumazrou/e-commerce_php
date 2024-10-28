<?php

require "./controller/admin/coupons/CouponController.php";

$all_coupons = (new CouponController)->index();

require "./views/pages/admin/coupons/index.php";