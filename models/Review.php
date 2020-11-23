<?php
require_once('lib/pdo_db.php');
class Review{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function isSubmitted($user_id, $product_id)
    {
        try{
            $query = "select * from review where FK_product_id_review_prod = '".$product_id."' 
            and FK_user_id_review_user = ".$user_id.";";
            $this->db->query($query);
            $result = $this->db->resultSet();
            if(($this->db->rowCount())>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        } 
        catch (\Throwable $th) 
        {
            return true;
        }
    }

    public function addReview($startNumber,$text,$product_id,$user_id)
    {
        try {
            $query = "INSERT INTO review (starNum,text,FK_product_id_review_prod,FK_user_id_review_user) VALUES
            ("."'".$startNumber."','".$text."','".$product_id."','".$user_id."');";
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
        catch (\Throwable $th) 
        {
            return false;
        }
    }
    
}