<?php
/*  receive post request */
session_start();
session_regenerate_id();

if($_SERVER['REQUEST_METHOD']!== 'POST'
|| (!isset($_POST['request_name']))
|| (!isset($_POST['_token']))
|| (!isset($_SESSION['_token']))
|| ($_POST['_token']!== $_SESSION['_token']))
{
    session_unset();
    session_destroy();
    setcookie('PHPSESSID', '', time() - 3600,'/');
    header('location:index.php');
}
else
{
    /* set error handler */
    set_error_handler (
    function($errno, $errstr, $errfile, $errline) {
        throw new ErrorException($errstr, $errno, 0, $errfile, $errline);     
    });
    require_once('lib/validate.php');
    $validate = new Validate();
    
    // set request name
    $request_name = ($validate->validateAnyname($_POST['request_name']))== true? $_POST['request_name']: false;
    
    // switch requests
    switch($request_name)
    {
        //add new user-->
        case 'register user':
                //set default contact preferences to SMS
                if(isset($_POST['contactPref'])){
                    $POST['contactPref']= ($validate->validateDigits($_POST['contactPref']))==true?$_POST['contactPref']:false;
                }else{
                    $POST['contactPref']= '0';}
                // sanitize post array
                $POST['name'] = ($validate->validateAnyname($_POST['name']))==true?$_POST['name']:false;
                $POST['lastName'] = ($validate->validateAnyname($_POST['lastName']))==true?$_POST['lastName']:false;
                $POST['email'] = ($validate->validateEmail($_POST['email']))==true?$_POST['email']:false;
                $POST['phone'] = ($validate->validtePhone($_POST['phone']))==true? $_POST['phone']:false;
                $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
                $POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                

                if(($POST['name'])&& 
                ($POST['lastName']) && 
                ($POST['email'])&& 
                ($POST['phone'])&&
                ($POST['contactPref'])&&
                ($POST['_token'])&&
                ($request_name))
                {
                    //uniqe activation code
                    $code = rand(11111,9999999);
                    //set User Data
                    $userData = [
                        'email' => $POST['email'],
                        'name' => $POST['name'],
                        'last_name' => $POST['lastName'],
                        'phone' => $POST['phone'],
                        'password'=> $POST['password'],
                        'contactPref'=> $POST['contactPref'],
                        'act_code' => $code
                    ];
                    try{
                        require_once('models/User.php');
                        // Instantiate User
                        $user = new User();
                        // Add User To DB
                        if($user->addUser($userData))
                        {
                            //SEND activation link to user email address
                            require_once ('lib/mail.php');
                            $newEmail = new Mail();
                            $newEmail->send_verification_email($POST['email'],$code);
                            header('location:register.php?msg=useraddedsuccess');
                            break;
                        }
                        else
                        {
                            header('location:register.php?msg=userexist');
                            break;
                        }
                    }
                    //catch db errors
                    catch(Exception $e)
                    {
                        header('location:register.php?msg=databasefailed');
                        break;
                    }
                }
                else
                {
                    header('location:register.php?msg=forminvalid');
                    break;
                }
        break;

        //log in user
        case 'sign in':
                // sanitize post array
                $POST['email'] = ($validate->validateEmail($_POST['loginEmail']))==true?$_POST['loginEmail']:false;
                $POST['password'] = $_POST['loginPass'];
                $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
                // authenticate user
                if($POST['email']&&$POST['_token'])
                {
                    try{
                        require_once('models/User.php');
                        $user = new User();
                        if($user->authenticate($POST['email'],$POST['password'])){
                            $result = $user->getUserData($POST['email']);
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['id'] = $result->id;
                            $_SESSION['email'] = $result->email;
                            $_SESSION['name'] = $result->name;
                            $_SESSION['lastName'] = $result->lastName;
                            $_SESSION['phone'] = $result->phone;
                            $_SESSION['contacPref'] = $result->contacPref;
                            $_SESSION['created_at'] = $result->created_at;
                            $_SESSION['act_code'] = $result->act_code;
                            $addresses = $user->getUserAddresses($_SESSION['id']);
                            if(count($addresses)>0){
                                for($i = 0; $i<count($addresses); $i++)
                                {
                                    $_SESSION['address'.($addresses[$i]->number)]['number']=$addresses[$i]->number;
                                    $_SESSION['address'.($addresses[$i]->number)]['id']=$addresses[$i]->id;
                                    $_SESSION['address'.($addresses[$i]->number)]['address']=$addresses[$i]->address;
                                    $_SESSION['address'.($addresses[$i]->number)]['city']=$addresses[$i]->city;
                                    $_SESSION['address'.($addresses[$i]->number)]['state']=$addresses[$i]->state;
                                    $_SESSION['address'.($addresses[$i]->number)]['country']=$addresses[$i]->country;
                                    $_SESSION['address'.($addresses[$i]->number)]['postCode']=$addresses[$i]->postCode;
                                }
                            } 

                            //redirect to profile page
                            header('location:user-profile.php');
                        }
                        else
                        {
                            // report username and password incorrect
                            header('location:login.php?msg=incorrectCredentials');
                        }
                    }
                    catch(Exception $e)
                    {
                        // report something wrong with server
                        header('location:login.php?msg=serverError');
                    }
                }
                else
                {
                    header('location:login.php?msg=invalidforminput');
                    break;
                }

        break;

        //resend verification email
        case 'resend verification email':
                try{
                    //get verification code and send email
                    require_once('models/User.php'); 
                    $user = new User();
                    require_once('lib/mail.php');
                    $newMail = new Mail();
                    // if email is sent successfully 
                    if($newMail->send_verification_email($_SESSION['email'],$user->getUserData($_SESSION['email'])->act_code)){
                        echo 'Email sent success';
                    }
                    else
                    {
                        echo 'Email not sent';
                    }
                }
                catch(Exception $e){
                echo 'db error';
                }
        break;

        //edit account details
        case 'edit account details':
                // sanitize post array
                $POST['name'] = ($validate->validateAnyname($_POST['name']))==true?$_POST['name']:false;
                $POST['lastName'] = ($validate->validateAnyname($_POST['lastName']))==true?$_POST['lastName']:false;
                $POST['phone'] = ($validate->validtePhone($_POST['phone']))==true? $_POST['phone']:false;
                
                if(($POST['name']) && 
                ($POST['lastName']) && 
                ($POST['phone']) &&
                ($request_name )){
                    //set User Data
                    $userData = [
                        'email'=> $_SESSION['email'],
                        'name' => $POST['name'],
                        'lastName' => $POST['lastName'],
                        'phone' => $POST['phone'],
                        'id' => $_SESSION['id']
                    ];
                    try{
                        require_once('models/User.php');
                        $newUser = new User();
                        if($newUser->updateUser($userData))
                        {
                            //update session data
                            $newData = $newUser->getUserData($_SESSION['email']);
                            $_SESSION['name']=$newData->name;
                            $_SESSION['lastName']=$newData->lastName;
                            $_SESSION['phone']=$newData->phone;
                            header('location:edit-acc-details.php?msg=userupdatesuccess');
                            break;
                        }
                        else
                        {
                            header('location:edit-acc-details.php?msg=noaccounttoupdate');
                            break;
                        }
                        
                    }
                    catch(Exception $e)
                    {
                        header('location:edit-acc-details.php?msg=databasefailed');
                        break;
                    }
                }
                else
                {
                    header('location:edit-acc-details.php?msg=forminvalid');
                    break;
                }

        break;

        //change user password
        case 'change user password':
            // sanitize post array
            $POST['oldPass'] = ($validate->validateAnyname($_POST['oldPass']))==true?$_POST['oldPass']:false;
            $POST['newPass'] = ($validate->validateAnyname($_POST['newPass']))==true?$_POST['newPass']:false;    
            if(($POST['oldPass'])!==false && 
            ($POST['newPass'])!==false && 
            ($request_name !==false))
            {
                try{
                    require_once('models/User.php');
                    $theUser = new User();
                    //check old pass
                    if($theUser->authenticate($_SESSION['email'],$POST['oldPass']))
                    {
                        //set User Data
                        $userData = [
                            'newPass' => password_hash($POST['newPass'], PASSWORD_DEFAULT), 
                            'id' => $_SESSION['id']
                        ];

                        //change pass
                        if($theUser->updatePassword($userData))
                        {
                            header('location:change-pass.php?msg=changepasssuccess');
                            break;
                        }
                        else
                        {
                            header('location:change-pass.php?msg=noaccounttoupdate');
                            break;
                        }

                    }
                    else
                    {
                        header('location:change-pass.php?msg=oldpasswrong');
                        break;
                    }

                }
                catch(Exception $e)
                {
                    header('location:change-pass.php?msg=databasefailed');
                    break;
                }

            }
            else
            {
                header('location:change-pass.php?msg=forminvalid');
                break;
            }
        break;
       
        //send temporary activation code for password reset
        case 'send activation code to email':
            try{
                //validate post array
                $POST['email'] =  ($validate->validateEmail($_POST['email']))==true?$_POST['email']:false;
                if($POST['email'])
                {
                    //create a random number
                    $random = rand(11111,99999999);
                    //save random number and email to the active session
                    $_SESSION['random_code'] = $random;
                    $_SESSION['email'] = $POST['email'];
                    //email the number to user 
                    require_once('lib/mail.php');
                    $newMail = new Mail();
                    if($newMail->send_random_number($POST['email'],$random))
                    {
                        echo 'codesent';
                        break;
                    }
                    else
                    {
                        $_SESSION['random_code'] = Null;
                        echo 'unabletosendemail';
                        break;
                    }
                    //redirect to reset pass with code page
                }
                else
                {
                    echo 'emailinvalid';
                    break;
                }
                
            }
            catch(Exception $e)
            {
                echo 'serverProblem';
                break;
            }
        break;

        //reset user password with code 
        case 'reset user password':
            // check inputs
            $POST['code'] = ($validate->validateDigits($_POST['resetCode']))==true?$_POST['resetCode']:false;
            $POST['email'] = ($validate->validateEmail($_SESSION['email']))==true?$_SESSION['email']:false;
            $POST['newPass'] = $_POST['newPass'];
            if(($POST['code']) && (($POST['code'] == $_SESSION['random_code'])))
            {
                try{
                    require_once('models/User.php');
                    $user = new User();
                    //set User Data
                    $userData = [
                        'id'=> ($user->getUserData($POST['email']))->id,
                        'newPass'=>password_hash($POST['newPass'], PASSWORD_DEFAULT)
                    ];
                   if($user->updatePassword($userData))
                   {
                        header('location:reset-pass.php?msg=updatepasssuccess');
                        break;
                   }
                   else
                   {
                        header('location:reset-pass.php?msg=noaccounttoupdate');
                        break;
                   }
                }
                catch(Exception $e)
                {
                    header('location:reset-pass.php?msg=dberror');
                    break;
                }

            }
            else
            {
                header('location:reset-pass.php?msg=codeinvalid');
                break;
            }  

        break;

        //add new address
        case 'add new address':

                // sanitize post array
                $POST['number'] = (($_POST['number']>0) && ($_POST['number']<7))==true?$_POST['number']:false;
                $POST['address'] = ($validate->validateAnyname($_POST['address']))==true?$_POST['address']:false;
                $POST['city'] = ($validate->validateAnyname($_POST['city']))==true?$_POST['city']:false;
                $POST['state'] = ($validate->validateAnyname($_POST['state']))==true?$_POST['state']:false;
                $POST['country'] = ($validate->validateAnyname($_POST['country']))==true? $_POST['country']:false;
                $POST['postCode'] = ($validate->validateAnyname($_POST['postCode']))==true?$_POST['postCode']:false;
                $POST['FK_id'] = $_SESSION['id'];
                

                if(($POST['number']) && 
                ($POST['address'])&& 
                ($POST['city']) && 
                ($POST['state'])&& 
                ($POST['country'])&&
                ($POST['postCode'])&&
                ($POST['FK_id'])&&
                ($request_name))
                {
                    //set User Data
                    $userData = [
                        'number'=>$POST['number'],
                        'address' => $POST['address'],
                        'city' => $POST['city'],
                        'state' => $POST['state'],
                        'country' => $POST['country'],
                        'postCode' => $POST['postCode'],
                        'FK_id'=> $POST['FK_id'],
                    ];
                    try{
                        require_once('models/User.php');
                        // Instantiate User
                        $user = new User();
                        // Add User To DB
                        if($user->addAddress($userData))
                        {
                            //add address array to session
                            $_SESSION['address'.$_POST['number']] = $userData;
                            header('location:address.php?msg=addressaddsuccess');
                            break;
                        }
                        else
                        {
                            header('location:address.php?msg=addressexist');
                            break;
                        }
                    }
                    //catch db errors
                    catch(Exception $e)
                    {
                        header('location:address.php?msg=databasefailed');
                        break;
                    }
                }
                else
                {
                    header('location:address.php?msg=forminvalid');
                    break;
                }

        break;    

        //remove an address
        case 'remove an address':
            $POST['number'] = ($validate->validateDigits($_POST['number']))==true?$_POST['number']:false;
            $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
            if(($request_name)&&($POST['number'])&&($POST['_token']))
                {
                    try
                    {
                        require_once('models/User.php');
                        $user = new user();
                        $data = [
                            'id' =>$_SESSION['id'],
                            'number'=>$POST['number']
                        ];
                        if($user->removeAddress($data))
                        {
                            
                            $_SESSION['address'.$data['number']]=null;
                            header('location:address.php');
                            break;
                        }
                        else
                        {
                            header('location:address.php');
                            break;
                        }
                    }
                    catch(Exception $e)
                    {
                        header('location:address.php?msg=databasefailed');
                        break;
                    }
                }
                else
                {
                    header('location:address.php?msg=forminvalid');
                    break;
                }
        break;    

        //get all products
        case 'get all products':
            try{
               require_once('models/Product.php');
               $products = new Product();
               echo json_encode($products->getAllProducts());
            }
            catch(Exception $e)
            {
                echo 'server error';
                break;
            }
        break;

        //get all filters
        case 'get all filters':
            try{
                require_once('models/Product.php');
                $products = new Product();
                echo json_encode($products->getAllFilters());
             }
             catch(Exception $e)
             {
                 echo 'server error';
                 break;
             }  
        break;

        //filter products
        case 'filter products':
            //sanitize post array
            $POST['brand'] = ($validate->validateAnyname($_POST['brand']))== true?$_POST['brand'].'%':false; 
            $POST['category'] = ($validate->validateAnyname($_POST['category']))== true?$_POST['category'].'%':false; 
            $POST['gender'] = ($validate->validateAnyname($_POST['gender']))== true?$_POST['gender'].'%':false; 
            $POST['size'] = ($validate->validateSize($_POST['size']))== true?$_POST['size'].'%':false;         
            $POST['color'] = ($validate->validateColor($_POST['color']))== true?$_POST['color'].'%':false; 
            $POST['orderBy'] = ($validate->validateAnyname($_POST['orderBy']))== true?$_POST['orderBy'].'%':false; 
            if($POST['brand']&&
            $POST['category']&&
            $POST['gender']&&
            $POST['size']&&
            $POST['color']&&
            $POST['orderBy'])
            {
                //filter products
                try
                {
                    //set filter array
                    $filters = [
                        'brand'=>$POST['brand'],
                        'category' => $POST['category'],
                        'gender' => $POST['gender'],
                        'size' => $POST['size'],
                        'color' => $POST['color'],
                        'orderBy' => $POST['orderBy']
                    ];
                    require_once('models/Product.php');
                    $products = new Product();
                    echo json_encode($products->filterProducts($filters));

                }
                catch(Exception $e)
                {
                    echo "server error";
                    break;
                }
            }
            else
            {
                echo "invalid parameters";
                break;
            }
        break;
        
        //search products
        case 'search products':
            // validate input
            $POST['keyWord'] = ($validate->validateAnyname($_POST['keyWord']))==true?$_POST['keyWord'].'%':false;
            // get results
            if($POST['keyWord'])
            {
                try{
                    require_once('models/Product.php');
                    $products = new Product();
                    echo json_encode($products->searchProducts($POST['keyWord']));
                }
                catch(Exception $e)
                {
                    echo 'server error';
                    break;
                }
            }
            else
            {
                echo 'server error';
                break;
            }

        break;

        //get product details
        case 'get product details':
            $POST['id']= $validate->validateDigits($_POST['product_id'])==true?$_POST['product_id']:false;
            if($POST['id'])
            {
                try{
                    require_once('models/Product.php');
                    $product = new Product();
                    echo json_encode($product->getProductDetails($POST['id']));
                }
                catch(Exception $e)
                {
                    echo 'server error';
                    break;
                }
            }
            else
            {
                echo 'server error';
                break;
            }
        break;

        //add items to cart
        case 'add items to basket':
            $POST['product_id'] = ($validate->validateDigits($_POST['product_id']))==true?$_POST['product_id']:false;
            $POST['size'] = ($validate->validateSize($_POST['size']))==true?$_POST['size']:false;
            $POST['color'] = ($validate->validateAnyname($_POST['color']))==true?$_POST['color']:false;
            $POST['quantity'] = ($validate->validateDigits($_POST['quantity']))==true? $_POST['quantity']:false;          
            
            if($POST['product_id']&&$POST['size']&&$POST['color']&&$POST['quantity'])
            {
                try
                {
                    require_once('models/Product.php');
                    $newProduct = new Product();
                
                    if(($newProduct->checkInventory($POST['product_id'],$POST['size'],$POST['color'],$POST['quantity'])) !== false)
                    {
                        $inventory_id = $newProduct->checkInventory($POST['product_id'],$POST['size'],$POST['color'],$POST['quantity']);
                        require_once('models/Cart.php');
                        $newCookie = new Cart();
                        if($newCookie->save($inventory_id,$POST['quantity']))
                        {
                            echo 'item saved success';
                        }
                    }
                    else
                    {
                        echo 'quantity not available';
                    }
                }
                catch(Exception $e)
                {
                    echo 'server error';
                }
 
            }
            else
            {
                echo 'invalid params';
            }

        break;

        //get shopping basket details
        case 'get shopping basket':
            try
            {
                require_once('models/Product.php');
                require_once('models/Cart.php');
                $prod = new Product();
                $cart = new Cart();
                $items = $cart->getItems();
                $basket = [];
                for($i=0; $i<count($items);$i++)
                {
                    $basket[$i][0] = $prod->getInventoryDetails($items[$i][1]);
                    $basket[$i][1]= $items[$i][0];
                    $basket[$i][2]=$items[$i][2];
                }
                echo json_encode($basket);
            }
            catch(Exception $e)
            {
                echo 'server error';
            }

        break;

        //delete basket items
        case 'delete basket items':
            $POST['basket_name'] = ($validate->validateAnyname($_POST['basket_name']))==true?$_POST['basket_name']:false;
            if($POST['basket_name'])
            {
                try
                {
                    require_once('models/Cart.php');
                    $cart = new Cart();
                    $cart->delete($POST['basket_name']);
                }
                catch(Exception $e)
                {
                    echo 'server error';
                }
            }
        break;

        case 'save order':
            //validate order items
            $POST['order_items'] = json_decode($_POST['order_items']);
            $order_items_count= count($POST['order_items']);
            for($i=0; $i<$order_items_count;$i++)
            {
                if(
                    ($validate->validateAnyname($POST['order_items'][$i][0])==false)||
                    ($validate->validateDigits($POST['order_items'][$i][1])==false)||
                    ($validate->validateDigits($POST['order_items'][$i][2])==false)||
                    ($validate->validateDigits($POST['order_items'][$i][3])==false)
                )
                {
                    $POST['order_items']= false;
                }
            }
            //validate order info
            $POST['user_id'] = ($validate->validateDigits($_POST['user_id']))==true?$_POST['user_id']:false;
            $POST['address_id'] = ($validate->validateSize($_POST['address_id']))==true?$_POST['address_id']:false;
            $POST['delivery_price'] = ($validate->validateAnyname($_POST['delivery_price']))==true?$_POST['delivery_price']:false;
            $POST['total_price'] = ($validate->validateDigits($_POST['total_price']))==true? $_POST['total_price']:false;          
            // save order with order items
            require_once('models/Order.php');
            require_once('models/Cart.php');
            require_once('models/Inventory.php');
            $newOrder = new Order();
            $shopping_cart = new Cart();
            $inventory = new Inventory();
            $result = [];
            $isUpdated = false;
            //if order saves success delete basket
            $order_id = $newOrder->saveOrder($POST);
            if($order_id)
            {
                //update inventory and delete shopping cart
                for($i=0;$i<count($POST['order_items']);$i++)
                {
                    $isUpdated = $inventory->update_quantity($POST['order_items'][$i][1],(($POST['order_items'][$i][2])*(-1)));
                    if($isUpdated == false) {break;}
                    $shopping_cart->delete($POST['order_items'][$i][0]);

                }
                if($isUpdated)
                {
                    $result[0]='order save success';
                    $result[1] = $order_id;
                }
                else
                {
                    $newOrder->deleteOrder($order_id);
                    $result[0]='order save failed-inventory or cart object';
                }
            }
            else
            {
                $result[0]='order save failed';
            }
            echo json_encode($result);
        break;
        
        // payment request to stripe API

        case 'payment':      
            require_once('vendor/autoload.php');
            require_once('config/db.php');
            require_once('lib/pdo_db.php');
            require_once('models/Payments.php');
            require_once('models/Order.php');
            
            // This is your real test secret API key.
            \Stripe\Stripe::setApiKey('sk_test_51HcWlxGzZBtnGj1lUdweCw4OboX34Ku0oaXsjzQ06qygmZRlileOThhDPjB3nF2PMjeCdEoCstRi3CvUTFLrR5KP00A7XFd8hP');
            
            $payment_status[] = '';
            $temp = false;
            $stripe_customer_id = '';
            // Sanitize POST Array
            $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
            $name = ($validate->validateAnyname($POST['name'])==true)?$POST['name']:false;
            $email = ($validate->validateEmail($POST['email'])==true)?$POST['email']:false;
            $address_line_1 = ($validate->validateAnyname($POST['address_line_1'])==true)?$POST['address_line_1']:false;
            $country = ($validate->validateAnyname($POST['country'])==true)?$POST['country']:false;
            $zip = ($validate->validateAnyname($POST['zip_code'])==true)?$POST['zip_code']:false;
            $amount = ($validate->validateDigits($POST['amount'])==true)?$POST['amount']:false;
            $user_id = ($validate->validateDigits($POST['user_id'])==true)?$POST['user_id']:false;
            $order_id = ($validate->validateDigits($POST['order_id'])==true)?$POST['order_id']:false;
            $token = $POST['stripeToken'];
            
            /* address array for customer*/
            $address = [
                "line1"=>$address_line_1,
                "country" => $country,
                "postal_code"=>$zip
            ];
            //----new code starts--

            if(
            (($name == true)&&
            ($email == true)&&
            ($address_line_1 == true)&&
            ($country == true)&&
            ($zip == true)&&
            ($amount == true)&&
            ($user_id == true)&&
            ($order_id == true)&&
            ($POST == true))
            ){
                //add customer
                try
                {
                    $customer = \Stripe\Customer::create(array(
                        "name" =>$name,
                    "email" => $email,
                    "address" => $address,
                    "source" => $token
                    ));
                    $stripe_customer_id = $customer->id;
                }
                catch(\Stripe\Exception\CardException $e) 
                {
                    //The zip code you supplied failed validation.
                    //Your card's security code is incorrect.
                    //Your card has insufficient funds.
                    //Your card was declined.
                    //Your card has expired.
                    //Your card's security code is incorrect.
                    //An error occurred while processing your card. Try again in a little bit.
                    $payment_status = 'Payment failed: '.$e->getMessage();
                    header('location:payment-result.php?status='.$payment_status);
                    break;
                } 
                catch(Exception $e)
                {
                    $payment_status = 'payment failed : can not add customer';
                    header('location:payment-result.php?status='.$payment_status);
                    break;
                }
            }
            else
            {
                $payment_status = 'payment failed : parameters invalid';
                header('location:payment-result.php?status='.$payment_status);
                break;
            }
    
            //charge 
            try{
                header('Content-Type: application/json');
                $charge = \Stripe\Charge::create(array(
                "amount" => ($POST['amount'])*100,
                "currency" => "usd",
                "description" => "order number: ".$POST['order_id'],
                "customer" => $customer->id
                ));
                $transactionData = [
                    'transaction_id' => $charge->id,
                    'amount' => (($charge->amount)/100),
                    'currency' => $charge->currency,
                    'payment_method' =>$charge->payment_method_details->card->network,
                    'last_4' => $charge->payment_method_details->card->last4,
                    'order_id'=>$order_id
                    ];
            }
            catch(\Stripe\Exception\CardException $e) 
            {
                //The zip code you supplied failed validation.
                //Your card's security code is incorrect.
                //Your card has insufficient funds.
                //Your card was declined.
                //Your card has expired.
                //Your card's security code is incorrect.
                //An error occurred while processing your card. Try again in a little bit.
                
                //delete customer if charge fails
                $stripe = new \Stripe\StripeClient(
                    'sk_test_51HcWlxGzZBtnGj1lUdweCw4OboX34Ku0oaXsjzQ06qygmZRlileOThhDPjB3nF2PMjeCdEoCstRi3CvUTFLrR5KP00A7XFd8hP'
                    );
                    $stripe->customers->delete(
                    $stripe_customer_id,
                    []
                    );
                $payment_status = 'Payment failed: '.$e->getMessage();
                header('location:payment-result.php?status='.$payment_status);
                break;
            } 
            catch(Exception $e)
            {
                //delete customer if charge fails
                $stripe = new \Stripe\StripeClient(
                    'sk_test_51HcWlxGzZBtnGj1lUdweCw4OboX34Ku0oaXsjzQ06qygmZRlileOThhDPjB3nF2PMjeCdEoCstRi3CvUTFLrR5KP00A7XFd8hP'
                    );
                    $stripe->customers->delete(
                    $stripe_customer_id,
                    []
                    );
                $payment_status = 'Payment failed: please try again later';
                header('location:payment-result.php?status='.$payment_status);
                break;
            }

            //save payment info
            try
            {
                /* add transaction to payments-***- keep testing ****/

                $payment = new Payment();
                $order = new Order();
                $x = $payment->savePayment($transactionData);
                $y = $order->updateOrder_Payment_status($order_id);
                //---------------testing---------------------------

                $payment_status = "payment success";
                header('location:payment-result.php?status='.$payment_status.
                '&tid='.$transactionData['transaction_id'].
                '&amount='.$transactionData['amount'].'&currency='.
                $transactionData['currency'].'&payment_method='.
                $transactionData['payment_method'].'&last_4='.
                $transactionData['last_4'].'&order_id='.$transactionData['order_id']);
            }
            catch(Exception $e)
            {

                $payment_status = 'Payment success: Payment info could not be saved in system'.$e->getMessage();;
                header('location:payment-result.php?status='.$payment_status);
                break;
            }

            //---new code ends--
        break;

        
        default:
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600,'/');
        header('location:index.php');
        break;
    }
}