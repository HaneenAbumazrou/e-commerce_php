<?php

require "./controller/user/Contact/ContactController.php";

$all_messages = (new ContactController)->index();


require "./views/pages/admin/messages/index.php";