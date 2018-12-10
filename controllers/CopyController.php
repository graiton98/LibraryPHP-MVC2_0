<?php
require_once 'models/Book.php';
require_once 'models/Copy.php';
class CopyController{
    function seeAll(){
        Utils::hasPower();
        if(isset($_GET['id'])){
            $book = new Book();
            $book->setId($_GET['id']);
            $book->obtainData();
            $copy = new Copy();
            $copy->setId_book_fk($book->getId());
            $copies = $copy->getAll();
            require_once 'views/copy/all.php';
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function delete(){
        Utils::hasPower();
        if(isset($_GET['id'])){
            $copy = new Copy();
            $copy->setId($_GET['id']);
            $exist = $copy->checkIfExistsById();
            if($exist){
                $copy->delete();
                $_SESSION['copy'] = "Succesfull: Copy deleted.";
            }else{
                $_SESSION['copy'] = "Error: Copy selected doesn't exist";
            }
            header('Location:'.BASE_URL.'copy/seeAll&id='.$_GET['bookId']);
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function add(){
       Utils::hasPower();
       $book = new Book();
       $book->setId($_GET['bookId']);
       $book->obtainData();
       require_once 'views/copy/new.php';
    }
    
    function browse(){
        Utils::hasPower();
        if(isset($_GET['id']) && isset($_GET['bookId'])){
            $copy = new Copy();
            $copy->setId($_GET['id']);
            $copy->getData();
            
            $book = new Book();
            $book->setId($_GET['bookId']);
            $book->obtainData();
            require_once 'views/copy/new.php';
        }
    }
    
    function save(){
        Utils::hasPower();
        if(isset($_POST) && isset($_GET['bookId'])){
            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $status = $_POST['status'];
            $id_book_fk = $_GET['bookId'];

            $copy = new Copy();
            $copy->setId_book_fk($id_book_fk);
            $copy->setStatus($status);
            if($id)$copy->setId ($id);
            
            $copy->save();
            $_SESSION['copy'] = "Succesfully";
            header('Location:'.BASE_URL.'copy/seeAll&id='.$id_book_fk);
        }else{
            $_SESSION['copy'] = "Error";
            header('Location:'.BASE_URL.'book/seeAll');
        }
        
    }
}
