<?php
require_once 'database/DB.php';
class Author{
    private $id = -1;
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
        $sql = "select * from authors order by id asc;";
        $result = $this->db->query($sql);
        return $result;
    }
    function checkIfExistById(){
        $sql = "select * from authors where id={$this->id}";
        $result = $this->db->query($sql);
        if($result->num_rows == 1)return true; 
        else return false; 
    }
    function delete(){
        $sql = "delete from authors where id={$this->id}";
        $this->db->query($sql);
    }
    function getDataById(){
        $sql = "select * from authors where id={$this->id}";
        $result = $this->db->query($sql);
        $aux = $result->fetch_object();
        $this->name_author = $aux->name_author;
        $this->first_surname = $aux->first_surname;
    }
    function save(){
        if($this->id != -1)$sql = "update authors set name_author='{$this->name_author}', first_surname='{$this->first_surname}' where id={$this->id}";
        else $sql = "insert into authors values(null, '{$this->name_author}', '{$this->first_surname}')";
        $this->db->query($sql);
    }
}

