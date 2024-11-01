<?php
// session_start();
require "./controller/admin/login/LoginController.php";

// dd($_SESSION);
(new LoginController)->logout();
// dd($_SESSION);

header("Location: /admin/login");
die;