<?php

require_once "./controller/user/Cart/CartController.php";

$cartItemsNum = count((new Cart)->getItems());