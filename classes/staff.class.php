<?php

require_once 'database.php';

Class Staff{
    //attributes

    public $id;
    public $firstname;
    public $lastname;
    public $role;
    public $email;
    public $password;
    public $status;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO staff (firstname, lastname, role, email, password, status) VALUES 
        (:firstname, :lastname, :role, :email, :password, :status);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':email', $this->email);
        // Hash the password securely using password_hash
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':status', $this->status);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE staff SET firstname=:firstname, lastname=:lastname, role=:role, email=:email, password=:password, status=:status WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':firstname', $this->firstname);
        $query->bindParam(':lastname', $this->lastname);
        $query->bindParam(':role', $this->role);
        $query->bindParam(':email', $this->email);
        // Hash the password securely using password_hash
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query->bindParam(':password', $hashedPassword);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM staff WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM staff ORDER BY firstname ASC, lastname ASC;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
}

?>