<?php
require_once 'models/Category.php';
require_once 'models/Book.php';
class CategoryController{
    function see(){
        Utils::hasPower(); // Check if session admin or librarian exists
        $categories = Utils::showCategories();
        require_once 'views/category/see.php';
    }
    
    function add(){
        Utils::hasPower(); // Check if session admin or librarian exists
        require_once 'views/category/add.php';
    }
    
    function newCategory(){
        Utils::hasPower(); // Check if session admin or librarian exists
        if(isset($_POST)){
            $name_category = ucfirst($_POST['category']);
            $category = new Category();
            $category->setName_category($name_category);
            if(!$category->checkIfExists()){
                $category->add();
                $_SESSION['category_result'] = "Succesfull: Category added succesfully.";
            }else{
                $_SESSION['category_result'] = "Error: There is aldready a category with that name.";
            }
            header('Location:'.BASE_URL."category/see");
        }else{
            header('Location:'.BASE_URL);
        }
    }
    
    function edit(){
        Utils::hasPower(); // Check if session admin or librarian exists
        if(isset($_GET)){
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            if($category->checkIfExistsById()){
                $category = $category->getOne();
                require_once 'views/category/edit.php';
            }else{
               $_SESSION['edit_Result'] = "Error, there isn't a category with that id";
               header('Location:'.BASE_URL."category/see");
            }
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function delete(){
        Utils::hasPower(); // Check if session admin or librarian exists
        if(isset($_GET)){
            $id = $_GET['id'];
            $category = new Category();
            $category->setId($id);
            if($category->checkIfExistsById()){
                $category->delete();
                $_SESSION['category_result'] = "Succesfull: Category deleted succesfully";
            }else{
                $_SESSION['category_result'] = "Error: There isn't a category with that id";
            }
            header('Location:'.BASE_URL."category/see");
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function save(){
        Utils::hasPower(); // Check if session admin or librarian exists
        if(isset($_GET)){
            if(isset($_POST)){
               $category = new Category();
               $category->setId($_GET['id']);
               $category->setName_category(ucfirst($_POST['category']));
               if(!$category->checkIfExists()){
                   $category->save();
                   $_SESSION['category_result'] = "Succesfull: Category modified succesfully";
                   
               }else{
                   $_SESSION['category_result'] = "Error: There is aldready a category with that name";
               }
               header('Location:'.BASE_URL."category/see");
            }else{
                header('Location:'.BASE_URL);
            }
        }else{
            header('Location:'.BASE_URL);
        }
    }
    function seeBooks(){
        if($_GET['category']){
            $book = new Book();
            $book->setCategory_id($_GET['category']);
            $books = $book->getAllByCategory();
            $category = new Category();
            $category->setId($_GET['category']);
            $category = $category->getOne();
            require_once 'views/category/principal.php';
        }else{
            header('Location:'.BASE_URL);
        }
    }
}

