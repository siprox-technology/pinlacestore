
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
                                 echo "<option id='".$_SESSION['address1']['id']."'"."
                                 value='".$_SESSION['address1']['address'].
                                 ", ".$_SESSION['address1']['city'].
                                 ", ".$_SESSION['address1']['state'].
                                 ", ".$_SESSION['address1']['country'].
                                 ", ".$_SESSION['address1']['postCode'].
                                 "' default>".$_SESSION['address1']['address']."</option>";
                              }
                              if(isset($_SESSION['address2']))
                              {
                                 echo "<option id='".$_SESSION['address2']['id']."'"."
                                 <option value='".$_SESSION['address2']['address'].
                                 ", ".$_SESSION['address2']['city'].
                                 ", ".$_SESSION['address2']['state'].
                                 ", ".$_SESSION['address2']['country'].
                                 ", ".$_SESSION['address2']['postCode'].
                                 "' default>".$_SESSION['address2']['address']."</option>";                              }
                              if(isset($_SESSION['address3']))
                              {
                                 echo "<option id='".$_SESSION['address3']['id']."'"."
                                 <option value='".$_SESSION['address3']['address'].
                                 ", ".$_SESSION['address3']['city'].
                                 ", ".$_SESSION['address3']['state'].
                                 ", ".$_SESSION['address3']['country'].
                                 ", ".$_SESSION['address3']['postCode'].
                                 "' default>".$_SESSION['address3']['address']."</option>";                              }
                              if(isset($_SESSION['address4']))
                              {
                                 echo "<option id='".$_SESSION['address4']['id']."'"."
                                 <option value='".$_SESSION['address4']['address'].
                                 ", ".$_SESSION['address4']['city'].
                                 ", ".$_SESSION['address4']['state'].
                                 ", ".$_SESSION['address4']['country'].
                                 ", ".$_SESSION['address4']['postCode'].
                                 "' default>".$_SESSION['address4']['address']."</option>";                              }
                              if(isset($_SESSION['address5']))
                              {
                                 echo "<option id='".$_SESSION['address5']['id']."'"."
                                 <option value='".$_SESSION['address5']['address'].
                                 ", ".$_SESSION['address5']['city'].
                                 ", ".$_SESSION['address5']['state'].
                                 ", ".$_SESSION['address5']['country'].
                                 ", ".$_SESSION['address5']['postCode'].
                                 "' default>".$_SESSION['address5']['address']."</option>";                              }
                              if(isset($_SESSION['address6']))
                              {
                                 echo "<option id='".$_SESSION['address6']['id']."'"."
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
      </div>
   </div>
</section>
<!-- shopping cart ends -->
<input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">
   
<!-- Payment Modal -->
<div class="modal fade" id="paymentModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header row pt-4 px-5 justify-content-around">
         <h3 class="heading darkcolor font-light2"><span class="font-normal">Order</span>
            Payment
            <span class="divider-center"></span>
         </h3>
         <button id="close" type="button" class="close ml-auto" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form action="process.php" method="post" id="payment-form">
            <div class="form-row">
            <!-- customer card owner -->
            <div class="form-group">
               <label>NAME</label>
               <input type="text" name="name" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Full Name" required="" autofocus="">
            </div>  
            <div class="form-group">
               <label>EMAIL</label>
               <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email Address" required="">            
            </div> 
               <input type="text" name="address_line_1" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Address line 1">
               <select name="country" id="country"  class="form-control mb-3 StripeElement StripeElement--empty">
                  <option value="" default>Select country...</option>
                  <option value="AF">Afghanistan</option>
                  <option value="AX">Åland Islands</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia, Plurinational State of</option>
                  <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                  <option value="BA">Bosnia and Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, the Democratic Republic of the</option>
                  <option value="CK">Cook Islands</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">Côte d'Ivoire</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CW">Curaçao</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (Malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GG">Guernsey</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard Island and McDonald Islands</option>
                  <option value="VA">Holy See (Vatican City State)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran, Islamic Republic of</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IM">Isle of Man</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JE">Jersey</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea, Democratic People's Republic of</option>
                  <option value="KR">Korea, Republic of</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Lao People's Democratic Republic</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia, Federated States of</option>
                  <option value="MD">Moldova, Republic of</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="ME">Montenegro</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestinian Territory, Occupied</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Réunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="BL">Saint Barthélemy</option>
                  <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                  <option value="KN">Saint Kitts and Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="MF">Saint Martin (French part)</option>
                  <option value="PM">Saint Pierre and Miquelon</option>
                  <option value="VC">Saint Vincent and the Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="RS">Serbia</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SX">Sint Maarten (Dutch part)</option>
                  <option value="SK">Slovakia</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia and the South Sandwich Islands</option>
                  <option value="SS">South Sudan</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard and Jan Mayen</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan, Province of China</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania, United Republic of</option>
                  <option value="TH">Thailand</option>
                  <option value="TL">Timor-Leste</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="GB">United Kingdom</option>
                  <option value="US">United States</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VE">Venezuela, Bolivarian Republic of</option>
                  <option value="VN">Viet Nam</option>
                  <option value="VG">Virgin Islands, British</option>
                  <option value="VI">Virgin Islands, U.S.</option>
                  <option value="WF">Wallis and Futuna</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
               </select>
               <input type="text" name="zip_code" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="zip code">
               <!-- user info -->
               <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>">
               <input type="hidden" name="request_name" value="payment">
               <input type="hidden" name="_token" value="<?php echo $_SESSION['_token'];?>" id="#_token">

               <!-- order info -->
               <span>$<input type="text" name="amount" class="form-control mb-3 StripeElement StripeElement--empty" id="amount_for_payment" value="" readonly></span>            
               <input type="hidden" name="order_id" id="order_id_for_payment" value="">
               <div id="card-element" class="form-control">
                  <!-- a Stripe Element will be inserted here. -->
               </div>

               <!-- Used to display form errors -->
               <div id="card-errors" role="alert"></div>
               </div>

               <button>Submit Payment</button>
         </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      </div>

    </div>
  </div>
</div>

   <!-- Button to Open the Modal -->
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
      Open modal
   </button>
    <?php  include_once 'inc/footer.php';
    include_once 'inc/scripts.php'?>
    <script>getShoppingBasketDetails()</script>
   <script src="https://js.stripe.com/v3/"></script>
   <script src="js/charge.js"></script>
</body>

</html>