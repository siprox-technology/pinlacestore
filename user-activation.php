<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
require_once('lib/validate.php');
/* error msg status */
$acc_exist_error = $server_error= "d-none";
/* success msg */
$account_active_success = "d-none";
/* new validation */
$val = new Validate();

 if($_SERVER['REQUEST_METHOD']=='GET'
 && isset ($_GET['email']) 
 && isset($_GET['code'])
 ){

    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    $GET['email'] = $val->validateEmail($GET['email']);
    $GET['code'] = $val->validateDigits($GET['code']);
    if(($GET['email']) && ($GET['code']))
    {
        // activate account
        try{
            require_once ('models/User.php');
            $newUser = new User();
            if($newUser->activateUser($_GET['code'],$_GET['email']))
            {
                $account_active_success = '';
                //if user is logged in set act_code in session to activated i.e. 0
                if((isset($_SESSION['loggedIn'])) && ($_SESSION['loggedIn']))
                {
                    $_SESSION['act_code'] = 0;
                }

            }
            else
            {
                $acc_exist_error = '';
            }
        }
        catch(Exception $e)
        {
            $server_error= '';
        }
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Activation Result</title>
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom40 darkcolor font-light2"><span class="font-normal">Activation</span> Result
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <h3 class="text-success <?php echo $account_active_success ?>">Your account is activated.</h3>
                        <h3  class="text-danger <?php echo $acc_exist_error ?>">This account was activated before or does not exist.</h3>
                        <h3  class="text-danger <?php echo $server_error ?>">Something wrong with server. Please try activation link later.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>