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
    <title>PinLace | Home</title>
<?php 
    include_once 'inc/head.php';
    //check cookies accepted
    if(isset($_COOKIE["accepted-user"]))
    {
        if($_COOKIE["accepted-user"] != $_SERVER['REMOTE_ADDR'])
        {
            setcookie("accepted-user",$_SERVER['REMOTE_ADDR']);
            include_once 'inc/cookie-alert.php';
        }
    }
    else {
        setcookie("accepted-user",$_SERVER['REMOTE_ADDR']);
        include_once 'inc/cookie-alert.php';
    }
?>
</head>

<body id ="body">
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
    <!--Page Header-->
    <section id="main-banner-page" class="position-relative page-header shop-header section-nav-smooth parallax">
        <div class="overlay overlay-dark opacity-6 z-index-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="page-titles whitecolor text-center padding_top padding_bottom">
                        <h2 class="font-xlight">Get out</h2>
                        <h2 class="font-bold">THERE</h2>
                        <h2 class="font-xlight">ENJOY</h2>
                        <h3 class="font-light pt-2">Best Multipurpose and Running footwear</h3>
                    </div>
                </div>
            </div>
            <div class="gradient-bg title-wrap">
                <div class="row">
                    <div class="col-lg-12 col-md-12 whitecolor">
                        <h3 class="float-left">Shop</h3>
                        <ul class="breadcrumb top10 bottom10 float-right">
                            <li class="breadcrumb-item hover-light"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item hover-light">Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--best selling items-->
    <section id="our-shop" class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2">Our <span class="font-normal">Best selling</span>
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>Select from variety of best selling running and general purpose walking shoes.</p>
                    </div>
                </div>
                <!-- products-->
                <div id="bestSellingProducts" class="row w-100 m-auto">

                </div>   

            </div>
        </div>
    </section>
    <!-- Ladies shoes header-->
    <section id="our-feature" class="single-feature padding">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
                    <div class="heading-title mb-4">
                        <h2 class="darkcolor font-normal bottom30">Lets take your <span class="defaultcolor">Exercise</span> to Next Level</h2>
                    </div>
                    <p class="bottom35 defaultcolor">We have a collection of running and working shoes for ladies. </p>
                    <p class="bottom35">These Ladies Trainers have been developed with a 
                        cushioned insole and padded ankle collar for great comfort, 
                        whilst the textured rubber outsole promotes greater traction 
                        and the foam midsole helps absorb the impact of each step you take.</p>
                    <a target="_blank" href="products.php?brand=All&category=All&gender=Female" class="button btnsecondary gradient-btn mb-sm-0 mb-4">Learn More</a>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                    <div class="image"><img alt="SEO" src="images/sd-xmas-p4-ladies-767x450.webp"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters -->
    <section class="padding bg-shop-quote parallax">
        <div class="overlay overlay-dark opacity-6 z-index-0"></div>
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-md-8 offset-2">
                        <div class="quote-wrapper">
                            <h3>WE OFFER UNIQUE SELECTION OF FOOTWEAR WITH ATTRACTIVE PRICES FOR DIFFERENT STYLES AND TASTES</h3>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--working boots-->
    <section class="padding" id="working-shoes">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Working</span> Footwear and Boots
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>The Mens Safety Boots are great for the workplace, 
                        designed with an slip resistant outsole with an acid and oil resistant finish, 
                        teamed with a steel toe cap for extra protection. </p>
                        <a target="_blank" href="products.php?brand=All&amp;category=Boots&amp;gender=All" class="button btnsecondary gradient-btn mb-sm-0 mb-4">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="50">
                            <img src="images/img-list/3/182779-thumb.jpg" alt="shop">
                                <div class="overlay center-block">
                                    <a class="w-100 h-100" href="product-details.php?k=182779"></a>
                                </div>
                            </div>
                        <div class="shop-content text-center">
                            <h4 class="arkcolor">
                                <a href="product-details.php?k=182779">GELERT</a>
                            </h4>
                            <p>Leather Mens Walking Boots</p>
                            <h4 class="price-product">64.99</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;"><div class="shopping-box bottom30"><div class="image sale" data-sale="25"><img src="images/img-list/6/118066-thumb.jpg" alt="shop"><div class="overlay center-block"><a class="w-100 h-100" href="product-details.php?k=118066"></a></div></div><div class="shop-content text-center"><h4 class="arkcolor"><a href="product-details.php?k=118066">FIRETRAP</a></h4><p>Rhino Boots</p><h4 class="price-product">89.99</h4></div></div></div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;"><div class="shopping-box bottom30"><div class="image sale" data-sale="75"><img src="images/img-list/1/182076-thumb.jpg" alt="shop"><div class="overlay center-block"><a class="w-100 h-100" href="product-details.php?k=182076"></a></div></div><div class="shop-content text-center"><h4 class="arkcolor"><a href="product-details.php?k=182076">KARRIMOR</a></h4><p>Blencathra Mens Walking Boots</p><h4 class="price-product">119.99</h4></div></div></div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeIn;"><div class="shopping-box bottom30"><div class="image sale" data-sale="50"><img src="images/img-list/2/118287-thumb.jpg" alt="shop"><div class="overlay center-block"><a class="w-100 h-100" href="product-details.php?k=118287"></a></div></div><div class="shop-content text-center"><h4 class="arkcolor"><a href="product-details.php?k=118287">FLYER</a></h4><p>Doolittle Boots Mens</p><h4 class="price-product">109.99</h4></div></div></div>            </div>
        </div>
    </section>

    <!-- mens shoes -->
    <section id="mens-feature" class="single-feature padding">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-7 text-sm-left text-center wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
                    <div class="heading-title mb-4">
                        <h2 class="darkcolor font-normal bottom30">Great performance<span class="defaultcolor"> Comes</span> here</h2>
                    </div>
                    <p class="bottom35 defaultcolor">We have a collection of running and working shoes for Gents. </p>
                    <p class="bottom35">Start clocking miles in these lightweight running shoes. 
                        On the treadmill or the streets, 
                        they add comfort to each step with soft cushioning. 
                        The supportive trainers have an airy material-mix upper and a midfoot cage 
                        for extra support.</p>
                    <a target="_blank" href="products.php?brand=All&amp;category=All&amp;gender=Male" class="button btnsecondary gradient-btn mb-sm-0 mb-4">Learn More</a>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInRight;">
                    <div class="image"><img src="images/nike-shield-mens-1410x574.webp"></div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="_token" id="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];}?>">
   <?php 
        include_once 'inc/footer.php';
        include_once 'inc/scripts.php'
    ?>
 
     <script>
        displayBestSelling();
     </script>
</body>

</html>