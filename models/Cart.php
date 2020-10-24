<?php
require_once('lib/pdo_db.php');

class Cart
{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function save($inventory_id,$quantity)
    {
        //hide the actual values 
        $data[0] = $inventory_id + 8420;
        $data[1] = $quantity;
        $data  = implode(",",$data);
        for($i=0;$i<count($_COOKIE);$i++)
        {
            if(!isset($_COOKIE["basket".$i]))
            {
                setcookie("basket".$i,$data);
                return true;
            }
        }
        return false;
    }

    public function delete($data)
    {
        //delete a basket
        if(isset($_COOKIE[$data]))
        {
            setcookie($data,'',time() - 3600);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getItems(){

        $results = [];
        for($i=0;$i<count($_COOKIE);$i++)
        {
            if(isset($_COOKIE["basket".$i]))
            {
                $results[$i] = explode(",", $_COOKIE["basket".$i]);
                $results[$i][0] = strval(($results[$i][0])-8420); 
                $results[$i][1] = strval(($results[$i][1])-6810); 
            }
        }
        return $results;
    }
}