<?php

function is_login(){
  return (basename($_SERVER["REQUEST_URI"]) == "login") ? true : false ;
}