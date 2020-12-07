<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();

/* error msgs status */
$NoAccToUpdate = $db_error_msg = $formInvalid =$codeInvalid= "d-none";
/* success msg */
$resetPassSucces = "d-none";

if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'codeinvalid')
    {
        $codeInvalid = '';
    }
    if($GET['msg'] === 'dberror')
    {
        $db_error_msg = '';
    }
    if($GET['msg'] === 'noaccounttoupdate')
    {
        $NoAccToUpdate = '';
    }
    if($GET['msg'] === 'updatepasssuccess')
    {
        $resetPassSucces = '';
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Forget Password</title>
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
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $codeInvalid; ?>">Reset code invalid!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $NoAccToUpdate; ?>"> No Account to update!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <!-- success reporting -->
        <p id="notification" class="text-center text-success border border-success border-rounded <?php echo $resetPassSucces; ?>">Your password has been reset successfully.<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading bottom40 darkcolor font-light2">Reset<span class="font-normal"> Password</span>
                    <span class="divider-center"></span>
                </h2>
                <div class="col-md-8 offset-md-2 heading_space">
                    <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium, omnis provident quam reiciendis voluptatum?</p>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-10 offset-sm-1 whitebox">
                <div class="widget logincontainer shadow text-center text-md-left">
                    <h3 class="darkcolor bottom35">Reset Password </h3>
                    <form class="getin_form border-form" id="ResetPassword" method='post' action="process.php">
                            <div class="col-md-12 col-sm-12">
                                <!-- code -->
                                <div class="form-group ">
                                    <label  class=" pl-0">Code:</label>
                                    <input class="form-control" name="resetCode" required id="resetCode" autocomplete="off">
                                </div>
                                <!-- new pass -->
                                <div class="form-group ">
                                    <label class=" pl-0">New Password:</label>
                                    <input class="form-control" name="newPass"  required id="resetNewPass" autocomplete="off">
                                </div>
                                <!-- confirm new pass -->
                                <div class="form-group ">
                                    <label class=" pl-0">Confirm New Password:</label>
                                    <input class="form-control" name="reNewPass" required id="resetReNewPass" autocomplete="off">
                                </div>
                                <input type="hidden" name="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];}?>">
                                <input type="hidden" name="request_name" value="reset user password">
                            </div>
                            <div class="col-sm-12 forget-buttons">
                                <button type="submit" class="button btn-primary" id = 'reset_pass_btn'>Reset</button>
                                <button type="button" class="button btn-dark ml-2">Cancel</button>
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