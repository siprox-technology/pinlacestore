<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Change password</title>
    <title>Trax | Account</title>
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
                            <p>Passwords must be between x and x characters and can include both characters and
                                numbers.
                            </p>
                        </div>
                    </div>
                    <!--edit user password -->
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                                <div class="row px-2 justify-content-center">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <!-- old pass -->
                                        <div class="form-group">
                                            <label for="oldPass" class="d-none"></label>
                                            <input class="form-control" id="oldPass" type="password"
                                                placeholder="Old password:" required name="oldPass" maxlength="20">
                                        </div>
                                        <!-- new pass -->
                                        <div class="form-group">
                                            <label for="newPass" class="d-none"></label>
                                            <input class="form-control" id="newPass" type="password"
                                                placeholder="New password:" required name="newPass">
                                        </div>
                                        <!-- retype new pass -->
                                        <div class="form-group">
                                            <label for="retypeNewPass" class="d-none"></label>
                                            <input class="form-control" id="retypeNewPass" type="password"
                                                placeholder="Retype new password:" required name="retypeNewPass">
                                        </div>
                                    </div>
                                    <!-- save button -->
                                    <div class="col-md-12 col-sm-12">
                                        <button id="save-new-pass-btn" class="button gradient-btn w-100">Save</button>
                                    </div>
                                    <!-- result label -->
                                    <label class="text-success mt-3" id="save-new-pass-result">success</label>
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