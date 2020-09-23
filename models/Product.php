<?php
require_once('lib/pdo_db.php');
class Product{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getAllProducts()
    {
        $this->db->query('select distinct 
        product.id,brand,name,category,gender,imgFolder,price from 
        product
        inner join inventory
        where
        product.id = inventory.FK_product_id_inv_prod;');
        $results = $this->db->resultset();
        return $results;
    }

}


?>
