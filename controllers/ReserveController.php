<?php
require_once 'models/Reserve.php';
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
    function checkDates(){
        if(isset($_POST)){
            $id = $_POST['id'];
            $date = $_POST['takenDate'];
            /*var_dump($_POST);
            die();*/
            $dateObj = new DateTime($date);
            $userDate = $dateObj->format('Y-m-d');
            
            $dateObj->sub(new DateInterval('P21D'));
            $userDateLess20 = $dateObj->format('Y-m-d');
            
            $dateObj->add(new DateInterval('P41D'));
            $userDateAdd20 = $dateObj->format('Y-m-d');
            
            /*echo $dateObj->format('Y-m-d');
            die();*/
            $reserveObj = new Reserve();
            $result1 = $reserveObj->checkDates($userDateLess20, $userDate, $id);
            
            $result2 = $reserveObj->checkDates($userDate, $userDateAdd20, $id);
            
            if($result1 && $result2){
                
                // Create Reserve
                /*$reserveObj->setId_book_fk($id);
                var_dump($_SESSION['userIdentity']);
                die();
                //$reserveObj->getId_username()*/
            }else{
                $_SESSION['error_date_reserve'] = "Selected Date isn't available, select another one.";
                header('Location:'.BASE_URL.'Reserve/create&id='.$id);
            }
            
            
        }
        /*$fecha = new DateTime();
        $fecha->sub(new DateInterval('P21D'));
        echo $fecha->format('Y-m-d');
        die();
        $sql1 = "select count(*) from reservation where takenDate between;
        $fecha->add(new DateInterval('P21D'));
        $sql2 = "select count(*) from reservation where takenDate=".$fecha->format('Y-m-d');*/  
    }
}

