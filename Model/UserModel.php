<?php

class UserModel{

    private $db;

    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_wine;charset=utf8', 'root', '');
    }
    
    function getUser($username){
        $query = $this->db->prepare('SELECT * FROM users WHERE NameUser = ?');
        $query->execute(array($username)); 
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;    
    }

    function isAdmin($username){
        $query = $this->db->prepare('SELECT admin FROM users WHERE NameUser = ?');
        $query->execute(array($username)); 
        $admin = $query->fetchColumn();
        return $admin == "1";    
    }


    function insertRegister($username, $password, $admin){
        $sentencia = $this->db->prepare("INSERT INTO users (NameUser, Password, admin ) VALUES (?, ?, ?)");
        $sentencia->execute(array($username, $password, $admin));
    }

    function getUsers(){
        $sentencia = $this->db->prepare('SELECT * FROM users WHERE NameUser != "bernardo"');
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }

    function deleteUser($id){
        $sentencia = $this->db->prepare("DELETE FROM users WHERE id_user=?");
        $sentencia->execute(array($id));
    }

    function updateUser($id){
        $sentencia = $this->db->prepare("UPDATE users SET `admin` = NOT admin WHERE id_user= ?");
        $sentencia->execute(array($id));
    }
}