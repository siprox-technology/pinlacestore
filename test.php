<?php



require_once('models/Order.php');

$order = new Order();

$x = $order->updateOrder_Payment_status(76);
$c = 0;

?>