<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PinLace | Contact preferences</title>
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
    <!-- contact preferences -->
    <section id="contact-pref-section" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms" style="visibility: visible;">
                <div class="row justify-content-center">
                    <a class="" href="user-profile.php"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact
                    </span>
                    Preferences
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-md-8 offset-md-2 bottom35 text-center">
                <p>
                Please tell us how you would like to be contacted.
                </p>
            </div>
            <!-- contact options -->
            <div class="form-group text-center" id="contact_pref_options">
                <p style="font-size:0.875rem" class="text-center">Contact Preferences: </p>
                <label><input class="m-1" type="radio" name="contactPref" value="0">SMS</label>
                <label><input class="m-1" type="radio" name="contactPref" value="1">Email</label>
                <label><input class="m-1" type="radio" name="contactPref" value="2">Phone</label>
            </div>
            <!-- result -->
            <div class="row justify-content-center mt-4">
                <div class="d-flex flex-column">
                    <button class="button btn-primary mb-sm-0 bottom15"id='update_contact_pref_btn' disabled>update</button>
                    <label class="text-success mt-3 float-center text-center d-none" id="save-contact-det-result"></label>
                </div>
            </div>

        </div>
    </section>
    <!--contact prefernces ends-->
    <input type="hidden" name="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];}?>" id="#_token">

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>