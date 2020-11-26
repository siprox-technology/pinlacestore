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
        imgFolder,inventory.id as inventory_id,
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

    public function searchProducts($key)
    {
        // prepare query
        $query = "SELECT id,brand as value,CONCAT(brand,' ',name,' ',category) as label,description,
        imgFolder
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


    public function getProductDetails($id)
    {
        // get product info
        $query = "SELECT * from product where id =".$id;
        $this->db->query($query);
        $productData = $this->db->resultset();
        //get inventory info
        $query = "SELECT * from inventory where quantity !='0' and 
        FK_product_id_inv_prod=".$id;
        $this->db->query($query);
        $inventoryData = $this->db->resultset();
        //get image list names
        $dir  = 'images/img-list/'.$productData[0]->imgFolder; 
        $imgList = scandir($dir);
        $imageList=[];
        //remove file extensions from image file names
        for($i=0; $i<count($imgList);$i++)
        {
            $imgList[$i] = str_replace(".","",$imgList[$i]);
            $imgList[$i] = str_replace("..","",$imgList[$i]);
            $imgList[$i] = str_replace("jpg","",$imgList[$i]);
            if($imgList[$i]!=="")
            {
                array_push($imageList,$imgList[$i]);
            }
        }
        //get related products
        $query = "select distinct 
        (select MIN(price) from inventory where FK_product_id_inv_prod =".$id.") as price,
        (select MAX(discount) from inventory where FK_product_id_inv_prod =".$id.") as discount,
        (product.id) as id,brand,name,category,description,imgFolder from inventory inner join
        product
        on inventory.FK_product_id_inv_prod = product.id
        where category = (select category from product where id =".$id.");";
        $this->db->query($query);
        $relatedProducts = $this->db->resultset();

        //result array
        $result[0] = $productData;
        $result[1] = $inventoryData;
        $result[2] = $imageList;
        $result[3] = $relatedProducts;
        return $result;
    }

    public function checkInventory($id,$size,$color,$quantity)
    {
        //returns inventory id if quantity is more than 1
        // get inventory info
        $query = "SELECT * FROM inventory
        where FK_product_id_inv_prod ='".$id."' 
        and size ='".$size."' and color='".$color."' and quantity >='".$quantity."';";
        $this->db->query($query);
        $productData = $this->db->resultset();
        if(count($productData)==1)
        {
           return $productData[0]->id;
        }
        else
        {
            return false;
        }

    }
    public function getInventoryDetails($inventory_id)
    {
        $query = "SELECT * FROM product inner join inventory
        on product.id = inventory.FK_product_id_inv_prod 
        where inventory.id =".$inventory_id;  
        $this->db->query($query);
        $productData = $this->db->resultset();
        if(count($productData)==1)
        {
            return $productData[0];
        }
        else
        {
            return false;
        }
    }
   

}


?>
