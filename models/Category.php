<?php

class Category{
    private $id;
    private $name_category;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    public function getName_category() {
        return $this->name_category;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName_category($name_category) {
        $this->name_category = $name_category;
    }

    function getAll(){
        $SQLQuery = "select * from categories order by name_category desc;";
        $categories = $this->db->query($SQLQuery);
        return $categories;
    }
    
    function add(){
        $sql = "insert into categories values(null, '{$this->name_category}');";
        $this->db->query($sql);
    }
    
    function checkIfExists(){
        $sql = "select count(*) as total from categories where name_category='{$this->name_category}'";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        if($count['total'] == 0) return false;
        return true;
    }
    
    function checkIfExistsById(){
        $sql = "select count(*) as total from categories where id={$this->id}";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        if($count['total'] == 0) return false;
        return true;
    }
    function delete(){
        $sql = "delete from categories where id={$this->id};";
        $result = $this->db->query($sql);
    }
    
    function getOne(){
        $sql = "select * from categories where id={$this->id};";
        $result = $this->db->query($sql);
        return $result->fetch_object('Category');
    }
    
}

