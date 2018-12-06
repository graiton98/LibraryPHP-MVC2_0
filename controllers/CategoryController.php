<?php
require_once 'models/Category.php';
class CategoryController{
    
    function index(){
        echo "Category Controller, Index Action";
    }
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
                $_SESSION['category_result'] = "Category added succesfully";
                header('Location:'.BASE_URL."category/see");
            }else{
                $_SESSION['category_result'] = "There is aldready a category with that name";
                $_SESSION['name_category'] = $category->getName_category();
                header('Location:'.BASE_URL."category/add");
            }
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
                $_SESSION['category_delete_result'] = "Category deleted succesfully";
                header('Location:'.BASE_URL."category/see");
            }else{
                $_SESSION['category_delete_result'] = "There isn't a category with that id";
                header('Location:'.BASE_URL."category/see");
            }
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
                   $_SESSION['category_result'] = "Category modified succesfully";
                   header('Location:'.BASE_URL."category/see");
               }else{
                   $_SESSION['category_result'] = "There is aldready a category with that name";
                   $_SESSION['name_category'] = $category->getName_category();
                   header('Location:'.BASE_URL."category/edit&id={$category->getId()}");
               }
            }else{
                header('Location:'.BASE_URL);
            }
        }else{
            header('Location:'.BASE_URL);
        }
        
    }
}

