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
    <title>Trax | Edit account</title>
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

    <!-- edit account details -->
    <section id="edit-account" class="bglight position-relative padding noshadow">
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
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                                <div class="row px-2 justify-content-center">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <!-- name -->
                                        <div class="form-group">
                                            <label for="name" class="d-none"></label>
                                            <input class="form-control" id="name" type="text" placeholder="Name:"
                                                required name="Name" value="<?php echo $_SESSION['name'] ?>">
                                        </div>
                                        <!-- last name -->
                                        <div class="form-group">
                                            <label for="lastName" class="d-none"></label>
                                            <input class="form-control" id="lastName" type="text"
                                                placeholder="Last Name:" required name="lastName"value="<?php echo $_SESSION['lastName'] ?>" >
                                        </div>
                                        <!-- phone -->
                                        <div class="form-group">
                                            <label for="phone" class="d-none"></label>
                                            <input class="form-control" id="phone" type="tell" placeholder="Phone:"
                                                required name="phone" pattern="[0-9]{11}"value="<?php echo $_SESSION['phone'] ?>">
                                        </div>
                                    </div>
                                    <!-- account verified status -->
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="" >Account status:</label>
                                            <label for="" class="<?php echo ($_SESSION['act_code'])>0?'text-danger':'text-success'; ?>"><?php echo ($_SESSION['act_code'])>0?'Not Verified':'Verified'; ?> </label>
                                        <!-- here resend confirmation email -->
                                        </div>
                                    </div>
                                    <!-- save button -->
                                    <div class="col-md-12 col-sm-12">
                                        <button id="save-pers-det-btn" class="button gradient-btn w-100">Save</button>
                                    </div>
                                    <!-- result label -->
                                    <label class="text-success mt-3" id="save-pers-det-result">success</label>
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