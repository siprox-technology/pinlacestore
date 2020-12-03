<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();  
/* error msgs status */
$acc_exist_error = $db_error_msg = $formInvalid = "d-none";
/* success msg */
$userAddSuccess = "d-none";

 if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'useraddedsuccess')
    {
        $userAddSuccess = '';
    }
    if($GET['msg'] === 'forminvalid')
    {
        $formInvalid = '';
    }
    if($GET['msg'] === 'databasefailed')
    {
        $db_error_msg = '';
    }
    if($GET['msg'] === 'userexist')
    {
        $acc_exist_error = '';
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Register</title>
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
    <section id="register-user" class="bglight position-relative padding">
    <!-- error reporting -->
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $acc_exist_error; ?>"> User with this email address already exist!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $formInvalid; ?>">Please check form fields !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
    <!-- success reporting -->
        <p id="notification" class="text-center text-success border border-success border-rounded <?php echo $userAddSuccess; ?>">Your account has been created. Please check your email to verify your account.<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom40 darkcolor font-light2"><span class="font-normal">Sign</span> Up
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>Please fill out this form to create an account with us</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 pr-lg-0 whitebox m-auto">
                    <div class="widget logincontainer">
                        <h3 class="darkcolor bottom35 text-center text-md-left">Create Your account </h3>
                        <form class="getin_form border-form" id="register" action="process.php" method="post">
                            <div class="row">
                                <!-- name -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="name" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="Name:" name="name" required>
                                    </div>
                                </div>
                                <!-- last name -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="lastName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="Last Name:" name="lastName" required >
                                    </div>
                                </div>
                                <!-- email -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="email" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="Email:" name="email" required >
                                    </div>
                                </div>
                                <!-- phone -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="phone" class="d-none"></label>
                                        <input class="form-control" type="tell" placeholder="Phone:"
                                             name="phone" required>
                                    </div>
                                </div>
                                <!-- password -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="pass" class='d-none'></label>
                                        <input class="form-control" id="password2"type="password" placeholder="Password:" name="password"required validate>
                                    </div>
                                </div>
                                <!-- retype password -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group ">
                                        <label for="passConfirm" class="d-none"></label>
                                        <input class="form-control" id="password" type="password" placeholder="Confirm Password:" name="passConfirm"required>
                                    </div>
                                </div>
                                <!-- contact preferences -->
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group text-center">
                                        <label for="contactPref" class="d-none"></label>
                                        <p style="font-size:0.875rem" class="text-center">Contact Preferences: </p>
                                        <label><input class="m-1" type="radio"name="contactPref" value="0">SMS</label>
                                        <label><input class="m-1" type="radio"name="contactPref" value="1">Email</label>
                                        <label><input class="m-1" type="radio"name="contactPref" value="2">Phone</label>
                                    </div>
                                </div>   
                                <input type="hidden" name="request_name" value="register user">
                                <input type="hidden" id="_logInToken" name="_token" value="<?php echo $_SESSION['_token'];?>">
                                <!-- register btn -->              
                                <div class="col-sm-12">
                                    <button type="submit" id="reg_btn" class="button gradient-btn w-100">Register</button>
                                    <p class="top20 log-meta text-center"> Already have an account? &nbsp;<a href="login.php" class="defaultcolor">Sign In</a> </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>