<?php
session_start();


$adress1=[
    'address' => 'number 19 vg street',
    'city' => 'McLean',
    'state' => 'VA',
    'country' => 'USA',
    'postCode' => '22066',
    'FK_id'=>'65'
];
$data = [
    'id'=>'65',
    'number'=>'2'
];
    
require_once('models/User.php');

$user = new User();
$x = $user->removeAddress($data);

echo 'hi';

?>