<?php
require_once('lib/pdo_db.php');
class Order{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function saveOrder($data)
    {
        //temp var 
        $temp = false;
        //save order
        try{
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
                $temp = true;
            }
            else
            {
                $temp = false;
            }
        }    
        catch(Exception $e)
        {
            $temp = false;
        }
        if($temp == false)
        {
            return false;
        }
        //if save order is success proceed to save order items
        try
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
                    $temp = false;
                }
            }
            //ensure all items in the basket added to order_items
            if($row_count == count($data['order_items']))
            {
                $temp = true;
            }
            else
            {
                $temp = false;
            }    
            
        }
        catch(Exception $e)
        {
            $temp = false;
        }
        //if temp = false remove last order
        if($temp == false)
        {
            $this->deleteOrder($order_id);
            return false;
        }
        else
        {
            return $order_id;
        }
    }
    public function deleteOrder($id)
    {
        $query = "DELETE FROM orders WHERE id = ".$id;
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

    public function updateOrder_Payment_status($id)
    {
        $query = "UPDATE orders set status = 1,updated_at = CURRENT_TIMESTAMP() where id=".$id;
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
    
    public function getOrders($id)
    {
        //delete pending orders
        $this->deletePendingOrders();
        try{
            $query = "SELECT * FROM orders where FK_user_id_order_user=".$id." ORDER BY created_at desc";
            $this->db->query($query);
            $results = $this->db->resultset();
            return $results;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function getOrderDetails($id)
    {
        try{
            $query = "SELECT order_items.quantity,size,color,total_price,delivery_price,name,product.id,imgFolder from order_items inner join orders 
            on order_items.FK_order_id_items_order = orders.id
            inner join inventory 
            on order_items.FK_inventory_id_items_inven = inventory.id
            inner join product on
            inventory.FK_product_id_inv_prod = product.id
            where orders.id =".$id;
            $this->db->query($query);
            $results = $this->db->resultset();
            return $results;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
    //delete unpaid orders after 24 h = 86400 s
    private function deletePendingOrders()
    {
        try{
            $query = "DELETE FROM orders WHERE status = '0' AND (now() - orders.created_at) > '86400' ";
            $this->db->query($query);
            $results = $this->db->execute();
            return $results;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    function checkItemsBought($id,$email){
        try {
            $query = "SELECT * from user where email='".$email. "' and id in
            (SELECT FK_user_id_order_user from orders where id in
            (SELECT FK_order_id_items_order from order_items where FK_inventory_id_items_inven in 
            (SELECT id from inventory where FK_product_id_inv_prod =".$id.")));";
            $this->db->query($query);
           /*  $result = ; */
                if(($this->db->single()) && ($this->db->rowCount()>0))
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

