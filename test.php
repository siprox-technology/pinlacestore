<?php
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();




require_once('models/Product.php');

$prod = new Product();

$result = $prod->getProductDetails("181004");

for($i=0; $i<count($result[2]);$i++){
    echo $result[2][$i]."<br>";
}
?>

