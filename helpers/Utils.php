<?php

class Utils{
    
    static function isLogin(){
        if(!isset($_SESSION['userIdentity'])) header ('Location:'.BASE_URL);
        else return true;
    }
    static function isAdmin(){
        if(!isset($_SESSION['admin'])) header ('Location:'.BASE_URL);
        else return true;
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
}

