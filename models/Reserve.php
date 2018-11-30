<?php

class Reserve{
    private $id_book_fk;
    private $id_username;
    private $takenDate;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId_book_fk() {
        return $this->id_book_fk;
    }

    function getId_username() {
        return $this->id_username;
    }

    function getTakenDate() {
        return $this->takenDate;
    }

    function setId_book_fk($id_book_fk) {
        $this->id_book_fk = $id_book_fk;
    }

    function setId_username($id_username) {
        $this->id_username = $id_username;
    }

    function setTakenDate($takenDate) {
        $this->takenDate = $takenDate;
    }
    
    function getAllDates(){
        $sql = "select takenDate from reservation where id_book_fk=".$this->id_book_fk;
        
        $result = $this->db->query($sql);
        
    }
    
}

