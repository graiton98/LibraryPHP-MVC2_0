<?php
require_once 'database/DB.php';
class Typeofuser{
    private $id;
    private $name;
    private $db;
    
    function __construct(){
        $this->db = Database::connect();
    }
    function getAll($typeUser){
        $sql = "select * from typeofuser where id < $typeUser order by id;";
        return $this->db->query($sql);
    }
}

