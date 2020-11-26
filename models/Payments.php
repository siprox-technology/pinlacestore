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
            if(count($results)<1)
            {
                $results[0] = "";
            }
            
            return $results;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    //idempotency_key' for stripe post requests
    public function gen_uuid() {
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
    
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }

    
}

