<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Login</title>
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
    <section id="sign-in" class="bglight position-relative padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Sign</span> In
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                    </div>
                </div>
                <div class="col-lg-6 pr-lg-0 col-md-12 d-none d-lg-flex">
                    <div class=" image login-image h-100">
                        <img src="images/login-section.jpg" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-0 col-md-12 whitebox"><!-- login form HERE -->
                    <div class="widget logincontainer">
                        <h3 class="darkcolor bottom30 text-center text-lg-left">Sign In </h3>
                        <form class="getin_form border-form" id="login">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginEmail" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="Email:" required id="loginEmail">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom35">
                                        <label for="loginPass" class="d-none"></label>
                                        <input class="form-control" type="password" placeholder="Password:" required id="loginPass">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group bottom30 ml-1">
                                        <div class="form-check text-left">
                                            <input class="form-check-input" checked type="checkbox" value="" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">
                                                Keep Me Signed In
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="button gradient-btn">Login</button>
                                    <a href="forget-password.html" class="ml-2 defaultcolor">Forget password?</a>
                                    <p class="top30 mb-0"> Don't have an account? &nbsp;<a href="register.html" class="defaultcolor">Sign Up Now</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign-in ends -->


    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>