<?php 

require_once ('models/Order.php');

$newMail = new Order();

$t = $newMail->getOrderDetails(228);

$x = 0;