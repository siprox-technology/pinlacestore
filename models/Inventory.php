<?php
require_once('lib/pdo_db.php');

class Inventory
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function update_quantity($id,$quantity)
    {
        try{
            $query = "UPDATE inventory SET quantity=quantity+".$quantity." WHERE id=".$id;
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
        catch(Exception $e)
        {
            return false;
        }

    }


}