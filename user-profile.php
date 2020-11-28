<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
//redirect to home page if user not signed in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false)
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Account</title>
    <?php 
    include_once 'inc/head.php' 
    ?>
</head>

<body id="profile_body">
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
    <!-- User account details -->
    <section id="user-account-section" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Account</span>
                    Details
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="row ">
                <div class="details-box mt-2">
                
                    <div class="row">
                        <!-- My details -->
                        <div class="col-lg-4 col-md-6">
                            <a href="edit-acc-details.php">
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-user"
                                                aria-hidden="true"></i>
                                        </span>
                                        <h3 class="bottom0">My details</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Change pass -->
                        <div class="col-lg-4 col-md-6" id="test">
                            <a href="change-pass.php">
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-lock"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Change password</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address -->
                        <div class="col-lg-4 col-md-6">
                            <a href="address.php">
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address details</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- order history -->
                        <div class="col-lg-4 col-md-6">
                            <a href="order-history.php">
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-list-alt"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Order history</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- contact preferences -->
                        <div class="col-lg-4 col-md-6">
                            <a href="contact-pref.php">
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor">
                                            <i class="fa fa-reply-all" aria-hidden="true"></i>
                                            </i></span>
                                        <h3 class="bottom0">Contact preferences</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="d-none" id="current_user_email"><?php echo $_SESSION['email']?></p>
        </div>
    </section>

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>