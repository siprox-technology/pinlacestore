
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
    <title>PinLace | Shopping Basket</title>
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
      <div class="row justify-content-center">
            <h2 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-normal">Shopping</span>
               Basket
               <span class="divider-center"></span>
            </h2>
      </div>
      <!-- back to products -->
      <div class="row justify-content-between ml-auto mb-3">
         <a class="mr-2" href="products.php"><i class="fas fa-arrow-left"></i></a>
         <a class="mr-auto" href="products.php">Continue shopping</a>

         <a class="" href="order-history.php">Orders history</a>
         <a class="ml-2" href="order-history.php"><i class="fas fa-arrow-right"></i></a>
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
      <!-- shipping and address of user-->
      <div class="row" id="order_shipping_info">
         <!-- user and address info -->
         <div class="col-md-6 col-sm-12 wow fadeInUp margin_tophalf" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
            <div class="totals margin_topalf h-100">
               <h3 class="bottom25 font-light2">Recipient:</h3>
               <input type="hidden" name="recipient_user_id" value="<?php echo $_SESSION['id'];?>" id="recipient_user_id">
               <table class="table table-responsive cart-total">
                  <tbody>
                  <tr class="">
                     <td>Name:</td>
                     <td id="delivery_name" class="yellow_t text-right">
                        <strong>
                           <?php
                              echo $_SESSION['name'];
                           ?>
                        </strong>
                     </td>
                  </tr>
                  <tr>
                     <td>Email:</td>
                     <td id="delivery_email"class="yellow_t text-right">
                        <strong>
                           <?php
                              echo $_SESSION['email'];
                           ?>                           
                        </strong>
                     </td>
                  </tr>
                  <tr>
                     <td>phone:</td>
                     <td id="" class="yellow_t text-right">
                        <strong>
                           <?php
                              echo $_SESSION['phone'];
                           ?>
                        </strong>
                     </td>
                  </tr>
                  <tr>
                     <td>Address:</td>
                     <td>
                        <select id="delivery_addresses" class="w-100">
                           <option value="Please select a delivery address" default>Select...</option>
                           <?php
                              if(isset($_SESSION['address1']))
                              {
                                 echo "<option id='".$_SESSION['address1']['address_id']."'"."
                                 value='".$_SESSION['address1']['address'].
                                 ", ".$_SESSION['address1']['city'].
                                 ", ".$_SESSION['address1']['state'].
                                 ", ".$_SESSION['address1']['country'].
                                 ", ".$_SESSION['address1']['postCode'].
                                 "' default>".$_SESSION['address1']['address']."</option>";
                              }
                              if(isset($_SESSION['address2']))
                              {
                                 echo "<option id='".$_SESSION['address2']['address_id']."'"."
                                 <option value='".$_SESSION['address2']['address'].
                                 ", ".$_SESSION['address2']['city'].
                                 ", ".$_SESSION['address2']['state'].
                                 ", ".$_SESSION['address2']['country'].
                                 ", ".$_SESSION['address2']['postCode'].
                                 "' default>".$_SESSION['address2']['address']."</option>";                              }
                              if(isset($_SESSION['address3']))
                              {
                                 echo "<option id='".$_SESSION['address3']['address_id']."'"."
                                 <option value='".$_SESSION['address3']['address'].
                                 ", ".$_SESSION['address3']['city'].
                                 ", ".$_SESSION['address3']['state'].
                                 ", ".$_SESSION['address3']['country'].
                                 ", ".$_SESSION['address3']['postCode'].
                                 "' default>".$_SESSION['address3']['address']."</option>";                              }
                              if(isset($_SESSION['address4']))
                              {
                                 echo "<option id='".$_SESSION['address4']['address_id']."'"."
                                 <option value='".$_SESSION['address4']['address'].
                                 ", ".$_SESSION['address4']['city'].
                                 ", ".$_SESSION['address4']['state'].
                                 ", ".$_SESSION['address4']['country'].
                                 ", ".$_SESSION['address4']['postCode'].
                                 "' default>".$_SESSION['address4']['address']."</option>";                              }
                              if(isset($_SESSION['address5']))
                              {
                                 echo "<option id='".$_SESSION['address5']['address_id']."'"."
                                 <option value='".$_SESSION['address5']['address'].
                                 ", ".$_SESSION['address5']['city'].
                                 ", ".$_SESSION['address5']['state'].
                                 ", ".$_SESSION['address5']['country'].
                                 ", ".$_SESSION['address5']['postCode'].
                                 "' default>".$_SESSION['address5']['address']."</option>";                              }
                              if(isset($_SESSION['address6']))
                              {
                                 echo "<option id='".$_SESSION['address6']['address_id']."'"."
                                 <option value='".$_SESSION['address6']['address'].
                                 ", ".$_SESSION['address6']['city'].
                                 ", ".$_SESSION['address6']['state'].
                                 ", ".$_SESSION['address6']['country'].
                                 ", ".$_SESSION['address6']['postCode'].
                                 "' default>".$_SESSION['address6']['address']."</option>";                              }
                           ?>
                        </select>
                     </td>
                  </tr>
                  </tbody>
               </table>
               <div class="border-top p-3">
                  <p id="delivery_address_warning" class="text-danger d-none">You have to have at least 1 address saved in your user account to place an order !</p>
                  <p id="selected_delivery_address" class='text-dark font-bold'>Please select a delivery address</p>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-12 wow fadeInLeft" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInLeft;">
            <div class="totals margin_tophalf">
               <h3 class="bottom25 font-light2">Calculate Shipping:</h3>
               <form class="" id="delivery_options">
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio"  name="exampleRadios"  value="9.99" checked >
                     <p>
                        Standard delivery
                     </p>
                  </div>
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio"  name="exampleRadios"  value="15.99">
                     <p >
                        Fast delivery
                     </p>
                  </div>
                  <div class="form-check m-3">
                     <input class="form-check-input" type="radio"  name="exampleRadios"  value="29.99" >
                     <p >
                        International delivery
                     </p>
                  </div>
                  <button type="button" id="calculate_shipping_btn"class="button btn-primary mt-3 d-none">Calculate</button>
               </form>
            </div>
         </div>
         <!-- total order amount -->
         <div class="col-md-3 col-sm-12 wow fadeInUp margin_tophalf" data-wow-delay="400ms" style="visibility: visible; animation-delay: 400ms; animation-name: fadeInUp;">
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
               <button class="button btn-dark margin10 d-none"  id="confirm_order_btn">Confirm order</button>
            </div>
         </div>
         <!-- reporting error -->
         <div class="row">
            <div class="col-12">
               <h3 id="order_process_error" class="text-danger"></h3>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- shopping cart ends -->
<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">

<?php
   include_once 'inc/footer.php';
   include_once 'inc/stripe-modal.php';  
   include_once 'inc/scripts.php';
?>
<script>getShoppingBasketDetails()</script>
</body>

</html>