<?php 

include_once('models/Product.php');

$x = new Product();

$c = $x->getBestSellingProducts();

$n = 0;