
<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
if(count($_GET)<1)
{
    header('location:index.php');
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Order confirmation</title>
    <?php 
    include_once 'inc/head.php' 
    ?>
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    <?php 
    include_once 'inc/header.php' 
    ?>
    <!--order history -->
    <section id="order-history-section" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Payment</span>
                    result
                    <span class="divider-center"></span>
                </h2>
            </div>

            <!-- payment result -->
            <div class="row justify-content-center justify-content-sm-end border border-dark">
                <div class="col-9">
                    <div class="row justify-content-center justify-content-sm-start">
                        <h4 class="darkcolor p-3 ">Payment status:</h4>
                        <h4 class="p-3 text-center <?php if(isset($_GET['status']))echo ($_GET['status'])=='payment success'?'text-success':'text-danger'?>">
                        <?php if(isset($_GET['status']))echo $_GET['status']?></h4>
                    </div>
                    <div class="row justify-content-center justify-content-sm-start">
                        <h4 class="darkcolor p-3">Payment reference:</h4>
                        <h4 class=" p-3 defaultcolor"><?php if(isset($_GET['tid']))echo $_GET['tid'] ?></h4> 
                    </div>
                    <div class="row justify-content-center justify-content-sm-start">
                        <h4 class="darkcolor p-3">Amount:</h4>
                        <h4 class=" p-3 defaultcolor">$ <?php if(isset($_GET['amount']))echo $_GET['amount'] ?></h4> 
                    </div>
                    <div class="row justify-content-center justify-content-sm-start">
                        <h4 class="darkcolor p-3">Payment method:</h4>
                        <h4 class=" p-3 defaultcolor"><?php if(isset($_GET['payment_method']))echo $_GET['payment_method'] ?>
                        ****<?php if(isset($_GET['last_4']))echo $_GET['last_4'] ?> </h4> 
                    </div>
                    <div class="row justify-content-center justify-content-sm-start">
                        <h4 class="darkcolor p-3">Order number:</h4>
                        <h4 class=" p-3 defaultcolor"><?php if(isset($_GET['order_id']))echo $_GET['order_id'] ?></h4> 
                    </div>               
                </div>
            </div>

            <!-- navigation -->
            <div class="row justify-content-between ml-auto mt-3 mb-3">
                <a class="mr-2" href="products.php"><i class="fas fa-arrow-left"></i></a>
                <a class="mr-auto" href="products.php">Continue shopping</a>

                <a class="" href="order-history.php">Orders history</a>
                <a class="ml-2" href="order-history.php"><i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!--wish list ends-->
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>