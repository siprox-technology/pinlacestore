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
    <title>PinLace | Prices</title>
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
<!--Pricing Start-->
<section id="pricing-page" class="padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                <h2 class="heading darkcolor font-light2"><span class="font-weight-light">Best</span> Pricing
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="col-12 text-center">
                <div class="price-toggle-wrapper heading_space top30">
                    <span class="Pricing-toggle-button month active">Monthly</span>
                    <span class="Pricing-toggle-button year">Yearly</span>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme" id="price-slider">
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item wow fadeInUp animated sale top5" data-wow-delay="300ms" data-sale="60">
                        <h3 class="font-light darkcolor">Basic</h3>
                        <p class="bottom30">The standard version</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">$9.95</span> /<span class="pricing-duration">month</span></div>
                        <ul class="pricing-list">
                            <li>Support forum</li>
                            <li>Free hosting</li>
                            <li class="price-not">40MB of storage space</li>
                            <li class="price-not">Social media integration</li>
                            <li class="price-not">10GB of storage space</li>
                        </ul>
                        <a class="button" href="javascript:void(0)">Choose plan</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item sale wow fadeInUp animated top5" data-wow-delay="380ms" data-sale="40">
                        <h3 class="font-light darkcolor">Popular</h3>
                        <p class="bottom30">The standard version</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">$19.95</span> /<span class="pricing-duration">month</span></div>
                        <ul class="pricing-list">
                            <li>Support forum</li>
                            <li>Free hosting</li>
                            <li>40MB of storage space</li>
                            <li class="price-not">Social media integration</li>
                            <li class="price-not">10GB of storage space</li>
                        </ul>
                        <a class="button" href="javascript:void(0)">Choose plan</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item wow fadeInUp animated sale top5" data-wow-delay="460ms" data-sale="30">
                        <h3 class="font-light darkcolor">Enterprise</h3>
                        <p class="bottom30">The standard version</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">$29.95</span> /<span class="pricing-duration">month</span></div>
                        <ul class="pricing-list">
                            <li>Support forum</li>
                            <li>Free hosting</li>
                            <li>40MB of storage space</li>
                            <li>Social media integration</li>
                            <li class="price-not">10GB of storage space</li>
                        </ul>
                        <a class="button" href="javascript:void(0)">Choose plan</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-md-12">
                    <div class="pricing-item wow fadeInUp animated sale top5" data-wow-deeay="400ms" data-sale="20">
                        <h3 class="font-light darkcolor">Ultimate</h3>
                        <p class="bottom30">The standard version</p>
                        <div class="pricing-price darkcolor"><span class="pricing-currency">$49.95</span> /<span class="pricing-duration">month</span></div>
                        <ul class="pricing-list">
                            <li>Support forum</li>
                            <li>Free hosting</li>
                            <li>40MB of storage space</li>
                            <li>Social media integration</li>
                            <li>10GB of storage space</li>
                        </ul>
                        <a class="button" href="javascript:void(0)">Choose plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Pricing ends-->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>