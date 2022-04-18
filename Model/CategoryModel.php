<?php

class CategoryModel{

    private $db;
    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_wine;charset=utf8', 'root', ''); 
    }
    
    function getStores(){
        $sentencia = $this->db->prepare("SELECT * from stores");
        $sentencia->execute();
        $stores = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $stores;   
    }

    function getStore($id){
        $sentencia = $this->db->prepare( "SELECT a.*, b.*
                                            FROM wines a
                                            LEFT JOIN stores b
                                            ON a.id_store = b.id_store
                                            WHERE NameStore=?");
        $sentencia->execute(array($id));
        $winesForStore = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $winesForStore;
    }

    function insertStore($namestore)   {
        $sentencia = $this->db->prepare("INSERT INTO stores(NameStore) VALUES (?)");
        $sentencia->execute(array($namestore));
    }

    function deleteStore($id){
        $sentencia = $this->db->prepare("DELETE FROM stores WHERE id_store=?");
        $sentencia->execute(array($id));
    }

    function updateStore($id, $namestore){
        $sentencia = $this->db->prepare("UPDATE stores SET NameStore=? WHERE id_store=? ");
        $sentencia->execute(array($namestore, $id));
        
    }


  

   
}


