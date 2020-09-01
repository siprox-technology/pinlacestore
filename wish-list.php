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
    <title>Trax | Wish list</title>
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
    <!--wish list -->
    <section id="wish-list-section" class="bglight position-relative padding noshadow">
        <div class="container whitebox">
            <div class="row justify-content-center">
                <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Wish</span>
                    list
                    <span class="divider-center"></span>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12 cart_table wow fadeInUp details-box" data-wow-delay="300ms">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="wish-list">
                            <thead>
                            <tr>
                                <th class="darkcolor">Product</th>
                                <th class="darkcolor ">Price</th>
                                <th class="darkcolor">Quantity</th>
                                <th class="darkcolor">Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-table">
                                    <div class="d-block d-lg-table-cell">
                                        <a class="shopping-product" href="shop-detail.html"><img src="images/shop-3.jpg" alt="product"></a>
                                    </div>
                                    <div class="d-block d-lg-table-cell">
                                        <h4 class="darkcolor product-name"><a href="shop-detail.html">Blue Shoe</a></h4>
                                        <p>We offer the most complete in the country</p>
                                    </div>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="default-color text-center">$130.00</h4>
                                </td>
                                <td class="text-center">
                                    <div class="quote text-center">
                                    <label for="quantity1" class="d-none"></label>
                                    <input type="text" placeholder="1" class="quote" id="quantity1">
                                    </div>
                                </td>
                                <td>
                                    <h4 class="darkcolor text-center">$136.00</h4>
                                </td>
                                <td class="text-center"><a class="btn-close" href="#."><i class="fas fa-times"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-table">
                                    <div class="d-block d-lg-table-cell">
                                        <a class="shopping-product" href="shop-detail.html"><img src="images/shop-5.jpg" alt="product"></a>
                                    </div>
                                    <div class="d-block d-lg-table-cell">
                                        <h4 class="darkcolor product-name"><a href="shop-detail.html">Red Shoe</a></h4>
                                        <p>We offer the most complete in the country</p>
                                    </div>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="default-color text-center">$130.00</h4>
                                </td>
                                <td class="text-center">
                                    <div class="quote text-center">
                                    <label for="quantity2" class="d-none"></label>
                                    <input type="text" placeholder="1" class="quote" id="quantity2">
                                    </div>
                                </td>
                                <td>
                                    <h4 class="darkcolor text-center">$136.00</h4>
                                </td>
                                <td class="text-center"><a class="btn-close" href="#."><i class="fas fa-times"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="apply_coupon">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 coupon d-sm-flex d-block justify-content-between align-self-center">
                                <a href="#." class="button btn-primary mb-sm-0 bottom15">update</a>
                                <a href="#." class="button btn-dark margin10">checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--wish list ends-->
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>