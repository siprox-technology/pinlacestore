<?php
require_once("config/email-info.php");
  class Mail{

    private $from = MAIL_FROM;
    private $act_subject = "Account Activation Required";
    private $headers;
    private $activate_link;
    private $activate_msg;

    private $to;
    private $act_code;

    public function __construct(){
        $this->headers = 'From: ' . $this->from . "\r\n" . 'Reply-To: ' . $this->from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";;
      }

    public function send_verification_email($to_email,$code){
       $this->to = $to_email;
       $this->act_code = $code;
       $this->activate_link = HOST_NAME.'user-activation.php?email=' . $this->to . '&code=' . $this->act_code;
       $this->activate_msg = '<p>Please click the following link to verify your account: <a href="' . $this->activate_link . '">' . $this->activate_link . '</a></p>'; 

       if(mail($this->to,$this->act_subject,$this->activate_msg,$this->headers))
       {
         return true;
       }
       else
       {
         return false;
       }
    }
    public function send_random_number($to_email,$number){
      $this->to = $to_email;

      if(mail($this->to,'Reset password code','Please use the following code to reset your password: '.'<b>'.$number.'</b>',$this->headers))
      {
        return true;
      }
      else
      {
        return false;
      }
    }
    public function send_order_confirmation($to_email,$data)
    {
      $this->to = $to_email;
      if(mail($this->to,'Order number: '.$data['order_id'] .
      ' confirmation',
      '<h3>Your order has been successfully submitted with the following information:</h3>.<br>'.
      'Order number: '.'<b>'.$data['order_id'].'</b><br>'.
      'Payment transaction ID: '.'<b>'.$data['transaction_id'].'</b><br>'.
      'Amount: '.'<b>$'.$data['amount'].'</b><br>'.
      'Payment method: '.'<b>'.$data['payment_method'].'****'.$data['last_4'].'</b><br>',
      $this->headers))
      {
        return true;
      }
      else
      {
        return false;
      }

    }


  }
