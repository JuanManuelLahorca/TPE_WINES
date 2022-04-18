<?php
require_once "./smarty-3.1.39/libs/Smarty.class.php";

class ProductView{
    
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();

    }

    function showCrudWine($wines){
        $this->smarty->assign('titulo', 'Listado de vinos');
        $this->smarty->assign('wines' , $wines);
        $this->smarty->display('templates/crudWines.tpl');
        
    }
    function showComments(){
        header("Location: ".BASE_URL."viewWine");
    }

    function showCrudLocation(){
        header("Location: ".BASE_URL."wines");
    }

    function showGoUpdate($id, $vino, $stores){
        $this->smarty->assign('titulo', 'Modificar vino');
        $this->smarty->assign('id', $id);
        $this->smarty->assign('vino', $vino);
        $this->smarty->assign('stores', $stores);
        $this->smarty->display('templates/updateWine.tpl');

    }

    function showCreateWine($wines, $stores){
        $this->smarty->assign('titulo', 'Agregar, borrar o modificar un vino');
        $this->smarty->assign('wines' , $wines);
        $this->smarty->assign('stores', $stores);
        $this->smarty->display('templates/showCreateWine.tpl');
    }

    function showLoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function showWines($wines, $admin){
        $this->smarty->assign('titulo', 'Lista de Vinos');
        $this->smarty->assign('wines' , $wines);
        $this->smarty->assign('admin' , $admin);
        $this->smarty->display('templates/Winelist.tpl');    
    }

    function showWine($wine, $descripcion, $user){
        $this->smarty->assign('wine', $wine);
        $this->smarty->assign('descripcion', $descripcion);
        $this->smarty->assign('user', $user);
        $this->smarty->display('templates/WineDetail.tpl');
    }
}