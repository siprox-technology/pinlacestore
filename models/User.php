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
  
    public function getUsers() {
        $this->db->query('SELECT * FROM user ORDER BY created_at DESC');
  
        $results = $this->db->resultset();
  
        return $results;
    }

    public function activate_user($code,$email)
    {
      // Prepare Query
      $this->db->query('update user set act_code = 0 
      where id = (select id from user where email = :email) 
      and act_code = :act_code');
      // Bind Values
      $this->db->bind(':email', $email);
      $this->db->bind(':act_code', $code);
      // Execute
      if(($this->db->execute()) && ($this->db->rowCount()>0)) {
        return true;
      } else {
        return false;
      }
    }
    
    public function authenticate($username, $pass){
      // Prepare Query
      $this->db->query('select id from user where password = :password and 
      email = :email');
      // Bind Values
      $this->db->bind(':email', $username);
      $this->db->bind(':password', $pass);

      if(($this->db->execute()) && ($this->db->rowCount()>0)) {
        return true;
      } else {
        return false;
      }
    }

    public function user_userLogOut(){
      session_start();
      if(isset($_SESSION['loggedin']))
      {
          session_regenerate_id();
          session_unset();
          session_destroy();
          setcookie('PHPSESSID', '', time() - 3600,'/');
          // Redirect to the login page:
          header('Location:../index.php');
      }
      else
      {
          session_regenerate_id();
          header('Location:../index.php');
      }
    }
    
}
?>