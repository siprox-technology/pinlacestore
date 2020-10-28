
<?php
/* new session starts */
session_start();
if(!isset($_SESSION['_token']))
{
    $_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
//redirect to login page if user not signed in
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==false)
{
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trax | Shopping Basket</title>
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
<!-- shopping cart -->
<section id="shop" class="padding">
   <div class="container">
      <!-- back to products -->
      <div class="row justify-content-start ml-auto mb-3">
         <a class="" href="products.php"><i class="fas fa-arrow-left"></i></a>
         <a class="ml-2" href="products.php">Continue shopping</a>
      </div>
      <!-- shopping basket -->
      <div class="row">
         <div class="col-md-12 cart_table wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                  <tr>
                     <th class="darkcolor">Product</th>
                     <th class="darkcolor ">Price</th>
                     <th class="darkcolor">Quantity</th>
                     <th class="darkcolor">Total</th>
                     <th></th>
                  </tr>
                  </thead>
                  <tbody id="basket_items">
                     <!-- items in the basket goes here -->

                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- shipping -->
      <div class="row justify-content-between ">
         <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
            <div class="totals margin_tophalf">
               <h3 class="bottom25 font-light2">Calculate Shipping:</h3>
               <form class="" id="delivery_options">
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio" name="exampleRadios" id="delivery_option_radio" value="9.99" checked>
                     <p>
                        Standard delivery
                     </p>
                  </div>
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio" name="exampleRadios" id="delivery_option_radio" value="15.99">
                     <p >
                        Fast delivery
                     </p>
                  </div>
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio" name="exampleRadios" id="delivery_option_radio" value="29.99">
                     <p >
                        International delivery
                     </p>
                  </div>
                  <button type="button" id="calculate_shipping_btn"class="button btn-primary mt-3">Calculate</button>
               </form>
            </div>
         </div>
         <!-- total order amount -->
         <div class="col-lg-5 col-md-5 col-sm-12 wow fadeInUp margin_tophalf" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
            <div class="totals margin_topalf h-100">
               <h3 class="bottom25 font-light2">Cart Totals:</h3>
               <table class="table table-responsive cart-total">
                  <tbody>
                  <tr class="w-100">
                     <td>Subtotal:</td>
                     <td id="total_order_price" class="yellow_t text-right"><strong></strong></td>
                  </tr>
                  <tr>
                     <td>Other Tax:</td>
                     <td id="total_order_tax"class="yellow_t text-right"><strong>$0</strong></td>
                  </tr>
                  <tr>
                     <td>Shipping:</td>
                     <td id="total_order_shipping" class="yellow_t text-right"><strong></strong></td>
                  </tr>
                  <tr>
                     <td>Order Total:</td>
                     <td class="text-danger" id="total_order_toPay"><strong></strong></td>
                  </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="checkout-btn-container mt-3">
         <div class="row">
            <div class="col-12 coupon d-sm-flex d-block justify-content-end align-self-center">
               <a href="#." class="button btn-dark margin10 d-none" id="pay_btn">Pay</a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- shopping cart ends -->
<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
    <script>getShoppingBasketDetails()</script>
</body>

</html>