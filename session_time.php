<?php
session_start(); 
session_regenerate_id();


    if(empty($_SESSION['loggedIn']))
    { 
        echo "loggedOut";
    }

    /* to be un commented */
/*     if (isset($_SESSION['LAST_ACTIVITY']) && 
    (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {
    
        echo "timeOut";
    }
    else
    {
        $_SESSION['LAST_ACTIVITY'] = time();
    } */
?>