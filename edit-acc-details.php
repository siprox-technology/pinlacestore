<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
/* error msgs status */
$noaccounttoupdate = $db_error_msg = $formInvalid = "d-none";
/* success msg */
$userUpdatesuccess = "d-none";
//redirect to home page if user not signed in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false)
{
    header('location:index.php');
}

if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'userupdatesuccess')
    {
        $userUpdatesuccess = '';
    }
    if($GET['msg'] === 'forminvalid')
    {
        $formInvalid = '';
    }
    if($GET['msg'] === 'databasefailed')
    {
        $db_error_msg = '';
    }
    if($GET['msg'] === 'noaccounttoupdate')
    {
        $noaccounttoupdate = '';
    }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Edit account</title>
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

    <!-- edit account details -->
    <section id="edit-account" class="bglight position-relative padding noshadow">
        <!-- error reporting -->
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $noaccounttoupdate; ?>"> Unable to update account !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $formInvalid; ?>">Please check form fields !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
    <!-- success reporting -->
        <p id="notification" class="text-center text-success border border-success border-rounded <?php echo $userUpdatesuccess; ?>">Your account has been updated.<i class="fa fa-times ml-3" aria-hidden="true"></i></p>

        <div class="container whitebox">
            <div class="widget py-5">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Edit account
                            </span>
                            Details
                            <span class="divider-center"></span>
                        </h2>
                        <div class="col-md-8 offset-md-2 bottom35">
                            <p>Change you personal details.</p>
                        </div>
                    </div>
                    <!-- edit user personal details -->
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" method='post' action='process.php' id="edit_user_details">
                                <div class="row px-2 justify-content-center">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <!-- name -->
                                        <div class="form-group">
                                            <label for="name" class="">Name:</label>
                                            <input class="form-control" id="name" type="text" placeholder="Name:"
                                                required name="name" value="<?php echo $_SESSION['name'] ?>">
                                        </div>
                                        <!-- last name -->
                                        <div class="form-group">
                                            <label for="lastName" class="">Last Name:</label>
                                            <input class="form-control" id="lastName" type="text"
                                                placeholder="Last Name:" required name="lastName"value="<?php echo $_SESSION['lastName'] ?>" >
                                        </div>
                                        <!-- phone -->
                                        <div class="form-group">
                                            <label for="phone" class="">Phone:</label>
                                            <input class="form-control" id="phone" type="tell" placeholder="Phone:"
                                                required name="phone" value="<?php echo $_SESSION['phone'] ?>">
                                        </div>
                                    </div>
                                    <!-- account verified status and resend verification email -->
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="" >Account status:</label>
                                            <label  class="<?php echo ($_SESSION['act_code'])>0?'text-danger':'text-success'; ?>"
                                            id= "<?php echo ($_SESSION['act_code'])>0?'resend_verify_email':' ' ?>">
                                            <?php echo ($_SESSION['act_code'])>0?'Not Verified-Resend confirmation email?':'Verified'; ?> </label>
                                            <input type="hidden" id="_token" name='_token' value='<?php echo $_SESSION['_token'] ?>'>
                                            <input type="hidden" name='request_name' value='edit account details'>
                                        </div>
                                    </div>
                                    <!-- save button -->
                                    <div class="col-md-12 col-sm-12">
                                        <button id="save-pers-det-btn" class="button gradient-btn w-100">Save</button>
                                    </div>
                                    <!-- resend email result label -->
                                    <label class="text-success mt-3 d-none" id="resend_verify_email_res"></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
    <!-- edit account details ends -->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>