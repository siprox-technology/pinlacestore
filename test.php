<?php
/* session_start();


$adress1=[
    'address' => 'number 19 vg street',
    'city' => 'McLean',
    'state' => 'VA',
    'country' => 'USA',
    'postCode' => '22066',
    'FK_id'=>'65'
];
    
require_once('models/User.php');

$user = new User();
$x = $user->addAddress($adress1); */

$POST['number'] = (($_POST['number']>0) && ($_POST['number']<7))==true?$_POST['number']:false;


echo '';


?>