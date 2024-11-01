<?php

function is_admin_auth(){
  if(!isset($_SESSION["admin"])) {
    header("Location: /admin/login");
    die;
  }
}

is_admin_auth();