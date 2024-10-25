<?php

require "./model/Admin.php";

$admin = new Admin();
$admins = $admin->where("SELECT * FROM admins");


// dd($admins);


require "./views/pages/admin/admins/index.php";