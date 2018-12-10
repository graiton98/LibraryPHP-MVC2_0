<?php
require_once 'models/Author.php';
class AuthorController{
    function see(){
        Utils::hasPower();
        $author = new Author();
        $authors = $author->getAll();
        require_once 'views/author/all.php';
    }
    function delete(){
        Utils::hasPower();
        if($_GET['id']){
            $author = new Author();
            $author->setId($_GET['id']);
            $exist = $author->checkIfExistById();
            if($exist) {
                $author->delete();
                $_SESSION['author'] = "Success! Author deleted.";
                header('Location:'.BASE_URL.'author/see');
            }else{
                header('Location:'.BASE_URL);
            }
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function add(){
        Utils::hasPower();
        if(isset($_GET['id'])){
            $author = new Author();
            $author->setId($_GET['id']);
            $author->getDataById();
        }
        require_once 'views/author/add.php';
    }
    function register(){
        Utils::hasPower();
        if(isset($_POST)){
            $name_author = $_POST['name'];
            $first_surname = $_POST['firstSurname'];
            $author = new Author();
            $author->setName_author($name_author);
            $author->setFirst_surname($first_surname);
            if($_GET['id']){
                $id = $_GET['id'];
                $author->setId($id);
            }
            $author->save();
            if($_GET['id']) $_SESSION['author']= "Success! Author changed.";
            else $_SESSION['author']= "Success! Author created.";
            header('Location:'.BASE_URL.'author/see');
        }else{
            header('Location:'.BASE_URL);
        }
    }
}

