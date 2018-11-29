<?php

class Utils{
    
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

