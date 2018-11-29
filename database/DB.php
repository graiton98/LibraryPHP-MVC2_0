<?php
require_once 'dbParameters.php';
class Database {
    public static function connect(){
        $db = new mysqli(SERVER, USER, PASSWORD, DATABASE);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}
