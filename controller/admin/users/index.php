<?php
require_once "./function/is_admin_auth.php";

require "./controller/admin/users/UserController.php";


$all_users = (new UserController())->where("SELECT * FROM users");


require "./views/pages/admin/users/index.php";