<?php
require_once "./Model/CommentModel.php";
require_once "./Model/ProductModel.php";
require_once "./Model/CategoryModel.php";
require_once "./Model/UserModel.php";
require_once "./View/ProductView.php";
require_once "./Helpers/AuthHelper.php";

class ProductController{

    private $modelUser;
    private $modelProduct;
    private $modelComment;
    private $modelCategory;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->modelUser = new UserModel();
        $this->modelProduct = new ProductModel();
        $this->modelComment = new CommentModel();
        $this->modelCategory = new CategoryModel();
        $this->view = new ProductView();
        $this->AuthHelper = new AuthHelper();
    }

    function createWine(){
        $this->AuthHelper->checkLoggedIn();
        $this->modelProduct->insertWine($_POST['nameWines'], $_POST['style'], $_POST['id_store'], $_POST['price']);
        $this->view->showCrudLocation(); 
    }

    function createComments(){
        $this->AuthHelper->checkLoggedIn();
        $this->modelComment->insertComment($_POST['content'], $_POST['qualification'], $_POST['id_user'], $_POST['id_Wine']);
        $this->view->showCrudLocation(); 
    }

    function deleteWine($id){
        $this->AuthHelper->checkLoggedIn();
        $this->modelProduct->deleteWine($id);
        $this->view->showCrudLocation();
    }

    function updateWine(){
        $this->AuthHelper->checkLoggedIn();
        $this->modelProduuct->updateWine($_POST['id_Wine'], $_POST['nameWines'], $_POST['style'], $_POST['id_store'], $_POST['price']);
        $this->view->showCrudLocation();
    }

    function goUpdateWine($id){ 
        $this->AuthHelper->checkLoggedIn();
        $vino = $this->modelProduct->getWine($id); 
        $stores = $this->modelCategory->getStores();
        $this->view->showGoUpdate($id, $vino, $stores);
    }

    function showCreateWine(){
        $this->AuthHelper->checkLoggedIn();
        $wines = $this->modelProduct->getWines(); 
        $stores = $this->modelCategory->getStores(); 
        $this->view->showCreateWine($wines, $stores);
    }

    function showWines() {
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->modelUser->isAdmin($_SESSION["name"]);
        $wines = $this->modelProduct->getWines();
        $this->view->showWines($wines, $admin);
    }

    function viewWine($id){
        $this->AuthHelper->checkLoggedIn();
        $user = $this->modelUser->getUser($_SESSION["name"]);
        $wine = $this->modelProduct->getWine($id);
        if ($wine->Style == 'Tinto'){
            $descripcion = 'El vino tinto, esta elaborado con uvas de piel oscura en lugar de uvas de piel clara. Durante la elaboraci??n del vino tinto, el en??logo permite que el mosto exprimido, llamado mosto, macere y fermente con los hollejos de uva oscura, lo que aporta color, sabor y tanino al vino.';            
        } else if ($wine->Style == 'Blanco'){
            $descripcion = 'El vino blanco es uno de los vinos que se puede acompa??ar con cualquier alimento y tiene la ventaja de tomarse fr??o o a temperatura ambiente. El poco contacto con la piel de la uva durante la producci??n, hacen que este vino tenga un color que va del transparente hasta una tonalidad ??mbar.';            
        } else{
            $descripcion = 'Un rosado es, b??sicamente, un vino tinto con poca maceraci??n. Proviene de uvas negras (o mezcla de uvas negras y blancas) y la tonalidad del rosado depender?? del tiempo de maceraci??n: a menor tiempo, color m??s tenue y blanquecino; y a mayor tiempo de maceraci??n, color m??s p??rpura o viol??ceo.';
        }
        $this->view->showWine($wine, $descripcion, $user);
    }
}
