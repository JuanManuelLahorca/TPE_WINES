<?php

class CommentModel{

    private $db;
    function __construct(){
        $this-> db = new PDO('mysql:host=localhost;'.'dbname=db_wine;charset=utf8', 'root', ''); 
    }

    function getComments(){ 
        $sentencia = $this->db->prepare( "SELECT *
                                            FROM comments");
        $sentencia->execute();
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comments;
    }

    function deleteComment($id){ 
        $sentencia = $this->db->prepare("DELETE FROM comments WHERE id_Comment=?");
        $sentencia->execute(array($id));
    }

    function getComment($id){ 
        $sentencia = $this->db->prepare( "SELECT *
                                            FROM comments 
                                            where id_Comment=?");
        $sentencia->execute(array($id));
        $comment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function insertComment($content, $qualification, $id_user, $id_Wine){ 
        $sentencia = $this->db->prepare("INSERT INTO comments (content, qualification, id_user, id_Wine) VALUES (?, ?, ?, ?)");
        $sentencia->execute(array($content, $qualification, $id_user, $id_Wine));
    }

  
}