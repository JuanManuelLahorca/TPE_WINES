<?php
require_once "./Model/CommentModel.php";
require_once "./Model/ProductModel.php";
require_once "./View/APIview.php";


class ProductApiController{

    private $modelComment;
    private $modelProduct;
    private $view;

    function __construct(){

        $this->modelComment = new CommentModel();
        $this->modelProduct = new ProductModel();
        $this->view = new APIview();
    }

    function getWines() {
        $wines = $this->modelProduct->getWines();
        return $this->view->response($wines, 200);
    }

    
    function getWine($params = null){
        $idWine = $params[':ID'];
        $Wine = $this->modelProduct->GetWine($idWine);
        
     
        if (!empty($Wine)) {  // verifica si el vino existe
            $this->view->response($Wine->{"id_Wine"}, 200); //devulvo a la api solo el id_Wine
        }else{
            $this->view->response("El vino con el id=$idWine no existe", 404);  
        }
    }

    function getComments() {
        $comments = $this->modelComment->getComments();
        return $this->view->response($comments, 200);
    }
}

