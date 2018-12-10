<?php
require_once 'database/DB.php';
class Borrow{
    private $id;
    private $id_copy_fk;
    private $id_book_fk;
    private $id_username;
    private $takenDate;
    private $returnDate;
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getId_copy_fk() {
        return $this->id_copy_fk;
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

    function getReturnDate() {
        return $this->returnDate;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_copy_fk($id_copy_fk) {
        $this->id_copy_fk = $id_copy_fk;
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

    function setReturnDate($returnDate) {
        $this->returnDate = $returnDate;
    }

    
}

