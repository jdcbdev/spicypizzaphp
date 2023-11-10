<?php

require_once 'database.php';

Class Customer{
    //attributes

    public $id;
    public $firstname;
    public $middlename;
    public $lastname;
    public $email;
    public $password;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO customer (firstname, middlename, lastname, email, password) VALUES 
        (:firstname, :middlename, :lastname, :email, :password);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':middlename', $this->middlename);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':email', $this->email);
        // Hash the password securely using password_hash
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query->bindParam(':password', $hashedPassword);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function is_email_exist(){
        $sql = "SELECT * FROM customer WHERE email = :email;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
        if($query->execute()){
            if($query->rowCount()>0){
                return true;
            }
        }
        return false;
    }
}

?>