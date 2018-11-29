<?php

class ReserveController{
    function index(){
        echo "Reserve Controller Index Action";
    }
    function create(){
        if(isset($_GET)){
            $id = $_GET['id'];
        }
    }
}

