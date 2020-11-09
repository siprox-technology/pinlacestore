<?php
require_once('lib/pdo_db.php');
class Payment{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function savePayment($data)
    {
        $query = "INSERT INTO payment 
        (amount,payment_method
        ,last_four_digit,
        payment_ref,FK_order_id_pay_order) VALUES
        ("."'".$data['amount']."'".
        ",'".$data['payment_method']."','".
        $data['last_4']."','".$data['transaction_id']."','".$data['order_id']."');";
        $this->db->query($query);  

        if(($this->db->execute()) && ($this->db->rowCount()>0))
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    
}

