<?php 

require_once ('models/Order.php');

$newMail = new Order();

$t = $newMail->deletePendingOrders();

$x = 0;