<?php 

require_once ('models/Order.php');

$newMail = new Order();

$t = $newMail->getOrders(68);

$x = 0;