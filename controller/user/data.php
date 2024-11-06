<?php 

require "./controller/admin/users/UserController.php";

$data = (new UserController)->where("SELECT * FROM users WHERE id= 1");



require "./views/data.php";