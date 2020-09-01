<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Addresses</title>
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

    <!-- Addresses details -->
    <section id="user-account-section" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Manage</span>
                 Address Book
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-md-8 offset-md-2 bottom35 text-center">
                <p>You can manage and add up to six addresses.
                </p>
            </div>
            <div class="row ">
                <div class="details-box mt-2">
                    <div class="row">
                        <!-- address 1 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 1</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 2 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 2</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 3 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 3</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 4 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 4</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 5 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 5</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 6 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 6</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Addresses details ends -->
    <?php  
    include_once 'inc/edit-address.php';
    include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>