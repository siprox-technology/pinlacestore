
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
                                    <th class="darkcolor">Status</th>                                    
                                    <th class="darkcolor">Payment method</th>
                                    <th class="darkcolor">Payment reference</th>
                                    <th class="darkcolor"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4 id="order_number" class="default-color text-center">63</h4>
                                    </td>
                                    <td class="text-center">
                                        <h4 id="order_total_price" class="default-color text-center">$325.99</h4>
                                    </td>
                                    <td>
                                        <h4 id="order_submit_date" class="default-color text-center">27/02/2020</h4>                                   
                                    <td>
                                        <h4 id="order_payment_status" class="text-success text-center">Complete</h4>                                    
                                    </td>
                                    <td>
                                        <h4 id="order_payment_method" class="default-color text-center">Debit ***4567</h4>
                                    </td>
                                    <td>
                                        <h4 id ="order_payment_reference"class="default-color text-center">36457281</h4>
                                    </td>
                                    <td>
                                        <button type="button" id="order_details_btn" value="" class="button btn-primary mt-3">Details</button>                                    
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h4 id="order_number" class="default-color text-center">63</h4>
                                    </td>
                                    <td class="text-center">
                                        <h4 id="order_total_price" class="default-color text-center">$325.99</h4>
                                    </td>
                                    <td>
                                        <h4 id="order_submit_date" class="default-color text-center">27/02/2020</h4>                                    </td>
                                    <td>
                                        <h4 id="order_payment_status" class="text-danger text-center">Pending</h4>                                    </td>
                                    </td>
                                    <td>
                                        <h4 id="order_payment_method" class="default-color text-center">Debit ***4567</h4>
                                    </td>
                                    <td>
                                        <h4 id ="order_payment_reference"class="default-color text-center">36457281</h4>
                                    </td>
                                    <td>
                                        <button type="button" id="order_details_btn" value="" class="button btn-primary mt-3">Details</button>                                    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--wish list ends-->
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>