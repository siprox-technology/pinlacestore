<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
/* error msgs status */
 $db_error_msg = $formUnvalid =$oldPassWrong=$noAccount= "d-none";
/* success msg */
$passChangeSuccess = "d-none";
//redirect to home page if user not signed in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false)
{
    header('location:index.php');
}

if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'changepasssuccess')
    {
        $passChangeSuccess = '';
    }
    if($GET['msg'] === 'formunvalid')
    {
        $formUnvalid = '';
    }
    if($GET['msg'] === 'databasefailed')
    {
        $db_error_msg = '';
    }
    if($GET['msg'] === 'oldpasswrong')
    {
        $oldPassWrong = '';
    }
    if($GET['msg'] === 'noaccounttoupdate')
    {
        $noAccount = '';
    }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Change password</title>
    <?php 
    include_once 'inc/head.php' 
    ?>
</head>

<body  id="profile_body">
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

    <!-- Change password -->
    <section id="change-pass" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="widget py-5">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Change
                            </span>
                            Password
                            <span class="divider-center"></span>
                        </h2>
                        <div class="col-md-8 offset-md-2 bottom35">
                            <!-- error reporting -->
                            <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
                            <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $formUnvalid; ?>">Please check form fields !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
                            <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $oldPassWrong; ?>">Old password incorrect!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
                            <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $noAccount; ?>">No Account to update!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>

                        <!-- success reporting -->
                            <p id="notification" class="text-center text-success border border-success border-rounded <?php echo $passChangeSuccess; ?>">Your password has been updated.<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
                        </div>
                    </div>
                    <!--edit user password -->
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" method="post" action='process.php'>
                                <div class="row px-2 justify-content-center">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <!-- old pass -->
                                        <div class="form-group">
                                            <label for="oldPass" class="pl-0">Current Password:</label>
                                            <input class="form-control" id="oldPass" type="password"
                                                placeholder="" required name="oldPass" maxlength="20">
                                        </div>
                                        <!-- new pass -->
                                        <div class="form-group">
                                            <label for="newPass" class="pl-0">New Password:</label>
                                            <input class="form-control" id="newPass" type="password"
                                                placeholder="" required name="newPass">
                                        </div>
                                        <!-- retype new pass -->
                                        <div class="form-group">
                                            <label for="retypeNewPass" class="pl-0">Confirm New Password:</label>
                                            <input class="form-control" id="retypeNewPass" type="password"
                                                placeholder="" required name="retypeNewPass">
                                        </div>
                                    </div>
                                    <input type="hidden" id="_token" name='_token' value='<?php echo $_SESSION['_token'] ?>'>
                                    <input type="hidden" name='request_name' value='change user password'>
                                    <!-- save button -->
                                    <div class="col-md-12 col-sm-12">
                                        <button id="save-new-pass-btn" class="button gradient-btn w-100">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Change passwordends -->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>