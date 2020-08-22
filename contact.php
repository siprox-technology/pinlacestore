<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Trax | Contact</title>
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

    <!-- Contact US -->
    <section id="stayconnect1" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="widget py-5">
                <div class="row">
                    <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                        <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Contact</span>
                            Us
                            <span class="divider-center"></span>
                        </h2>
                        <div class="col-md-8 offset-md-2 bottom35">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium,
                                omnis provident quam reiciendis voluptatum?</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 order-sm-2">
                        <div class="contact-meta px-2 text-center text-md-left">
                            <div class="heading-title">
                                <span class="defaultcolor mb-3">Trax Agency Worldwide</span>
                                <h2 class="darkcolor font-normal mb-4"><span class="d-none d-md-inline-block">Our</span>
                                    Agency Office <span class="d-none d-md-inline-block">In London</span></h2>
                            </div>
                            <p class="bottom10">Address: 309, New Cavendish St, EC1Y 3WK</p>
                            <p class="bottom10">0800 214 5252</p>
                            <p class="bottom10"><a href="mailto:polpo@traxagency.co.au">polpo@traxagency.co.au</a></p>
                            <p class="bottom10">Mon-Fri: 9am-5pm</p>
                            <ul class="social-icons mt-4 mb-4 mb-sm-0 wow fadeInUp" data-wow-delay="300ms">
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                                <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i> </a> </li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                                <li><a href="javascript:void(0)"><i class="fab fa-whatsapp"></i> </a> </li>
                                <li><a href="javascript:void(0)"><i class="far fa-envelope"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="heading-title  wow fadeInUp" data-wow-delay="300ms">
                            <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                                <div class="row px-2">
                                    <div class="col-md-12 col-sm-12" id="result1"></div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="name1" class="d-none"></label>
                                            <input class="form-control" id="name1" type="text" placeholder="Name:"
                                                required name="userName">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="email" id="email1" placeholder="Email:"
                                                name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="message1" class="d-none"></label>
                                            <textarea class="form-control" id="message1" placeholder="Message:" required
                                                name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" id="submit_btn1"
                                            class="button gradient-btn w-100">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="fas fa-mobile-alt"></i></span>
                            <p class="bottom0"><a href="tel:+14046000396">+14046000396</a></p>
                            <p class="d-block"><a href="tel:+43720778972">+43720778972</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="fas fa-map-marker-alt"></i></span>
                            <p class="bottom0">123 Street NYC , USA </p>
                            <p class="d-block">123 Street New Yolo , Austria </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="far fa-envelope"></i></span>
                            <p class="bottom0"><a href="mailto:admin@website.com">admin@website.com</a></p>
                            <p class="d-block"><a href="mailto:email@website.com">email@website.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget text-center top60 w-100">
                        <div class="contact-box">
                            <span class="icon-contact defaultcolor"><i class="far fa-clock"></i></span>
                            <p class="bottom15">UTC−05:00 <span class="d-block">UTC+01:00</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact US ends -->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>