<?php
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();


$data = [
    'brand'=>'All',
    'category' => 'All',
    'gender' => 'All',
    'size' => 'All',
    'color' => '%brown',
    'discount' => 'All',
    'orderBy' => 'Discount-highest'
];

require_once('models/Product.php');

$prod = new Product();

$result = $prod->filterProducts($data);

$x = 0;
?>

