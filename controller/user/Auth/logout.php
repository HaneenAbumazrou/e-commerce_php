<?php
require './controller/user/Auth/AuthController.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
  (new AuthController)->logout();

  header("Location: /");
  die;
}
else {
  require "./views/pages/404.php";
}