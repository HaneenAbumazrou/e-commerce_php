<?php

function is_admin_404(){
  global $admin_routes;
  // dd($_SERVER["REQUEST_URI"]);
  // dd((in_array($_SERVER["REQUEST_URI"], $admin_routes)));
  return (in_array($_SERVER["REQUEST_URI"], $admin_routes));
}