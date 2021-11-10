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
    <title>PinLace | Shop</title>
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
    <!-- products -->
    <section id="our-shop" class="padding">
        <!-- error reporting -->
        <p id="notification" class="text-center text-danger border border-danger border-rounded d-none"> Something wrong with server please try again.</p>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- filter products -->
                        <div class="col-md-12 p-0 text-center wow fadeIn mb-2" data-wow-delay="300ms">
                            <h2 class="heading bottom30 darkcolor font-light2">Our <span class="font-normal">Shop</span>
                                <span class="divider-center"></span>
                            </h2>
                            <div class="gradient-bg title-wrap p-2">
                                <div class="d-flex flex-sm-row flex-column">
                                    <!-- filter products button -->
                                    <button type="button" class="btn btn-primary mr-sm-auto" id="filter-products-btn" data-toggle="modal" data-target="#filter-products-modal">
                                        Filter
                                    </button>
                                    <!-- sort by select -->
                                    <label for="" class="text-white mt-2 mr-3">Sort by :</label>
                                    <select class="btn btn-primary text-left" id="sort-by-select">
                                        <option value="priceAcs">price-low to high</option>
                                        <option>price-high to low</option>
                                        <option>discount-highest</option>
                                        <option>discount-lowest</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- products -->
                        <div id="productList" class="row">

                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" name="_token" id="_token" value="<?php if(isset($_SESSION['_token'])){echo $_SESSION['_token'];} ?>">


    <!-- filter products modal-->
    <div class="modal fade" id="filter-products-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="gradient-bg title-wrap" style="border-radius:2.3rem">
                        <form class="py-3">
                            <div class="row justify-content-center ">
                                <!-- brand -->
                                <div class="form-group  col-10">
                                    <label for="" class="text-white">Brand:</label>
                                    <select class="form-control" id="brand-select">
                                        <option>All</option>
                                    </select>
                                </div>
                                <!-- category -->
                                <div class="form-group  col-10">
                                    <label for="" class="text-white">Category:</label>
                                    <select class="form-control" id="category-select">
                                        <option >All</option>
                                    </select>
                                </div>
                                <!-- gender -->
                                <div class="form-group  col-10">
                                    <label for="" class="text-white">Gender:</label>
                                    <select class="form-control" id="gender-select">
                                        <option >All</option>
                                    </select>
                                </div>
                                <!-- sizes -->
                                <div class="form-group  col-10">
                                    <label for="" class="text-white">Size:</label>
                                    <select class="form-control" id="size-select">
                                        <option >All</option>
                                    </select>
                                </div>
                                <!-- color -->
                                <div class="form-group  col-10">
                                    <label for="" class="text-white">Color:</label>
                                    <select class="form-control" id="color-select">
                                        <option >All</option>
                                    </select>
                                </div>
                                <!-- products quantity -->
                                <div class="form-group row text-center">
                                    <h6 class="mr-2 text-white">products available: </h6>
                                    <h5 class="text-white" id="product-quantity"></h5>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>

    <!--Trending Items in shop End-->
   <?php 
    include_once 'inc/footer.php';
     include_once 'inc/scripts.php';
     if((isset($_GET['brand'])&&(isset($_GET['category'])&&(isset($_GET['gender'])))))
        {
            echo "<script>
            selectAllFilters('".$_GET['brand']."','".$_GET['category']."','".$_GET['gender']."',"."'filtersSelected'".");
            filterProducts('".$_GET['brand']."','".$_GET['category']."','".$_GET['gender']."',"."'parameters'".");
            </script>";
        }
        else
        {
            echo "<script> selectAllProducts();selectAllFilters(); </script>";
        }

    ?>
</body>

</html>
