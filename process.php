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
            

            if(($POST['name'])!==false && 
            ($POST['lastName'])!==false && 
            ($POST['email'])!==false && 
            ($POST['phone'])!==false &&
            ($POST['contactPref'])!==false &&
            ($POST['_token'])!==false &&
            ($request_name !==false))
            {
                require_once('lib/pdo_db.php');
                //set User Data
                //uniqe activation code
                $code = rand(11111,9999999);
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

                        session_unset();
                        session_destroy();
                        setcookie('PHPSESSID', '', time() - 3600,'/');
                        header('location:register.php?msg=useraddedsuccess');
                        break;
                    }
                    else
                    {
                        session_unset();
                        session_destroy();
                        setcookie('PHPSESSID', '', time() - 3600,'/');
                        header('location:register.php?msg=userexist');
                        break;
                    }
                }
                //catch db errors
                catch(Exception $e)
                {
                    session_unset();
                    session_destroy();
                    setcookie('PHPSESSID', '', time() - 3600,'/');
                    header('location:register.php?msg=databasefailed');
                    break;
    
                }
    
            }
            else
            {
                session_unset();
                session_destroy();
                setcookie('PHPSESSID', '', time() - 3600,'/');
                header('location:register.php?msg=formunvalid');
                break;
            }
       break;

       //log in user
       case 'sign in':
            // sanitize post array
            $POST['email'] = ($validate->validateEmail($_POST['loginEmail']))==true?$_POST['loginEmail']:false;
            $POST['password'] = ($validate->validateAnyname($_POST['loginPass']))==true?$_POST['loginPass']:false;
            $POST['_token'] = ($validate->validateDigits($_POST['_token']))==true?$_POST['_token']:false;
            // authenticate user
            if($POST['email']&&$POST['password']&&$POST['_token'])
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

       break;

       default:
       session_unset();
       session_destroy();
       setcookie('PHPSESSID', '', time() - 3600,'/');
       header('location:index.php');
       break;
    }
}