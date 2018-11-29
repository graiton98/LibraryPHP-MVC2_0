<?php

session_start();
require_once 'autoload.php';
require_once 'database/DB.php';
require_once 'helpers/Utils.php';
require_once 'config/constants.php';
require_once 'views/layout/header.php';


function show_error(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $name_controller = $_GET['controller'].'Controller'; 
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $name_controller = CONTROLLER_DEFAULT;
}else{
    show_error();
    exit();
}



if(class_exists($name_controller)){
    $controller = new $name_controller();

    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $default = ACTION_DEFAULT;
        $controller->$default();
    }else{
        show_error();
    }
}else{
    show_error();
}
require_once 'views/layout/sidebar.php';
require_once 'views/layout/footer.php';
