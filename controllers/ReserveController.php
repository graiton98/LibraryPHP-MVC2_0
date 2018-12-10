<?php
require_once 'models/Reserve.php';
require_once 'models/User.php';
require_once 'models/Borrow.php';
require_once 'models/Book.php';
class ReserveController{
    function create(){
        Utils::isLogin();
        if(isset($_GET)){
            $id = $_GET['id'];
            $user = new User();
            $users = $user->getAll($_SESSION['userIdentity']->type_of_user);
            require_once 'views/reserve/new.php';
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function checkDates(){
        if(isset($_POST)){
            $id = $_POST['id'];
            $date = $_POST['takenDate'];
            /*var_dump($_POST);
            die();*/
            $dateObj = new DateTime($date);
            $dateObj2 = new DateTime($date);
            $userDate = $dateObj->format('Y-m-d');
            
            $dateObj->sub(new DateInterval('P21D'));
            $userDateLess20 = $dateObj->format('Y-m-d');
            
            $dateObj2->add(new DateInterval('P21D'));
            $userDateAdd20 = $dateObj2->format('Y-m-d');
            //$dateObj->add(new DateInterval('P41D'));
            //$userDateAdd20 = $dateObj->format('Y-m-d');
            
            /*echo $dateObj->format('Y-m-d');
            die();*/
            $reserveObj = new Reserve();
            $reserveObj->setId_book_fk($id);
            if(!isset($_POST['user'])) $reserveObj->setId_username($_SESSION['userIdentity']->id);
            else $reserveObj->setId_username($_POST['user']);
            $reserveObj->setTakenDate($userDate);
            $reserveObj->calculateNumCopies();
            
            $result = $reserveObj->checkDates($userDateLess20, $userDateAdd20);
            
            if($result){
                // Create Reserve
                $reserveObj->add();
                $_SESSION['result_reserve'] = "Success: Reserve has been done.";
            }else{
                $_SESSION['result_reserve'] = "Error: Selected Date isn't available, select another one.";
            }
            header('Location:'.BASE_URL.'Reserve/create&id='.$id);
            
            
        }
        /*$fecha = new DateTime();
        $fecha->sub(new DateInterval('P21D'));
        echo $fecha->format('Y-m-d');
        die();
        $sql1 = "select count(*) from reservation where takenDate between;
        $fecha->add(new DateInterval('P21D'));
        $sql2 = "select count(*) from reservation where takenDate=".$fecha->format('Y-m-d');*/
    }
    function mine(){
            Utils::isLogin();
            $reserve = new Reserve();
            $reserve->setId_username($_SESSION['userIdentity']->id);
            $reserves = $reserve->getAllReservesByIdUser();
            require_once 'views/reserve/mine.php';
        }
}

