<?php
/* $to_email = "soroosh_66m@yahoo.com";
$subject = "Simple Email Test via PHP";
$body = "Hi,nn This is test email send by PHP Script";
$headers = "From: sender\'s email";

if(mail($to_email, $subject, $body, $headers)) {echo 'sent';} else {echo "Email sending failed...";} */


/* $from    = 'pinlacestore@gmail.com';
$subject = 'Account Activation Required';
$email = 'sorooh_66m@yahoo.com';
$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
$activate_link = 'http://localhost/lang_inst v-3.0/inc/activate.php?email=' . $email . '&code=' . "123";
$message = '<p>Please click the following link to activate your account: <a href="' . $activate_link . '">' . $activate_link . '</a></p>';
$isSent = mail($email, $subject, $message, $headers);

if($isSent){echo 'send';}else{echo 'not send';} */

/* require_once ('lib/mail.php');
require_once ('config/db.php');
require_once ('lib/pdo_db.php'); */
require_once ('models/User.php');

$test = new User();

$isSent = $test->authenticate('integralproject1988@gmail.com','$2y$10$xCqotBop4nA.jRm7h7nyteuixmUkYHhFb3uh36bjzAe0l83xLSNY2');


if($isSent){echo 'ok';}else{echo 'failed';} 
?>