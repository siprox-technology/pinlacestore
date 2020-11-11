<?php
require_once('lib/pdo_db.php');
class Order{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function saveOrder($data)
    {
        //save order
        $query = "INSERT INTO orders 
        (delivery_price,total_price
        ,FK_user_id_order_user,
        FK_address_id_order_address) VALUES
        ("."'".$data['delivery_price']."'".
        ",'".$data['total_price']."','".
        $data['user_id']."','".$data['address_id']."');";
        $this->db->query($query);     

        if(($this->db->execute()) && ($this->db->rowCount()>0)) 
        {
            //get last inserted id from order
            $order_id = $this->db->lastInsertId();
            $row_count = 0;
            // insert items in order_items
            for($i=0; $i<count($data['order_items']); $i++)
            {
                $query = "INSERT INTO order_items 
                (FK_inventory_id_items_inven,FK_order_id_items_order
                ,quantity,
                price) VALUES
                ("."'".$data['order_items'][$i][1]."'".
                ",'".$order_id."','".
                $data['order_items'][$i][2]."','".$data['order_items'][$i][3]."');";
                $this->db->query($query);  
                if(($this->db->execute()) && ($this->db->rowCount()>0)) 
                {
                    $row_count++;
                }
                else
                {
                    //if can not insert order items delete last inserted order
                    $query = "DELETE FROM orders WHERE id = ".$order_id;
                    $this->db->query($query);
                    $this->db->execute();
                    return false;
                }
            }
            //ensure all items in the basket added to order_items
            if($row_count == count($data['order_items']))
            {
                return $order_id;
            }
            else
            {
                $query = "DELETE FROM orders WHERE id =".$order_id;
                $this->db->query($query);
                $this->db->execute();
                return false;
            }
        } 
        else 
        {
            return false;
        }

    }

    public function updateOrder_Payment_status($id)
    {
        $query = "UPDATE orders set status = 1 where id=".$id;
        $this->db->query($query);
        if($this->db->execute())
        {
            return true;
        } 
        else
        {
            return false;
        }
    }
    
    public function getOrders()
    {
        
    }
    
}

