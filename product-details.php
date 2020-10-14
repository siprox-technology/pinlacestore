<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
// if product code is not set or not valid
// go back to products.php
require_once('lib/validate.php');
$validate = new Validate();
if((!isset($_GET['k']))||(($validate->validateDigits($_GET['k']))==false))
{
    header('location:products.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trax | Product Details</title>
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
<!-- image zoom -->
<div class="img-galary-zoom d-none" id="img-galary-zoom"></div>
<div class="gallary-zoom d-none" id="gallary-zoom">
    <div class="w-100 h-100 text-center d-flex flex-row justify-content-center" id="close">
        <i class="far fa-times-circle align-self-center"></i>
    </div>
    <div id="product-gallary-zoom" class="carousel slide w-100" data-ride="imgListZoom">
        <div class="carousel-inner text-center" id="imgListZoom">

        </div>
        <a class="carousel-control-prev " href="#product-gallary-zoom" data-slide="prev">
            <i class="fas fa-angle-left" id="product-galary-icons"></i>
        </a>
        <a class="carousel-control-next" href="#product-gallary-zoom" data-slide="next">
            <i class="fas fa-angle-right" id="product-galary-icons"></i>
        </a>
    </div>
    <div class="w-100 h-100" id="close"></div>
</div>


<!--PreLoader Ends-->
<!-- header -->
<?php 
include_once 'inc/header.php' 
?>
<!-- header -->
<!-- Gallery Details -->

<section id="gallery-detail" class=" padding_bottom_half">
    <div class="container">
        <!-- nav to all products -->
        <div class="row justify-content-start ml-auto">
            <a class="" href="products.php"><i class="fas fa-arrow-left"></i></a>
            <a class="ml-2" href="products.php">Back to all products</a>
        </div>
        <!-- product images and info -->
        <div class="row">
            <!-- image gallary -->
            <div class="col-md-5 top5" >
                <div class="product-img-item shadow">
                    <div class="product-desc text-center text-md-left p-1">
                        <!-- image gallary -->
                        <div id="product-gallary-images" class="carousel slide w-100" data-ride="imgList">
                            <!-- The slideshow -->
                            <div class="carousel-inner text-center" id="imgList">
                            <!-- images goes here -->
                            </div>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev " href="#product-gallary-images" data-slide="prev">
                                <i class="fas fa-angle-left text-dark" id="product-galary-icons"></i>
                            </a>
                            <a class="carousel-control-next" href="#product-gallary-images" data-slide="next">
                                <i class="fas fa-angle-right text-dark" id="product-galary-icons"></i>
                            </a>
                        </div>
                        <!-- zoom -->
                        <div class="col-12 text-center mt-5">
                            <i class="fas fa-search-plus" id='zoom-icon'></i>
                        </div>
                        <!-- add to cart -->
                        <div class="row mt-5">
                            <div class="col-md-8 mt-1 mb-4">
                                <div class="quote">
                                    <label for="quantity" class="d-none"></label>
                                    <a href="" class="btn-common gradient-btn">wish list <i class="fas fa-star"></i></a>
                                    <a href="" class="btn-common gradient-btn">Add to Cart <i class="fa fa-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product description -->
            <div class="col-md-7 top5" >
                <div class="product-img-item shadow">
                    <div class="product-desc text-center text-md-left p-1">
                        <div class="col-12">
                            <!-- brand -->
                            <h2 class="heading darkcolor font-light2 bottom15" id="brand-name"></h2>
                            <!-- rating -->
                            <span class="text-warning heading">
                                <a href="#." class="hover-underline" title="4.4">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>&nbsp;
                                    <span class="text-grey"><span class="font-bold">4.4 </span>(21)</span>
                                </a>
                            </span>
                            <!-- Name -->
                            <h4 class="text-capitalize font-normal text-left  mt-3" id="gallary-name"></h4>
                            <!-- price and discount -->
                            <h3 class="mt-3" id="price-discount-list"></h3>
                            <!-- color names -->
                            <h3 class="text-center text-dark mt-5">Colors:</h3>
                            <div class="mt-3 row justify-content-center">
                                <div id="product-colors-list">
                                </div> 
                            </div>
                            <h4 class="text-center mt-2 text-capitalize font-normal" id="product-colors-name"></h4> 
                            <!-- sizes -->
                            <div class="text-center text-dark mt-4">
                                <h3>Sizes:</h3>
                            </div>
                            <div class="row mt-3 justify-content-center" id="product-sizes-list">
                                <!-- available sizes goes here -->
                            </div>
                        </div>
                    </div>    
                </div>        
            </div>
        </div>
        <!-- comments ratings and description and reviews -->
        <div class="row">
            <div class="col-md-12 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                <div class="tab-to-accordion heading_space">
                    <ul class="tabset-list flex-column flex-md-row">
                        <li class="active"><a href="#tab1">Description</a></li>
                        <li class=""><a href="#tab2">Returns</a></li>
                        <li class=""><a href="#tab3">Review</a></li>
                        <li class=""><a href="#tab4">Delivery information</a></li>
                    </ul>
                    <div class="tab-container p-4">
                        <!-- description -->
                        <div class="accordion-item active"><a href="#tab1">Description</a></div><div id="tab1" style="display: none;">
                            <p class="pb-3" id="product-description">
                            </p>
                            <!-- product id -->
                            <h4 class="pb-3" id="product-number"></h4>
                        </div>
                        <!-- returns -->
                        <div class="accordion-item "><a href="#tab2">Description</a></div><div id="tab2" style="display: none;">
                            <ul style="list-style: disc;" class="pl-3 mb-3">
                                <li>
                                    <p class="my-1"><span class="font-light">If you need to return any item to us, please send it back to us within 14 days of receipt of the order (unless faulty).</span></p>
                                </li>
                                <li>
                                    <p class="my-1"><span class="font-light">It's important that any items returned to us, unless faulty, are returned in a re-saleable condition. We would like this to mean that you've kept all original packaging and labels, and that it's unused.</span></p>
                                </li>
                                <li>
                                    <p class="my-1"><span class="font-light">We would recommend that you return your items via registered post (you will need to pay for delivery which is non-refundable unless faulty).</span> </p>
                                </li>
                                <li>
                                    <p class="my-1"><span class="font-light">All over the World.</span> </p>
                                </li>
                                <li>
                                    <p class="mt-1 bottom10"><span class="font-light">For more information, view our full<a class="nav-link font-bold" href="return.php"> Returns and Exchanges information</a></span></p>
                                </li>
                            </ul>
                        </div>
                        <!-- reviews -->
                        <div class="accordion-item "><a href="#tab3">Review</a></div><div id="tab3" style="">
                            <div class="profile_bg bottom30">
                                <div class="profile">
                                    <div class="p_pic"><img src="" alt="instructure"></div>
                                    <div class="profile_text">
                                        <h5><strong>JOHN PARKER</strong> - <span>Awesome Quality</span></h5>
                                        <ul class="comment">
                                            <li><a href="javascript:void(0)" class="text-warning-hvr"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-alt"></i></a></li>
                                        </ul>
                                        <p>Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="profile_bg bottom30">
                                <div class="profile">
                                    <div class="p_pic"><img src="" alt="instructure"></div>
                                    <div class="profile_text">
                                        <h5><strong>JANE MILLER</strong> - <span>Awesome Quality</span></h5>
                                        <ul class="comment">
                                            <li><a href="javascript:void(0)" class="text-warning-hvr"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-alt"></i></a></li>
                                        </ul>
                                        <p>Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="add-review">
                                <h3 class="heading darkcolor font-light2 bottom25">Add Your Review<span class="divider-left"></span></h3>
                                <h5 class="pb-1">Your Rating : <span id="ratingText" class="text-warning">Please Select</span></h5>
                                <ul class="comment bottom15 top10">
                                    <li><a href="javascript:void(0)" id="rattingIcon">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </a>
                                    </li>
                                </ul>
                                <form class="findus" id="contact-form" onsubmit="return false">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="result1"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="name" class="d-none"></label>
                                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label for="email1" class="d-none"></label>
                                                <input type="email" class="form-control" placeholder="Email *" name="email" id="email1" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 mb-4">
                                            <label for="message" class="d-none"></label>
                                            <textarea placeholder="Comment *" name="message" id="message"></textarea>
                                            <button class="button gradient-btn" id="btn_submit">Add Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- delivery info -->
                        <div class="accordion-item "><a href="#tab4">Delivery info</a></div><div id="tab4" style="">
                            <div class="row">
                            <div class="col-6">
                                <h4 class="mt-1"><i class="fas fa-truck mr-2"></i>Standard delivery:</h4>
                                <p class="mt-1">Using the standard service, your order should be with you within <b>3 - 7 days</b> (excludes Public holidays).</p>
                                <p class="mt-1"><b>$9.99</b></p>
                                <h4 class="mt-5"><i class="fas fa-plane mr-2"></i>International delivery</h4>
                                <p class="mt-1">International delivery is available for this product. The cost and delivery time depend on the country.</p>
                                <p class="mt-1"><b>From $29.99</b></p>
                            </div>
                            <div class="col-6">
                                <h4 class="mt-1"><i class="fas fa-shipping-fast mr-2"></i>Fast delivery: </h4>
                                <p class="mt-1">Place your order before <b>6pm (18:00)</b> to receive your order the very Next day <b>(excludes Public holidays)</b>.</p>
                                <p class="mt-1"><b>$15.99</b></p>
                                <h4 class="mt-5"><i class="fas fa-cash-register mr-2"></i>Store delivery:</h4>
                                <p class="mt-1">You can get your order delivered to participating stores within the UK. Once your order has been delivered to your chosen store, you’ll get an email confirming it’s ready to be collected.</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- related products -->
        <div class="col-md-12 wow fadeInDown text-center text-md-left" style="visibility: visible; animation-name: fadeInDown;">
            <h3 class="heading darkcolor font-light heading_space mt-md-0 mt-3"><span>Related</span> Products<span class="divider-left"></span></h3>
        </div>
        <div class="row" id="related-products-list">

        </div>
    </div>
</section>

<!--Gallery Details Ends-->
<input type="hidden" name="k" value="<?php echo $_GET['k']?>" id="product-id">
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">

<?php include_once 'inc/footer.php';
     include_once 'inc/scripts.php'?>
<script>getProductDetails()</script>


</body>
</html>