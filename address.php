<?php
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
/* error msgs status */
 $addressExist = $formInvalid =$db_error_msg= $noAddressToRemove = "d-none";
/* success msg */
 $addressAddSuccess ="d-none";
//redirect to home page if user not signed in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false)
{
    header('location:index.php');
}

if(isset ($_GET['msg'])){
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
    if($GET['msg'] === 'addressaddsuccess')
    {
        $addressAddSuccess = '';
    }
    if($GET['msg'] === 'addressexist')
    {
        $addressExist = '';
    }
    if($GET['msg'] === 'databasefailed')
    {
        $db_error_msg = '';
    }
    if($GET['msg'] === 'forminvalid')
    {
        $formInvalid = '';
    }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Addresses</title>
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
        <!-- error reporting -->
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $addressExist; ?>"> Address already added. Please remove it to add new one!<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $db_error_msg; ?>">Something wrong with the server. PLease try again later !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <p id="notification" class="text-center text-danger border border-danger border-rounded <?php echo $formInvalid; ?>">Please check form fields !<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <!-- success reporting -->
        <p id="notification" class="text-center text-success border border-success border-rounded <?php echo $addressAddSuccess; ?>">New address saved.<i class="fa fa-times ml-3" aria-hidden="true"></i></p>
        <!-- back arrow to user profile home page -->
        <div class="row justify-content-center">
            <a class="" href="user-profile.php"><i class="fas fa-arrow-left"></i></a>
        </div>
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
                            <a data-toggle="modal" data-target="#editAddressModal1">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 1</h3>
                                        <?php                                      
                                            if(isset($_SESSION['address1']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address1']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }                                  
                                        ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 2 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal2">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 2</h3>
                                        <p class="text-center">
                                        <?php
                                            if(isset($_SESSION['address2']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address2']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }  
                                        ?>
                                        </p>                                    
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 3 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal3">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 3</h3>
                                        <p class="text-center">
                                        <?php
                                            if(isset($_SESSION['address3']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address3']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }  
                                        ?>
                                        </p>                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 4 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal4">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 4</h3>
                                        <p class="text-center">
                                        <?php
                                            if(isset($_SESSION['address4']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address4']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }  
                                        ?>
                                        </p>    
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 5 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal5">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 5</h3>
                                        <p class="text-center">
                                        <?php
                                            if(isset($_SESSION['address5']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address5']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }  
                                        ?>
                                        </p>    
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- address 6 -->
                        <div class="col-lg-4 col-md-6">
                            <a data-toggle="modal" data-target="#editAddressModal6">                        
                                <div class="details-box text-center w-100 det-box">
                                    <div class="contact-box">
                                        <span class="icon-contact defaultcolor"><i class="fa fa-home"
                                                aria-hidden="true"></i></span>
                                        <h3 class="bottom0">Address 6</h3>
                                        <p class="text-center">
                                        <?php
                                            if(isset($_SESSION['address6']))
                                            {
                                                echo  "<p class='text-center'>". $_SESSION['address6']['address']."</p>";
                                            }
                                            else
                                            {
                                                echo "<p class='text-center'>...</p>";
                                            }  
                                        ?>
                                        </p>    
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