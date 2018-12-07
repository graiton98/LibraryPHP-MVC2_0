<?php
require_once 'models/User.php';
class UserController{
    
    public function index(){
        echo "User Controller, Index Action";
    }
    function login(){
        require_once 'views/user/login.php';
    }
    function saveLogin(){
        if(isset($_POST)){

            // Query to Database
            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $userIdentify = $user->login();
            
            // Create session
            if($userIdentify && is_object($userIdentify)){
                $_SESSION['userIdentity'] = $userIdentify;
                
                if($userIdentify->type_of_user == 3){
                    $_SESSION['admin'] = true;
                }elseif($userIdentify->type_of_user == 2){
                    $_SESSION['librarian'] = true;
                } 
            }else{
                $_SESSION['error_login'] = "Failed Identification";
            }
        }else{
            $_SESSION['error_login'] = "Failed Identification";
        }
        if(isset($_SESSION['userIdentity'])) header ('Location:'.BASE_URL);
        else header("Location:".BASE_URL."user/login");
    }
    public function logout(){
        
        if(isset($_SESSION['userIdentity'])){
            unset($_SESSION['userIdentity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        if(isset($_SESSION['librarian'])){
            unset($_SESSION['librarian']);
        }
        
        header("Location:".BASE_URL);
    }
    function register(){
        require_once 'views/user/register.php';
    }
    function saveRegister(){
        if(isset($_POST)){
            //echo '<pre>' . var_export($_POST, true) . '</pre>';

            // Obtain data from form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name_user = $_POST['name_user'];
            $first_surname = $_POST['first_surname'];
            $dni = $_POST['dni'];
            $email = $_POST['email'] ;
            $phone_number = $_POST['phone_number'];
            $type_of_user = isset($_POST['type_of_user']) ? $_POST['type_of_user'] : 1;


            // Create user using form data
            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setName_user($name_user);
            $user->setFirst_surname($first_surname);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPhone_number($phone_number);
            $user->setType_of_user($type_of_user);

            // Errors
            $errors = array();

            $errors = $user->checkData();
            /*echo '<pre>' . var_export($errors, true) . '</pre>';
            echo count($errors);
            die();*/
            if(count($errors) == 0){
                /*echo '<pre>' . var_export($errors, true) . '</pre>';
                die();*/
                $save = $user->save();


                if($save){
                    $_SESSION['register'] = "completed";

                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                /*echo '<pre>' . var_export($errors, true) . '</pre>';
                die();*/
                $_SESSION['register'] = "failed";
            }  
        }else{
            $_SESSION['register'] = "failed";
        }
        if($_SESSION['register'] == "completed")header("Location:".BASE_URL);
        else header("Location:".BASE_URL."user/register");
    }
    function seeAll(){
        Utils::hasPower(); // Check if session admin or librarian exists
        $user = new User();
        $users = $user->getAll();
        require_once 'views/user/all.php';
    }
    function delete(){
        Utils::hasPower(); // Check if session admin or librarian exists
        if(isset($_GET)){
            $user = new User();
            $user->setId($_GET['id']);
            if($user->checkIfUserExistsById()){
                $user->delete();
                $_SESSION['user_result'] = "User deleted succesfully";
                header('Location:'.BASE_URL.'user/seeAll');
            }else{
                $_SESSION['user_result'] = "User selected doesn't exist";
                header('Location:'.BASE_URL);
            }
        }else{
            header('Location:'.BASE_URL);
        }
    }
}