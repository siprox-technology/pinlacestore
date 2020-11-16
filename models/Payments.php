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

    public function getPayments($data)
    {
        $results = [];
        try{
            for($i=0; $i<count($data); $i++)
            {
                if(($data[$i]->status)=='1')
                {
                    $query = "SELECT * FROM payment where FK_order_id_pay_order=".$data[$i]->id;
                    $this->db->query($query);
                    array_push($results,$this->db->single());
                }
            }
            return $results;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    
}

