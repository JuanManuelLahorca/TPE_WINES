<?php

require_once "./Model/ProductModel.php";
require_once "./Model/CommentModel.php";
require_once "./View/APIView.php";



class CommentApiController {

    private $modelProduct;
    private $modelComment;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->modelProduct = new ProductModel();
        $this->modelComment = new CommentModel();
        $this->view = new ProductApiView();
        $this->AuthHelper = new AuthHelper();
    }

    function getComments(){
        $id_wine = $this->modelProduct->geWine($_GET["id_Wine"]);
        $comments = $this->modelComment->getComments();
        return $this->view->response($comments, 200);
    }

    public function GetComment($params = null) {
        $idComment = $params[':ID'];
        $Comment = $this->modelComment->GetComment($idComment);

        if (!empty($Comment)) // verifica si el comentario existe
            $this->view->response($Comment, 200);
        else
            $this->view->response("El comentario con el id=$idComment no existe", 404);
    }

    function deleteComment($params = null) {
        $idComment = $params[":ID"];
        $Comment = $this->modelComment->getComment($idComment);

        if ($Comment) {
            $this->modelComment->deleteComment($idComment);
            return $this->view->response("El comentario con el id=$idComment fue borrado", 200);
        } else {
            return $this->view->response("El comentario con el id=$idComment no existe", 404);
        }
    }

    function createComment() {   
        // obtengo el body del request (json)
        $body = $this->getBody();

        // TODO: VALIDACIONES -> 400 (Bad Request)

        $idComment = $this->modelComment->insertComment($body->content, $body->qualification); 
        if ($idComment != 0) {
            $this->view->response("El Comentario se insertó con el id=$idComment", 200);
        } else {
            $this->view->response("El comentario no se pudo insertar", 500);
        }
    }
     // Devuelve el body del request
   
    private function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }








}
