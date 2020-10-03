<?php
require_once('lib/pdo_db.php');
class Product{

    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    //default is show products order by price ascending
    public function getAllProducts()
    {
        $this->db->query('select distinct 
        product.id,brand,name,category,gender,imgFolder,price,(SELECT MAX(discount) FROM inventory 
        where FK_product_id_inv_prod = product.id) as discount from 
        product
        inner join inventory
        where
        product.id = inventory.FK_product_id_inv_prod order by price asc;');
        $results = $this->db->resultset();
        return $results;
    }

    public function getAllFilters(){
        $this->db->query('select distinct brand,category,size,color
        from product
        inner join inventory
        where
        product.id = inventory.FK_product_id_inv_prod;');
        $results = $this->db->resultset();
        return $results;
    }

    public function filterProducts($data){
        // Prepare Query

        $brand=$category=$gender=$size=$color=$orderBy=$dir= "";
        // Bind Values
        $brand = (($data['brand'])=='All%'?'%':$data['brand']);
        $category = (($data['category'])=='All%'?'%':$data['category']);
        $gender = (($data['gender'])=='All%'?'%':$data['gender']);
        $size = (($data['size'])=='All%'?'%':$data['size']);
        $color = (($data['color'])=='All%'?'%':$data['color']);
        switch($data['orderBy'])
        {
            case 'Price-low to high%':
                $orderBy = 'price';
                $dir = 'asc';
            break;

            case 'Price-high to low%':
                $orderBy = 'price';
                $dir = 'desc';
            break;

            case 'Discount-highest%':
                $orderBy = 'discount';
                $dir = 'desc';
            break;

            case 'Discount-lowest%':
                $orderBy = 'discount';
                $dir = 'asc';
            break;
        }
        $query = "SELECT product.id as product_id,brand,name,category,gender,description,
        saleRecordNum,imgFolder,inventory.id as inventory_id,
        color,size,price,discount,quantity
        from product
        inner join inventory
        where
        product.id = inventory.FK_product_id_inv_prod and 
        brand like "."'".$brand."'"."and
        category like "."'".$category."'"." and
        gender like "."'".$gender."'"." and
        size like "."'".$size."'"." and
        color like "."'".$color."'"." order by ".$orderBy." ".$dir."
        ;";
        $this->db->query($query);
    
        $results = $this->db->resultset();
        return $results;
    }

    //search products by brand category name

    public function searchProducts($key)
    {
                // prepare query
                $query = "SELECT id,brand as value,CONCAT(brand,' ',name,' ',category) as label,description,
                saleRecordNum,imgFolder
                from product
                where
                brand like "."'".$key."'"."or
                category like "."'".$key."'"."or
                name like "."'".$key."'". "or
                CONCAT(brand,' ',name,' ',category) like"."'".$key."';";
                //execute
                $this->db->query($query);
                $results = $this->db->resultset();
                return $results;
    }

    

   

}


?>
