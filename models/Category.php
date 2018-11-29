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
    
}

