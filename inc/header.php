
    <!-- header -->
    <header class="site-header d-flex flex-column">
        <nav class="navbar navbar-expand-lg padding-nav static-nav">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" alt="logo">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php"> Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item dropdown static">
                            <a class="nav-link dropdown-toggle active" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> Pages </a>
                            <ul class="dropdown-menu megamenu">
                                <li>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <h5 class="dropdown-title bottom10"> General </h5>
                                                <a class="dropdown-item" href="about.html">About Us</a>
                                                <a class="dropdown-item" href="services.html">Services</a>
                                                <a class="dropdown-item" href="services-detail.html">Service Detail</a>
                                                <a class="dropdown-item" href="testimonial.html">Testimonials</a>
                                                <a class="dropdown-item" href="contact.php">Contact Us</a>
                                                <a class="dropdown-item" href="team.html">Our Team</a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <h5 class="dropdown-title opacity-10"> Others </h5>
                                                <a class="dropdown-item" href="gallery.html">Gallery</a>
                                                <a class="dropdown-item" href="gallery-detail.html">Gallery Detail</a>
                                                <a class="dropdown-item" href="pricing.html">Pricing</a>
                                                <a class="dropdown-item" href="404.html">404 Error</a>
                                                <a class="dropdown-item" href="faq.html">FAQ's</a>
                                                <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <h5 class="dropdown-title bottom10"> Account </h5>
                                                <a class="dropdown-item" href="login.php">Login</a>
                                                <a class="dropdown-item" href="register.html">Register</a>
                                                <a class="dropdown-item" href="forget-password.html">Reset Password</a>
                                                <a class="dropdown-item" href="support.html">Support</a>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <h5 class="dropdown-title bottom10"> Shop Pages </h5>
                                                <a class="dropdown-item active" href="shop.html">Shop</a>
                                                <a class="dropdown-item" href="shop-detail.html">Shop Detail</a>
                                                <a class="dropdown-item" href="shop-cart.html">Shopping Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> Blog </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="blog-1.html">Blog Layout 1</a>
                                <a class="dropdown-item" href="blog-2.html">Blog Layout 2</a>
                                <a class="dropdown-item" href="blog-detail.html">Blog Layout 3</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <!-- login -->
                        <li class="nav-item">
                           <?php
                                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){ 
                                    echo "<a class='nav-link' data-toggle='tooltip' data-placement='bottom'
                                    title=".$_SESSION['email']."
                                    style='color:#086b70' href='user-profile.php'>Hi, ". $_SESSION['name']."</a>";
                                    echo "<a class='nav-link' href='logout.php'>Logout</a>";
                                } 
                                else{echo "<a class='nav-link' href='login.php'>Login</a>";} 
                           ?>
                        </li>
                    </ul>
                </div>
                <ul class="social-icons social-icons-simple d-lg-inline-block d-none animated fadeInUp"
                    data-wow-delay="300ms">
                    <!-- shopping cart -->
                    <li class="shopping-cart">
                        <div id="cart-items-quantity">
                            <p class ="m-0 text-center">
                                <!-- get number of items in basket -->
                                <?php
                                require_once('models/Cart.php');
                                $basket = new cart();
                                $numberInBasket = count($basket->getItems());
                                echo $numberInBasket;
                                ?>
                            </p>
                        </div>
                        <a id="cart-icon" href="checkout.php" class="m-0"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                </ul>
            </div>
            <!--side menu open button-->
            <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
                <span class="gradient-bg"></span> <span class="gradient-bg"></span> <span class="gradient-bg"></span>
            </a>
        </nav>
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg">
            <div class="overlay"></div>
            <div class="inner-wrapper">
                <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages">
                                Pages <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages" class="collapse sideNavPages">
                                <ul class="navbar-nav mt-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="team.html">Our Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="services.html">Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="services-detail.html">Service Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="testimonial.html">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="gallery.html">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="gallery-detail.html">Gallery Detail</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pricing.html">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="faq.html">FAQ's</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="404.html">Error 404</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="coming-soon.html">Coming Soon</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse"
                                            href="#inner-2">
                                            Account <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div id="inner-2" class="collapse sideNavPages sideNavPagesInner">
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="login.php">Login</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="register.html">Register</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="forget-password.html">Forget Password</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="support.html">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsePagesSideMenu" data-toggle="collapse"
                                            href="#inner-1">
                                            Shops <i class="fas fa-chevron-down"></i>
                                        </a>
                                        <div id="inner-1" class="collapse sideNavPages sideNavPagesInner">
                                            <ul class="navbar-nav mt-2">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="shop.html">Shop Products</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="shop-detail.html">Shop Detail</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="shop-cart.html">Shop Cart</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link collapsePagesSideMenu" data-toggle="collapse" href="#sideNavPages2">
                                Blogs <i class="fas fa-chevron-down"></i>
                            </a>
                            <div id="sideNavPages2" class="collapse sideNavPages">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog-1.html">Blog 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog-2.html">Blog 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog-detail.html">Blog Details</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <!-- log in side menu -->
                        <li class="nav-item">
                           <?php
                                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){ 
                                    echo "<a class='nav-link' data-toggle='tooltip' data-placement='bottom' style='color:#086b70' href='user-profile.php'>Hi, ". $_SESSION['name']."</a>";
                                    echo "<br><a class='nav-link' href='logout.php'>Logout</a>";
                                } 
                                else{echo "<a class='nav-link' href='login.php'>Login</a>";} 
                           ?>
                        </li>

                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <!-- shopping cart -->
                        <li class="shopping-cart">
                            <div id="cart-items-quantity">
                                <p class ="m-0 text-center">
                                    <?php
                                    require_once('models/Cart.php');
                                    $basket = new cart();
                                    $numberInBasket = count($basket->getItems());
                                    echo $numberInBasket;
                                    ?>
                                </p>
                            </div>
                            <a id="cart-icon" href="" class="m-0"><i class="fas fa-shopping-cart"></i></a>
                        </li>                    </ul>
                    <p class="whitecolor">&copy; <span id="year"></span> Trax. Made With Love by ThemesIndustry</p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>


    
    <!-- header End-->
    <!--search products-->
    <input type="hidden" id="_token" name="_token" value="<?php echo $_SESSION['_token']?>">
    <div class="gradient-bg title-wrap">
        <div id ="search-product-form" class="py-3">
            <div class="row justify-content-center w-100">
                <div class="form-group m-0 w-50">
                    <input class="form-control" id="search-product" type="text" placeholder="Search product or brand">
                </div>
            </div>
        </div>
   </div>
