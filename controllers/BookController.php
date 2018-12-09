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
               
               $book->obtainData();
               // Delete his img
               unlink("assets/img/{$book->getIsbn()}.{$book->getExtImage()}");
               // Delete the book 
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
   function add(){
       Utils::hasPower();
       require_once 'views/book/new.php';
   }
   function register(){
       Utils::hasPower();
       //unset($_SESSION['book']);
       if($_POST){
           $isbn = $_POST['isbn'];
           $name_book = $_POST['name'];
           $category_id = $_POST['category'];
           $author_id = $_POST['author'];
           $description = $_POST['description'];
           $outstanding = isset($_POST['outstanding']) ? $_POST['outstanding'] : 0;
           
           $book = new Book();
           $book->setIsbn($isbn);
           $book->setName_book($name_book);
           $book->setCategory_id($category_id);
           $book->setAuthor_id($author_id);
           $book->setDescription($description);
           if($outstanding == 'on') $book->setOutstanding(1);
           else $book->setOutstanding($outstanding);
           
           // Img
           $file = $_FILES['img'];
           $filename = $isbn;
           $mimetype = $file['type'];
           
           if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/git'){
               if(!is_dir('assets/img')){
                   mkdir('assets/img',0777, true);
               }
               $dotPos = strrpos($file['name'], '.');
               $extImage = substr($file['name'], $dotPos+1);
               $book->setExtImage($extImage);
               
            }
            if($_GET['id']) $book->setId($_GET['id']);
            $check = $book->checkData();
            if(count($check) == 0){
                $book->save();
                move_uploaded_file($file['tmp_name'], 'assets/img/'.$filename.'.'.$extImage); 
                $_SESSION['book'] = "Succesfully";
            }else{
                $_SESSION['book'] = "Error";
            }
       }else{
           $_SESSION['book'] = "Error";
       }
       header('Location:'.BASE_URL.'book/seeAll');
   }
   function browse(){
       Utils::hasPower();
       if(isset($_GET['id'])){
           $book = new Book();
           $book->setId($_GET['id']);
           $book->obtainData();
           require_once 'views/book/new.php';
       }else{
           header('Location:'.BASE_URL.'book/seeAll');
       }
   }
}

