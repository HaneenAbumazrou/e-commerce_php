<?php

require_once "./controller/admin/categories/CategoryController.php";
$full_categories = (new CategoryController)->index();