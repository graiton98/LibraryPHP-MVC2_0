<?php
require_once 'database/DB.php';
class Copy{
    private $id = -1;
    private $id_book_fk;
    private $status;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getId_book_fk() {
        return $this->id_book_fk;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_book_fk($id_book_fk) {
        $this->id_book_fk = $id_book_fk;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getAll(){
        $sql = "select * from copy where id_book_fk={$this->id_book_fk}";
        $result = $this->db->query($sql);
        return $result;
    }
    function checkIfExistsById(){
        $sql = "select * from copy where id={$this->id}";
        $result = $this->db->query($sql);
        if(is_object($result) && $result->num_rows == 1) return true; //Exist
        else return false; // Not exist
    }
    function delete(){
        $sql = "delete from copy where id={$this->id}";
        $this->db->query($sql);
    }
    function getData(){
        $sql = "select * from copy where id={$this->id}";
        $result = $this->db->query($sql);
        $copy = $result->fetch_object();
        $this->id_book_fk = $copy->id_book_fk;
        $this->status = $copy->status;
    }
    function save(){
        if($this->id != -1) $sql = "update copy set status='{$this->status}' where id={$this->id};";
        else $sql = "insert into copy values(null, {$this->id_book_fk}, '{$this->status}');";
        $this->db->query($sql);  
    }
}

