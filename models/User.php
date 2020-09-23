<?php
require_once ('lib/pdo_db.php');
class User{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function addUser($data) {
        //search if user not already exist
        // Prepare Query
        $this->db->query('INSERT INTO user 
        (email,name,lastName,phone,password,contacPref,act_code)
         SELECT * FROM (SELECT :email, :name, :last_name, 
         :phone, :password, :contactPref, :act_code) 
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
        $this->db->bind(':act_code', $data['act_code']);
        // Execute
        if(($this->db->execute()) && ($this->db->rowCount()>0)) {
          return true;
        } else {
          return false;
        }
    }
    public function activateUser($code,$email){
      //get user id

      $id = ($this->getUserData($email))->id;
      // Prepare Query
      $this->db->query('update user set act_code = 0 
      where id = :id');
      // Bind Values
      $this->db->bind(':id', $id);
      // Execute
      if(($this->db->execute()) && ($this->db->rowCount()>0)) {
        return true;
      } else {
        return false;
      }
    }
    public function authenticate($username, $pass){
      // Prepare Query
      $this->db->query('select password from user where 
      email = :email');
      // Bind Values
      $this->db->bind(':email', $username);
      if(($this->db->execute()) && ($this->db->rowCount()>0)) {
        $results = $this->db->single();
        if(password_verify($pass,$results->password)){
          return true;
        }
        else
        {
          return false;
        }
      } else {
        return false;
      }
    }
    public function getUserData($email){
      $this->db->query('SELECT * FROM user where email = :email');
      // Bind Values
      $this->db->bind(':email', $email);
      $results = $this->db->single();
      return $results;
    }
    
    public function updateUser($data){
        // Prepare Query
        $this->db->query('update user set 
        name=:name ,lastName=:lastName, phone = :phone
        where id = :id');


        // Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if($this->db->execute()) {
          return true;
        } else {
          return false;
        }
    }
    public function updatePassword($data){
        // Prepare Query
        $this->db->query('update user set 
        password=:password
        where id = :id');


        // Bind Values
        $this->db->bind(':password', $data['newPass']);
        $this->db->bind(':id', $data['id']);
        // Execute
        if($this->db->execute()) {
          return true;
        } else {
          return false;
        }
    }
  
    public function getUsers() {
        $this->db->query('SELECT * FROM user ORDER BY created_at DESC');
  
        $results = $this->db->resultset();
  
        return $results;
    }

    public function addAddress($data){
        //search if user not already exist
        // Prepare Query
        $this->db->query('INSERT INTO address 
        (number,address,city,state,country,postCode,FK_user_id_addr_user)
         SELECT * FROM (SELECT :number,:address, :city, :state, 
         :country, :postCode, :FK_user_id_addr_user) 
         AS tmp
         WHERE NOT EXISTS (
         SELECT * FROM address WHERE number = :number
         ) LIMIT 1'); 


        // Bind Values
        $this->db->bind(':number', $data['number']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':postCode', $data['postCode']);
        $this->db->bind(':FK_user_id_addr_user', $data['FK_id']);
 
        // Execute
        if(($this->db->execute()) && ($this->db->rowCount()>0)) {
          return true;
        } else {
          return false;
        }
    }
    public function getUserAddresses($id){
      $this->db->query('SELECT * FROM address where FK_user_id_addr_user = :id');
      // Bind Values
      $this->db->bind(':id', $id);
      $results = $this->db->resultset();
      return $results;
    }

    public function removeAddress($data)
    {
        //search if user not already exist
        // Prepare Query
        $this->db->query('DELETE FROM address WHERE
        FK_user_id_addr_user= :id AND number = :number'); 


        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':number', $data['number']);
 
        // Execute
        if(($this->db->execute()) && ($this->db->rowCount()>0)) {
          return true;
        } else {
          return false;
        }
    }  
}
?>