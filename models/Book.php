<?php

class Book{
    private $id;
    private $isbn;
    private $name_book;
    private $category_id;
    private $author_id;
    private $description;
    private $outstanding;
    private $extImage;
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
    function getExtImage() {
        return $this->extImage;
    }

    function setExtImage($extImage) {
        $this->extImage = $extImage;
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
    function getAll(){
        $sql = "select * from books";
        $result = $this->db->query($sql);
        return $result;
    }
    function checkIfBookExistsById(){
        $sql = "select * from books where id={$this->id}";
        $result = $this->db->query($sql);
        return $result;
    }
    function delete(){
        $sql = "delete from books where id={$this->id}";
        $this->db->query($sql);
    }
    
    function checkIsbn(){
        $sql = "select * from books where isbn='{$this->isbn}'";
        $result =  $this->db->query($sql);
        if($result->num_rows == 1)return false;
        return true;
    }
    
    function checkData(){
        $errors = array();
        if(!$this->checkIsbn())$errors['isbn'] = "There is a book with that isbn";
        return $errors;
    }
    function save(){
        $sql = "insert into books values (null, '{$this->isbn}', '{$this->name_book}', {$this->category_id},{$this->author_id}, '{$this->description}', {$this->outstanding}, '{$this->extImage}');";
        $this->db->query($sql);
    }
    function obtainData(){
        $sql = "select * from books where id={$this->id}";
        $result = $this->db->query($sql);
        $obj = $result->fetch_object();
        $this->isbn = $obj->isbn;
        $this->name_book = $obj->name_book;
        $this->category_id = $obj->category_id;
        $this->author_id = $obj->author_id;
        $this->description = $obj->description;
        $this->outstanding = $obj->outstanding;
        $this->extImage = $obj->extImage;
    }
}

