<?php 

require_once('models/Payments.php');

$x = new Payment();

$c = $x->gen_uuid();

$z = 0;