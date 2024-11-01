<?php

require "./controller/user/Contact/ContactController.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
  if(isset($_GET["message_id"]) && $_GET["message_id"] != null){

  $message = (new ContactController)->find($_GET["message_id"]);

    if(!$message){
      header("Location: /admin/messages");
      die;
    }
    else {
      (new ContactController)->update(
        ["admin_id"=>$_SESSION["admin"]["id"], "status"=>true],
        $message["id"]
      );
    }


  }
  else{
    require "./views/pages/admin/404.php";
    die;
  }

}


require "./views/pages/admin/messages/show.php";