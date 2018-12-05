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
    
    function checkDates($userDate, $userDate2, $id){
        $sql = "select count(*) as total from reservation where id_book_fk= {$id} and takenDate between '{$userDate}' and '{$userDate2}';";
        $result = $this->db->query($sql);
        $count = $result->fetch_assoc();
        //echo $count['total'];
        //die();
        if($count['total']<COPIES){
            return true; // You can reserve because it's available
        }else{
            return false; // You can't reserve
        }
    }
    
}

