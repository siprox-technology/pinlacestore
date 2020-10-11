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
        <div class="row">
            <!-- product description -->
            <div class="col-md-6 top5">
                <div class="product-img-item shadow">
                    <div class="product-desc text-center text-md-left p-1">
                        <div class="col-12">
                            <!-- brand -->
                            <h2 class="text-capitalize font-normal text-left  mt-3 text-dark" id="brand-name"></h2>
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
                            <h4 class="text-center mt-2 text-capitalize font-normal" id="product-colors-name">blue-navi</h4> 
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
            <div class="col-md-6 top5">
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
                        <p class="text-warning">
                            <a href="#." class="hover-underline" title="4.5">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>&nbsp;
                                <span class="text-grey"><span class="font-bold">4.5 </span>(18)</span>
                            </a>
                        </p>
                        <p class="bottom35">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                        <p class="heading_space">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec facilisis nullano volutpat justo. Nulla tempus ultricies feugiat. Duis magna risus, luctus id urna dapibus condimentum dui. Maecenas tempor non ex eu vehicula. Sed sit placerat velit,</p>
                        <blockquote class="blockquote darkcolor heading_space">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley</blockquote>
                        <ul class="rounded heading_space text-left">
                            <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
                            <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
                            <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
                            <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
                            <li>Lorem Ipsum has been the industry's standard dummy text ever</li>
                        </ul>
                        <div class="profile-authors heading_space">
                            <h4 class="text-capitalize darkcolor bottom40">Comments</h4>
                            <div class="eny_profile bottom30 text-left">
                                <div class="profile_photo"><img src="images/team-1.jpg" alt="Comments"> </div>
                                <div class="profile_text">
                                    <h5 class="darkcolor"><a href="#.">Bankee Moune</a></h5>
                                    <a href="javascript:void(0)" class="readmorebtn font-bold"> <i class="fas fa-reply"></i> Reply</a>
                                    <p class="top10">Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise.</p>
                                </div>
                            </div>
                            <div class="eny_profile text-left">
                                <div class="profile_photo"><img src="images/team-3.jpg" alt="Comments"> </div>
                                <div class="profile_text">
                                    <h5 class="darkcolor"><a href="#.">Jkristen Smith</a></h5>
                                    <a href="javascript:void(0)" class="readmorebtn font-bold"> <i class="fas fa-reply"></i> Reply</a>
                                    <p class="top10">Keeping your eye on the ball while performing. Podcasting operational change management inside of workflows to establish a framework. </p>
                                </div>
                            </div>
                        </div>
                        <div class="post-comment">
                            <h4 class="text-capitalize darkcolor">Add Comment</h4>
                            <p class="bottom20 top10"><small class="fas fa-asterisk"></small> Your Email address will not be published</p>
                            <h5 class="pb-1">Your Rating : <span id="ratingText" class="text-warning">Please Select</span></h5>
                            <ul class="comment top10 bottom30">
                                <li><a href="javascript:void(0)" class="text-warning-hvr" id="rattingIcon">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </a>
                                </li>
                            </ul>
                            <form class="getin_form" id="post-a-comment">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group bottom35">
                                            <label for="first_name1" class="d-none"></label>
                                            <input class="form-control" type="text" placeholder="First Name:" required id="first_name1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group bottom35">
                                            <label for="email1" class="d-none"></label>
                                            <input class="form-control" type="email" placeholder="Email:" required id="email1">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group bottom35">
                                            <label for="message" class="d-none"></label>
                                            <textarea class="form-control" placeholder="Message" id="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="button gradient-btn">submit request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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