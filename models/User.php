<?php
class User{
    private $id = -1;
    private $username;
    private $password;
    private $name_user;
    private $first_surname;
    private $dni;
    private $email;
    private $phone_number;
    private $type_of_user;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getName_user() {
        return $this->name_user;
    }

    function getFirst_surname() {
        return $this->first_surname;
    }

    function getDni() {
        return $this->dni;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone_number() {
        return $this->phone_number;
    }

    function getType_of_user() {
        return $this->type_of_user;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $this->db->real_escape_string($username);
    }

    function setPassword($password) {
        $this->password = $this->db->real_escape_string($password);
    }

    function setName_user($name_user) {
        $this->name_user = $this->db->real_escape_string($name_user);
    }

    function setFirst_surname($first_surname) {
        $this->first_surname = $this->db->real_escape_string($first_surname);
    }

    function setDni($dni) {
        $this->dni = $this->db->real_escape_string($dni);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPhone_number($phone_number) {
        $this->phone_number = $this->db->real_escape_string($phone_number);
    }

    function setType_of_user($type_of_user) {
        $this->type_of_user = $type_of_user;
    }
    function login(){
        $result = false;
        $username = $this->username;
        $password = $this->password;
        
        // Check if user exists
        $sql = "select id, username, AES_DECRYPT(password, 'secreta') as password, name_user, first_surname, dni, email, phone_number, type_of_user from users where username = '$username' ";
        $login = $this->db->query($sql);
        if($login && $login->num_rows == 1){
            $user = $login->fetch_object();
            
            // Check password
            $verify = ($password == $user->password) ? true : false;
            if($verify){
                $result = $user;
            }
        }
        return $result;
    }
    function checkIfUserExistsById(){
        $SQLQuery = "select * from users where id={$this->id}";
        $login = $this->db->query($SQLQuery);
        if($login->num_rows == 1)return true; // There is an with that user
        return false; // There isn't an user with that id
    }
    private function checkUser(){
        $SQLQuery = "select * from users where username='{$this->username}'";
        if($this->id != -1){
            $SQLQuery .= " and id!={$this->id}";
        }
        $login = $this->db->query($SQLQuery);
        if($login->num_rows == 1 || !$this->username)return false;
        return true;
    }
    private function checkName_User(){
        if(is_numeric($this->name_user) || preg_match("/[0-9]/", $this->name_user) || !$this->name_user) return false;
        return true;
    }
    
    private function checkFirst_surname(){
        if(is_numeric($this->first_surname) || preg_match("/[0-9]/", $this->first_surname) || !$this->first_surname) return false;
        return true;
    }
    
    private function checkDni(){
        $SQLQuery = "select * from users where dni='{$this->username}'";
        if($this->id != -1){
            $SQLQuery .= " and id!={$this->id}";
        }
        $login = $this->db->query($SQLQuery);
        if(!$this->dni)return false;
        if(strlen($this->dni)<9 || $login->num_rows == 1) return false;
        if(!ctype_alpha(substr($this->dni, -1)) || !is_numeric(substr($this->dni, 0, -1))) return false;
        return true;
    }
    
    private function checkEmail(){
        $SQLQuery = "select * from users where email='{$this->email}'";
        if($this->id != -1){
            $SQLQuery .= " and id!={$this->id}";
        }
        $login = $this->db->query($SQLQuery);
        if(!$this->email)return false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) return false;
        if($login->num_rows == 1)return false;
        return true;
    }
    
    private function checkPhone_number(){
        $SQLQuery = "select * from users where phone_number='{$this->phone_number}'";
        if($this->id != -1){
            $SQLQuery .= " and id!={$this->id}";
        }
        $login = $this->db->query($SQLQuery);
        if($login->num_rows == 1)return false;
        if(strlen(strval($this->phone_number)) != 9)return false;
        return true;
    }
    
    function checkData(){
        // Arrays of Errors
        $errors = array();
        
        if(!$this->checkUser())$errors['username'] = "Username is already being used";
        if(!$this->checkName_User()) $errors['name_user'] = "Name not valid";
        if(!$this->checkDni()) $errors['dni'] = "Dni not valid";
        if(!$this->checkEmail()) $errors['email'] = "Email not valid";
        if(!$this->checkPhone_number()) $errors['phone_number'] = "Phone Number not valid";

        return $errors;
    }
    function save(){
        if($this->id != -1){
            $sqlQuery = "update users set username='{$this->username}', name_user='{$this->name_user}', first_surname='{$this->first_surname}', dni='{$this->dni}', email='{$this->email}', phone_number={$this->phone_number}, type_of_user={$this->type_of_user} where id={$this->id};";
        }else{
            $sqlQuery = "insert into users values(null, '$this->username', AES_ENCRYPT('{$this->getPassword()}', 'secreta'), '{$this->name_user}', '{$this->first_surname}', '{$this->dni}', '{$this->email}', {$this->phone_number}, {$this->type_of_user})";
        }
        $save = $this->db->query($sqlQuery);
        if($save){
            return true;
        }
        return false;
        
    }
    function getAll(){
        $sql = "select * from users order by id";
        return $this->db->query($sql);
    }
    function delete(){
        $sql = "delete from users where id={$this->id};";
        $this->db->query($sql);
    }
    function getOne(){
        $sql = "select * from users where id={$this->id};";
        $result = $this->db->query($sql);
        return $result->fetch_object('User');
    }
}