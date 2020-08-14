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
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Account</span>
                    Details
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="row ">
                <div class="user-account-det-box mt-2">

                    <div class="row">
                        <!-- My details -->
                        <div class="col-lg-4 col-md-6">
                            <a href="edit-acc-details.php">
                                <div class="user-account-det-box text-center w-100 det-box">
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
                                <div class="user-account-det-box text-center w-100 det-box">
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
                            <div class="user-account-det-box text-center w-100 det-box">
                                <div class="contact-box">
                                    <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                            aria-hidden="true"></i></span>
                                    <h3 class="bottom0">Address details</h3>
                                </div>
                            </div>
                        </div>
                        <!-- wish list -->
                        <div class="col-lg-4 col-md-6">
                            <div class="user-account-det-box text-center w-100 det-box">
                                <div class="contact-box">
                                    <span class="icon-contact defaultcolor"><i class="fa fa-heart"
                                            aria-hidden="true"></i></span>
                                    <h3 class="bottom0">Wish list</h3>
                                </div>
                            </div>
                        </div>
                        <!-- order history -->
                        <div class="col-lg-4 col-md-6">
                            <div class="user-account-det-box text-center w-100 det-box">
                                <div class="contact-box">
                                    <span class="icon-contact defaultcolor"><i class="fa fa-list-alt"
                                            aria-hidden="true"></i></span>
                                    <h3 class="bottom0">Order history</h3>
                                </div>
                            </div>
                        </div>
                        <!-- contact preferences -->
                        <div class="col-lg-4 col-md-6">
                            <div class="user-account-det-box text-center w-100 det-box">
                                <div class="contact-box">
                                    <span class="icon-contact defaultcolor">
                                        <i class="fa fa-reply-all" aria-hidden="true"></i>
                                        </i></span>
                                    <h3 class="bottom0">Contact preferences</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
   <!-- Addresses details ends -->
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>