<?php
require_once "./smarty-3.1.39/libs/Smarty.class.php";

class CategoryView{
    
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();

    }

    function showStore ($stores, $admin){
        $this->smarty->assign('tituloAdmin', 'Agregar, borrar o modificar una bodega');
        $this->smarty->assign('tituloUser', 'Listado de bodegas');
        $this->smarty->assign('stores' , $stores);
        $this->smarty->assign('admin' , $admin);
        $this->smarty->display('templates/Storelist.tpl');
        
    }

    function showWinesForStore($winesForStore){
        $this->smarty->assign('titulo', 'Lista de vinos por Bodega');
        $this->smarty->assign('winesForStore' , $winesForStore);
        $this->smarty->display('templates/WinesForStore.tpl');
        
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showCreateStore($stores){
        $this->smarty->assign('titulo', 'Cargar una bodega');
        $this->smarty->assign('stores' , $stores);
        $this->smarty->display('templates/showCreateStore.tpl');
    }
    
    function showCrudStoreLocation(){
        header("Location: ".BASE_URL."ListStore");
       
    }

    function showGoUpdateStore($id){
        $this->smarty->assign('titulo', 'Modificar bodega');
        $this->smarty->assign('id', $id);
        $this->smarty->display('templates/updateStore.tpl');
    }
}