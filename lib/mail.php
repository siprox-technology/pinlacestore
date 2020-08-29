<?php

  class Mail{

    private $from = "pinlacestore@gmail.com";
    private $act_subject = "Account Activation Required";
    private $headers;
    private $activate_link;
    private $activate_msg;

    private $to;
    private $act_code;

    public function __construct(){
        $this->headers = 'From: ' . $this->from . "\r\n" . 'Reply-To: ' . $this->from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";;
      }

    public function send_activation_email($to_email,$code){
       $this->to = $to_email;
       $this->act_code = $code;
       $this->activate_link = 'http://localhost/lang_inst v-3.0/inc/activate.php?email=' . $this->to . '&code=' . $this->act_code;/* here activation link and page */
       $this->activate_msg = '<p>Please click the following link to activate your account: <a href="' . $this->activate_link . '">' . $this->activate_link . '</a></p>'; 

       if(mail($this->to,$this->act_subject,$this->activate_msg,$this->headers))
       {
         return true;
       }
       else
       {
         return false;
       }
    }

  }
