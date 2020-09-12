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
                            $newEmail->send_activation_email($POST['email'],$code);
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
                            $_SESSION['loggedIn'] = true;
                            $result = $user->get_user_data($POST['email']);
                            $_SESSION['id'] = $result->id;
                            $_SESSION['email'] = $result->email;
                            $_SESSION['name'] = $result->name;
                            $_SESSION['lastName'] = $result->lastName;
                            $_SESSION['phone'] = $result->phone;
                            $_SESSION['contacPref'] = $result->contacPref;
                            $_SESSION['created_at'] = $result->created_at;
                            $_SESSION['act_code'] = $result->act_code;
                            //redirect to profile page
                            header('location:user-profile.php');
                        }
                        else
                        {
                            session_unset();
                            session_destroy();
                            setcookie('PHPSESSID', '', time() - 3600,'/');
                            // report username and password incorrect
                            header('location:login.php?msg=incorrectCredentials');
                        }
                    }
                    catch(Exception $e)
                    {
                        session_unset();
                        session_destroy();
                        setcookie('PHPSESSID', '', time() - 3600,'/');
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
                    if($newMail->send_activation_email($_SESSION['email'],$user->get_user_data($_SESSION['email'])->act_code)){
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
                $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
                $POST['id'] = ($validate->validateDigits($_SESSION['id']))==true?$_SESSION['id']:false;
                
                if(($POST['name'])!==false && 
                ($POST['lastName'])!==false && 
                ($POST['phone'])!==false &&
                ($POST['_token'])!==false &&
                ($POST['id'])!==false&&
                ($request_name !==false)){
                    //set User Data
                    $userData = [
                        'email'=> $_SESSION['email'],
                        'name' => $POST['name'],
                        'lastName' => $POST['lastName'],
                        'phone' => $POST['phone'],
                        'id' => $POST['id']
                    ];
                    try{
                        require_once('models/User.php');
                        $newUser = new User();
                        if($newUser->updateUser($userData))
                        {
                            //update session data
                            $newData = $newUser->get_user_data($_SESSION['email']);
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
            $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
            $POST['id'] = ($validate->validateDigits($_SESSION['id']))==true?$_SESSION['id']:false;        
            if(($POST['oldPass'])!==false && 
            ($POST['newPass'])!==false && 
            ($POST['_token'])!==false &&
            ($POST['id'])!==false &&
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
                            'id' => $POST['id']
                        ];

                        //change pass
                        if($theUser->update_password($userData))
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
                        'id'=> ($user->get_user_data($POST['email']))->id,
                        'newPass'=>password_hash($POST['newPass'], PASSWORD_DEFAULT)
                    ];
                   if($user->update_password($userData))
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
        
        default:
        session_unset();
        session_destroy();
        setcookie('PHPSESSID', '', time() - 3600,'/');
        header('location:index.php');
        break;
    }
}