<?php

require_once "./smarty-3.1.39/libs/Smarty.class.php";

class LoginView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function start(){
        $this->smarty->display('templates/start.tpl');
    }

    function showHome (){
        $this->smarty->display('templates/home.tpl');
    }

    function showLogin($error = ""){
        $this->smarty->assign('titulo', 'Login');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/Login.tpl');
        
    }

    function showAdminHome($admin){
        $this->smarty->assign('admin', $admin);
        $this->smarty->display('templates/adminHome.tpl');
    }

    function showRegister(){
        $this->smarty->assign('titulo', 'Register');
        $this->smarty->display('templates/ShowRegister.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showUsers ($usuarios, $admin){
        $this->smarty->assign('titulo', 'Lista de Usuarios');
        $this->smarty->assign('usuarios' , $usuarios);
        $this->smarty->assign('admin' , $admin);
        $this->smarty->display('templates/UsersList.tpl');
    }

    function showUserLocation(){
        header("Location: ".BASE_URL."adminUser");
    }
}