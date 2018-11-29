<?php
require_once 'models/Book.php';
class BookController {
   public function index(){
       require_once 'views/book/initial.php';
   }
   public function see(){
       if($_GET){
           $id = $_GET['id'];
           
           $book = new Book();
           $book->setId($id);
           $book = $book->getInfo();
           
           require_once 'views/book/singleBook.php';
       }
   }
}

