<?php

class Reserve{
    private $code;
    private $id_book_fk;
    private $id_username;
    private $takenDate;
    private $db;
    private $numCopies;
    
    function __construct() {
       $this->db = Database::connect();
    }
     
    function getCode() {
        return $this->code;
    }

    function setCode($code) {
        $this->code = $code;
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
    
    function calculateNumCopies(){
        $sql = "select count(*) as total from copy where id_book_fk={$this->id_book_fk};";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        $this->numCopies = $count['total'];
    }
    
    function add(){
        $sql = "insert into reservation values(null, {$this->id_book_fk}, {$this->id_username}, '{$this->takenDate}');";
        $this->db->query($sql);
    }
    
    private function checkDateBefore($date){
        $sql = "select count(*) as total from reservation where id_book_fk={$this->id_book_fk} and takenDate between '$date' and '{$this->takenDate}';";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        if($count['total'] < $this->numCopies) return true;
        else return false;
    }
    private function checkDateAfter($date){
        $sql = $sql = "select count(*) as total from reservation where id_book_fk= {$this->id_book_fk} and takenDate between '{$this->takenDate}' and '{$date}';";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        if($count['total'] < $this->numCopies) return true;
        else return false;
    }
    
    function checkDates($date1, $date2){
        if($this->checkDateBefore($date1) && $this->checkDateAfter($date2)) return true;
        return false;
    }
    function getAllReservesByIdUser(){
        $sql = "select * from reservation where id_username={$this->id_username}";
        $result = $this->db->query($sql);
        return $result;
    }
    
}

