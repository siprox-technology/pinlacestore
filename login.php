<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();

//redirect to profile if user already signed in
if(isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn']==true)
{
    header('location:user-profile.php');
}
/* error msgs status */
$wrong_credential = $db_error_msg = $formInvalid = "d-none";

if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'incorrectCredentials')
    {
        $wrong_credential = '';
    }
    if($GET['msg'] === 'serverError')
    {
        $db_error_msg = '';
    }
    if($GET['msg']==='invalidforminput')
    {
        $formInvalid = '';
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Login</title>
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
        <!-- error reporting -->
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $wrong_credential; ?>"> Email or Password incorrect!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $formInvalid; ?>">Invalid form inputes !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <!-- email password reset code results -->
        <p class="d-none" id='codeSendResult'></p>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Sign</span> In
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>Please login using your email address you registered with us as your username.</p>
                    </div>
                </div>
                <div class="col-lg-6 pr-lg-0 col-md-12 d-none d-lg-flex">
                    <div class=" image login-image">
                        <img src="images/login-section.jpg" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-0 col-md-12 whitebox">
                    <div class="widget logincontainer text-center text-lg-left h-100">
                        <h3 class="darkcolor bottom30 text-center text-lg-left" id='loginTitle'>Sign In </h3>
                        <form class="getin_form border-form" id="login" method="post" action="process.php">
                            <div class="row">
                            <!-- email -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="loginEmail" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="Email:" name="loginEmail" required id="loginEmail">
                                    </div>
                                </div>
                                <!-- password -->
                                <div class="col-md-12 col-sm-12" id="loginPass">
                                    <div class="form-group ">
                                        <label for="loginPass" class="d-none"></label>
                                        <input class="form-control" type="password" placeholder="Password:" name="loginPass" required>
                                    </div>
                                </div>
                                <input type="hidden" name="request_name" value="sign in">
                                <input type="hidden" id="_logInToken" name="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>">
                                <div class="col-sm-12">
                                    <button type="submit" class="button gradient-btn" id="loginBtn">Login</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-12 p-0 ">
                            <p class="top10 mb-0"> Don't have an account? &nbsp;<a href="register.php" class="defaultcolor">Sign Up Now</a> </p>
                            <a class=" defaultcolor">Forget password?</a>
                            <input type="checkbox" id="forgetPassCheckBox" class="ml-2">
                            <!-- send reset pass code btn -->
                            <button class="button top10gradient-btn d-none" id = "sendCodeBtn">Send Code</button>
                        </div>
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