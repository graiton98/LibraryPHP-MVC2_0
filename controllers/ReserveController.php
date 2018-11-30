<?php

class ReserveController{
    function index(){
        echo "Reserve Controller Index Action";
    }
    function create(){
        Utils::isLogin();
        if(isset($_GET)){
            
            $id = $_GET['id'];
            
            require_once 'views/reserve/new.php';
        }
    }
}

