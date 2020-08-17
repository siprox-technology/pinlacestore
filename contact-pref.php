<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Contact preferences</title>
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
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact</span>
                 preferences
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-md-8 offset-md-2 bottom35 text-center">
                <p>
                Please tell us how you would like to be contacted.
                </p>
            </div>
            <div class="owl-carousel owl-theme" id="contact-pref-slider">
                <div class="item">
                    <div class="col-md-12">
                        <div class="details-box text-center w-100 det-box" id="contact-item" data-wow-delay="300ms" data-sale="60">
                            <h3 class="font-light darkcolor">SMS</h3>
                            <p class="bottom30">The standard version</p>
                            <input class="form-check-input m-0" type="checkbox" value="" id="sms-option">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-md-12">
                        <div class="details-box text-center w-100 det-box" id="contact-item" data-wow-delay="380ms" data-sale="40">
                            <h3 class="font-light darkcolor">EMAIL</h3>
                            <p class="bottom30">The standard version</p>
                            <input class="form-check-input m-0" type="checkbox" value="" id="email-option"                          </div>
                       </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-md-12">
                        <div class="details-box text-center w-100 det-box" id="contact-item" data-wow-delay="460ms" data-sale="30">
                            <h3 class="font-light darkcolor">PHONE</h3>
                            <p class="bottom30">The standard version</p>
                            <input class="form-check-input m-0" type="checkbox" value="" id="phone-option">
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-2">
                <!-- result label -->
                <label class="text-success mt-3 float-center" id="save-contact-det-result">success</label>
            </div>
        </div>
    </section>
    <!--contact prefernces ends-->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>