<?php
class User{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function addCustomer($data) {
        //search if user not already exist
        // Prepare Query
        $this->db->query('INSERT INTO user 
        (email,name,lastName,phone,password,contacPref)
         SELECT * FROM (SELECT :email, :name, :last_name, 
         :phone, :password, :contactPref) 
         AS tmp
         WHERE NOT EXISTS (
         SELECT * FROM user WHERE email = :email) LIMIT 1');


        // Bind Values
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':contactPref', $data['contactPref']);
        // Execute
        if(($this->db->execute()) && ($this->db->rowCount()>0)) {
          return true;
        } else {
          return false;
        }
      }
  
      public function getCustomers() {
        $this->db->query('SELECT * FROM user ORDER BY created_at DESC');
  
        $results = $this->db->resultset();
  
        return $results;
      }
}
?>