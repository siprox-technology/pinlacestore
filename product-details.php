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
<!--PreLoader Ends-->
<!-- header -->
<?php 
include_once 'inc/header.php' 
?>
<!-- header -->

<!-- Gallery Details -->
<section id="gallery-detail" class="padding_top padding_bottom_half">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 top10">
                <div class="news_item shadow">
                    <div class="owl-carousel owl-theme" id="carousel-gallery-detail">
                        <!--item 1-->
                        <div class="item">
                            <a href="images/gallery-detail-1.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="images/gallery-detail-1.jpg" alt="Latest News">
                            </a>
                        </div>
                        <!--item 2-->
                        <div class="item">
                            <a href="images/gallery-detail-2.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="images/gallery-detail-2.jpg" alt="Latest News">
                            </a>
                        </div>
                        <!--item 3-->
                        <div class="item">
                            <a href="images/gallery-detail-3.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="images/gallery-detail-3.jpg" alt="Latest News">
                            </a>
                        </div>
                        <!--item 4-->
                        <div class="item">
                            <a href="images/gallery-detail-4.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="images/gallery-detail-4.jpg" alt="Latest News">
                            </a>
                        </div>
                        <!--item 5-->
                        <div class="item">
                            <a href="images/gallery-detail-5.jpg" data-fancybox="gallery" title="Zoom In">
                                <img src="images/gallery-detail-5.jpg" alt="Latest News">
                            </a>
                        </div>
                    </div>
                    <div class="news_desc text-center text-md-left">
                        <h3 class="text-capitalize font-normal darkcolor"><a href="blog-detail.html">Next Large Social Network</a></h3>
                        <ul class="meta-tags top20 bottom20">
                            <li><a href="#."><i class="fas fa-calendar-alt"></i>Feb 14</a></li>
                            <li><a href="#."> <i class="far fa-user"></i> Peter </a></li>
                            <li><a href="#."><i class="far fa-comment-dots"></i>5</a></li>
                        </ul>
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
            <div class="col-lg-4 col-md-5 top25">
                <aside class="sidebar whitebox">
                    <div class="widget heading_space shadow wow fadeIn" data-wow-delay="350ms">
                        <h4 class="text-capitalize darkcolor bottom20 text-center text-md-left">Recent Items Added</h4>
                        <div class="single_post d-table bottom15">
                            <a href="#." class="post"><img src="images/blog-recent-1.jpg" alt="post image"></a>
                            <div class="text">
                                <a href="#.">About Invesment Management</a>
                                <span>September 22,2019</span>
                            </div>
                        </div>
                        <div class="single_post bottom15">
                            <a href="#." class="post"><img src="images/blog-recent-2.jpg" alt="post image"></a>
                            <div class="text">
                                <a href="#.">We Conduct Share Holders Meet</a>
                                <span>September 20,2019</span>
                            </div>
                        </div>
                        <div class="single_post d-table bottom15">
                            <a href="#." class="post"><img src="images/blog-recent-3.jpg" alt="post image"></a>
                            <div class="text">
                                <a href="#.">Create Your bright Future</a>
                                <span>September 18,2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="widget shadow heading_space text-center text-md-left">
                        <h4 class="text-capitalize darkcolor bottom20">Categories</h4>
                        <ul class="webcats">
                            <li><a href="#.">web design <span>(20)</span></a></li>
                            <li><a href="#.">network <span>(05)</span></a></li>
                            <li><a href="#.">marketing <span>(11)</span></a></li>
                            <li><a href="#.">event <span>(20)</span></a></li>
                            <li><a href="#.">website <span>(07)</span></a></li>
                            <li><a href="#.">themeforest<span>(19)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget shadow heading_space text-center text-md-left">
                        <h4 class="text-capitalize darkcolor bottom20">Tags</h4>
                        <ul class="webtags">
                            <li><a href="#.">web design</a></li>
                            <li><a href="#.">network</a></li>
                            <li><a href="#.">marketing</a></li>
                            <li><a href="#.">posts</a></li>
                            <li><a href="#.">event</a></li>
                            <li><a href="#.">website</a></li>
                            <li><a href="#.">social</a></li>
                            <li><a href="#.">themeforest</a></li>
                            <li><a href="#.">creative</a></li>
                            <li><a href="#.">best solutions</a></li>
                        </ul>
                    </div>
                    <div class="widget shadow heading_space text-center text-md-left">
                        <h4 class="text-capitalize darkcolor bottom20">search</h4>
                        <form class="widget_search">
                            <div class="input-group">
                                <label for="searchInput" class="d-none"></label>
                                <input type="search" class="form-control" placeholder="search..." required id="searchInput">
                                <button type="submit" class="input-group-addon"><i class="fa fa-search"></i> </button>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--Gallery Details Ends-->

<?php include_once 'inc/footer.php';
     include_once 'inc/scripts.php'?>
</body>
</html>