
<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
?><!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Order history</title>
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
            <a class="" href="user-profile.php"><i class="fas fa-arrow-left"></i></a>
        </div>
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Order</span>
                    history
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12 cart_table wow fadeInUp details-box" data-wow-delay="300ms">
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="order-history">
                            <thead>
                                <tr>
                                    <th class="darkcolor">Order ID</th>
                                    <th class="darkcolor">Total Price</th>
                                    <th class="darkcolor">Date</th>                                 
                                    <th class="darkcolor">Payment method</th>
                                    <th class="darkcolor">Payment reference</th> 
                                    <th class="darkcolor"></th>
                                    <th class="darkcolor">Status</th>  
                                </tr>
                            </thead>
                            <tbody id = "order_history">
                            <!-- order information goes here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">

    <!--wish list ends-->
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
    <script>getAllOrders()</script>
</body>

</html>