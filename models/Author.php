<?php
require_once 'database/DB.php';
class Author{
    private $id;
    private $name_author;
    private $first_surname;
    private $db;
    function __construct() {
        $this->db = Database::connect();
    }
    function getId() {
        return $this->id;
    }

    function getName_author() {
        return $this->name_author;
    }

    function getFirst_surname() {
        return $this->first_surname;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName_author($name_author) {
        $this->name_author = $name_author;
    }

    function setFirst_surname($first_surname) {
        $this->first_surname = $first_surname;
    }

    function getAll(){
        $sql = "select * from authors order by name_author asc;";
        $result = $this->db->query($sql);
        return $result;
    }
}

