
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
                  <div class="col-md-6 col-sm-12 coupon">
                     <form class="findus form-inline bottom15 margin10">
                        <div class="form-group">
                           <label for="coupin1" class="d-none"></label>
                           <input type="text" placeholder="Coupon Code" class="form-control" id="coupin1">
                        </div>
                        <button type="submit" class="button gradient-btn">Apply Coupon</button>
                     </form>
                  </div>
                  <div class="col-md-6 col-sm-12 coupon d-sm-flex d-block justify-content-between align-self-center">
                     <a href="#." class="button btn-primary mb-sm-0 bottom15">update</a>
                     <a href="#." class="button btn-dark margin10">checkout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-5 col-sm-12 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
            <div class="totals margin_tophalf">
               <h3 class="bottom25 font-light2">Calculate Shipping:</h3>
               <form class="findus">
                  <div class="form-group">
                     <label class="select form-control">
                        <select name="country" id="country">
                           <option>USA</option>
                           <option>Canada</option>
                           <option>Chilli</option>
                           <option>France</option>
                        </select>
                     </label>
                  </div>
                  <div class="form-group">
                     <label class="select form-control">
                        <select name="state" id="states">
                           <option>USA</option>
                           <option>Canada</option>
                           <option>Chilli</option>
                           <option>France</option>
                        </select>
                     </label>
                  </div>
                  <div class="form-group">
                     <label for="zip" class="d-none"></label>
                     <input type="text" class="form-control" placeholder="Postal Code / Zip" required="" id="zip">
                  </div>
                  <button type="button" class="button btn-primary">Calculate</button>
               </form>
            </div>
         </div>
         <div class="col-lg-3 col-md-5 col-sm-12 wow fadeInUp margin_tophalf" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
            <div class="totals margin_topalf h-100">
               <h3 class="bottom25 font-light2">Cart Totals:</h3>
               <table class="table table-responsive cart-total">
                  <tbody>
                  <tr class="w-100">
                     <td>Subtotal:</td>
                     <td class="yellow_t text-right"><strong>$272.00</strong></td>
                  </tr>
                  <tr>
                     <td>Other Tax:</td>
                     <td class="yellow_t text-right"><strong>$0</strong></td>
                  </tr>
                  <tr>
                     <td>Shipping:</td>
                     <td class="yellow_t text-right"><strong>Free</strong></td>
                  </tr>
                  <tr>
                     <td>Order Total:</td>
                     <td class="text-right"><strong>$272.00</strong></td>
                  </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-md-4 col-sm-12 wow fadeInRight" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInRight;">
            <div class="totals margin_tophalf">
               <h3 class="bottom25 font-light2">Personal Info:</h3>
               <form class="findus">
                  <div class="form-group">
                     <label class="select form-control">
                        <select name="country" id="cashMethod">
                           <option>Bank Transfer</option>
                           <option>Cash On Delivery</option>
                           <option>Paypal</option>
                           <option>Bitcoin</option>
                           <option>Visa Card</option>
                           <option>American Express</option>
                        </select>
                     </label>
                  </div>
                  <div class="form-group">
                     <label class="select form-control">
                        <select name="state" id="states1">
                           <option>USA</option>
                           <option>Canada</option>
                           <option>Chilli</option>
                           <option>France</option>
                        </select>
                     </label>
                  </div>
                  <div class="form-group">
                     <label for="emailOrder" class="d-none"></label>
                     <input type="email" class="form-control" placeholder="Email" required="" id="emailOrder">
                  </div>
                  <button type="button" class="button btn-primary">Order</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- shopping cart ends -->

    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
</body>

</html>