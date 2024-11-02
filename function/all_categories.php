<?php

require_once "./model/Category.php";
$full_categories = (new Category)->where("SELECT * FROM categories");