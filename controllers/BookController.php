<?php
require_once 'models/Book.php';
class BookController {
   function index(){
       require_once 'views/book/initial.php';
   }
   function see(){
       if($_GET){
           $id = $_GET['id'];
           
           $book = new Book();
           $book->setId($id);
           $book = $book->getInfo();
           
           require_once 'views/book/singleBook.php';
       }
   }
   function seeAll(){
       Utils::hasPower();
       $book = new Book();
       $books = $book->getAll();
       require_once 'views/book/all.php';
   }
   function delete(){
       Utils::hasPower();
       if(isset($_GET['id'])){
           $book = new Book();
           $book->setId($_GET['id']);
           $exist = $book->checkIfBookExistsById();
           if($exist){
               $book->delete();
               $_SESSION['book_result'] = "Book deleted succesfully";
           }else{
               $_SESSION['book_result'] = "Book selected doesn't exist";
           }
           
       }else{
           $_SESSION['book_result'] = "No Book selected";
       }
       header('Location:'.BASE_URL.'book/seeAll');
   }
}

