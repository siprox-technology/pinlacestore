
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
                                    <th class="darkcolor p-2">Order ID</th>
                                    <th class="darkcolor p-2">Total Price</th>
                                    <th class="darkcolor p-2">Date</th>                                 
                                    <th class="darkcolor p-2">Payment method</th>
                                    <th class="darkcolor p-2">Payment reference</th> 
                                    <th class="darkcolor p-2">Status</th>  
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
    <!-- order details modal -->

    <!-- The order details Modal -->
    <div class="modal fade" id="order_details_modal">
        <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header px-3 m-auto">
                <h3 class="heading darkcolor font-light2">Order number : 
                <span class="font-normal" id='order_id'></span>
                    <span class="divider-center" style="width:90%"></span>
                </h3>
            </div>

            <!-- Modal body -->
                <div class="modal-body mx-3 pt-0 pb-4" id="order_items">
                    <!-- items and prices-->
                </div>
            </div>
        </div>
    </div>
<?php
include_once 'inc/stripe-modal.php'; 
include_once 'inc/footer.php';
include_once 'inc/scripts.php'
?>
<script>getAllOrders()</script>
</body>

</html>