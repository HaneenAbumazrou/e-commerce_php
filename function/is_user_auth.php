<?php

function is_user_auth(){
  return (isset($_SESSION["user"]))? true : false;
}