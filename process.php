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
        //add new user
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
                require_once('config/db.php');
                require_once('lib/pdo_db.php');
                //set User Data
                $userData = [
                    'email' => $POST['email'],
                    'name' => $POST['name'],
                    'last_name' => $POST['lastName'],
                    'phone' => $POST['phone'],
                    'password'=> $POST['password'],
                    'contactPref'=> $POST['contactPref']
                ];
                try{
                    require_once('models/User.php');
                    // Instantiate User
                    $user = new User();
                    // Add User To DB
                    if($user->addCustomer($userData))
                    {
                        session_unset();
                        session_destroy();
                        setcookie('PHPSESSID', '', time() - 3600,'/');
                        //send confirmation email with code to activate
                        //HERE
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

       default:
       session_unset();
       session_destroy();
       setcookie('PHPSESSID', '', time() - 3600,'/');
       header('location:index.php');
       break;
    }
}