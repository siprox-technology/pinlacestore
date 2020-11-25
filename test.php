<?php 

require_once('models/Review.php');

$x = new Review();

$c = $x->getReviews('94144');

$z = 0;