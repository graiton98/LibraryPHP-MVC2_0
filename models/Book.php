<?php

class Book{
    private $id;
    private $isbn;
    private $name_book;
    private $category_id;
    private $author_id;
    private $description;
    private $outstanding;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getIsbn() {
        return $this->isbn;
    }

    function getName_book() {
        return $this->name_book;
    }

    function getCategory_id() {
        return $this->category_id;
    }

    function getAuthor_id() {
        return $this->author_id;
    }

    function getDescription() {
        return $this->description;
    }

    function getOutstanding() {
        return $this->outstanding;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    function setName_book($name_book) {
        $this->name_book = $name_book;
    }

    function setCategory_id($category_id) {
        $this->category_id = $category_id;
    }

    function setAuthor_id($author_id) {
        $this->author_id = $author_id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setOutstanding($outstanding) {
        $this->outstanding = $outstanding;
    }

    function getInfo(){
        $sql = "select * from books where id = {$this->id}";
        $result = $this->db->query($sql);
        
        if(!$result)return false;
        else return $result->fetch_object();
    }
    function getOne(){
        $sql = "select * from books where id={$this->id};";
        $result = $this->db->query($sql);
        return $result->fetch_object('Book');
    }
}

