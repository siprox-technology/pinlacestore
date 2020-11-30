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
    <title>Trax | Home</title>
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
    <!--Page Header ends -->
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
                <!-- products -->
                <div id="bestSellingProducts" class="row">

                </div>   

            </div>
        </div>
    </section>
    <!--Shopping ends-->
    <!-- Counters -->
    <section class="padding bg-shop-quote parallax">
        <div class="overlay overlay-dark opacity-6 z-index-0"></div>
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-8 offset-2">
                    <div class="quote-wrapper">
                        <h3>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper, luctus
                            pulvinar, hendrerit id, lorem.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters ends-->
    <!--Trending Items in shop-->
    <section class="padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn" data-wow-delay="300ms">
                    <h2 class="heading bottom30 darkcolor font-light2"><span class="font-normal">Trending</span> Items
                        <span class="divider-center"></span>
                    </h2>
                    <div class="col-md-8 offset-md-2 heading_space">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A dolores explicabo laudantium,
                            omnis provident quam reiciendis voluptatum?</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="30">
                            <img src="images/shop-3.jpg" alt="shop">
                            <div class="overlay primary center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">Blue Shoe</a></h4>
                            <p>We offer the most complete in the country</p>
                            <h4 class="price-product">$230.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="500ms">
                    <div class="shopping-box bottom30">
                        <div class="image">
                            <img src="images/shop-4.jpg" alt="shop">
                            <div class="overlay danger center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">Red Shoe</a></h4>
                            <p>We offer the most complete in the country</p>
                            <h4 class="price-product">$230.00</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 wow fadeIn" data-wow-delay="600ms">
                    <div class="shopping-box bottom30">
                        <div class="image sale" data-sale="20">
                            <img src="images/shop-2.jpg" alt="shop">
                            <div class="overlay primary center-block">
                                <a class="opens" href="shop-cart.html" title="Add To Cart"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                        <div class="shop-content text-center">
                            <h4 class="darkcolor"><a href="shop-detail.html">Light Weigh Shoe</a></h4>
                            <p>We offer the most complete in the country</p>
                            <h4 class="price-product">$230.00</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="_token" id="_token" value="<?php echo $_SESSION['_token'];?>">
   <?php 
        include_once 'inc/footer.php';
        include_once 'inc/scripts.php'
    ?>

     <script>
        displayBestSelling();
     </script>
</body>

</html>