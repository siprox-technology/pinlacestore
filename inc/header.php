
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
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Male">Mens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Female">Ladies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Kids">Kids</a>
                        </li>
                        <li class="nav-item" data-toggle="collapse">
                            <a class="nav-link" href="#site-footer">Contact</a>
                        </li>
                        <!-- login -->
                        <li class="nav-item">
                           <?php
                                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==true){ 
                                    echo "<a class='nav-link' data-toggle='tooltip' data-placement='bottom'
                                    title=".$_SESSION['email']."
                                    style='color:#23ced5' href='user-profile.php'>Hi, ". $_SESSION['name']."</a>";
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
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Male">Mens</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Female">Ladies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="products.php?brand=All&amp;category=All&amp;gender=Kids">Kids</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-link-side-menu" href="#site-footer">Contact</a>
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
                        <p class="m-0 py-3">Copyright © <span id="year1"></span> <a target="_blank" href="https://www.siprox-tech.com"
                            class="hover-default">SIPROX TECHNOLOGY</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>


    
    <!-- header End-->
    <!--search products-->
    <input type="hidden" id="_token" name="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>">
    <div class="gradient-bg title-wrap">
        <div id ="search-product-form" class="py-3">
            <div class="row justify-content-center w-100">
                <div class="form-group m-0 w-50">
                    <input class="form-control" id="search-product" type="text" placeholder="Search product or brand">
                </div>
            </div>
        </div>
   </div>
