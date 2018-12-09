<?php

class Utils{
    
    static function isLogin(){
        if(isset($_SESSION['userIdentity'])) header ('Location:'.BASE_URL);
        else return false;
    }
    static function isAdmin(){
        if(!isset($_SESSION['admin'])) header ('Location:'.BASE_URL);
        else return true;
    }
    
    static function isLibrarian(){
        if(!isset($_SESSION['librarian'])) header ('Location:'.BASE_URL);
        else return true;
    }
    
    static function hasPower(){ // Check if is admin or librarian
        if(isset($_SESSION['librarian']) || isset($_SESSION['admin'])) return true;
        else header ('Location:'.BASE_URL);
    }
    
    static function deleteSession($name_session){
        if(isset($_SESSION[$name_session])){
            unset($_SESSION[$name_session]);
        }
    }
    static function showCategories(){
        require_once 'models/Category.php';
        
        $category = new Category();
        $categories = $category->getAll();
        
        return $categories;
    }
    static function getTypesOfUser($typeUser){
        require_once 'models/Typeofuser.php';
        $type = new Typeofuser();
        return $type->getAll($typeUser);
    }
    static function getOneBook($id){
        require_once 'models/Book.php';
        $book = new Book();
        $book->setId($id);
        return $book->getOne();
    }
    static function getAuthors(){
        require_once 'models/Author.php';
        $author= new Author();
        return $author->getAll();
    }
}

