<?php
require_once "./Model/UserModel.php";
require_once "./View/LoginView.php";
require_once "./Helpers/AuthHelper.php";

class LoginController {
    
    private $model;
    private $view;
    private $AuthHelper;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->AuthHelper = new AuthHelper();
    }

    function start() {
        $this->view->start();
    }

    function showHome() {
        $this->view->showHome();
    }

    function login(){
        $this->view->showLogin();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin();
    }

    function verifylogin(){
        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $username= $_POST['name'];
            $userpass= $_POST['password'];
     

            $user = $this->model->getUser($username);

            if($user && password_verify($userpass, $user->Password)){

                session_start();
                $_SESSION["name"] = $username;
                
                $admin = $this->model->IsAdmin($_SESSION["name"]);
                $this->view->showAdminHome($admin);    

            }
            else{
                $this->view->showLogin("Acceso Denegado");
            }
     
        }
     
    }

    function adminHome(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->IsAdmin($_SESSION["name"]);
        $this->view->showAdminHome($admin);
    }

    function register(){
        $this->view->showRegister();
    }

    function verifyregister(){
        if(!empty($_POST['name']) && !empty($_POST['password'])){
            $username = $_POST['name'];
            $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
            $admin = $_POST['admin'];
            $this->model->insertRegister($username, $password, $admin);
        }
    }

    function adminUser(){
        $this->AuthHelper->checkLoggedIn();
        $admin = $this->model->IsAdmin($_SESSION["name"]);
        $usuarios = $this->model->getUsers();
        $this->view->showUsers($usuarios, $admin);
    }

    function deleteUser($id){
        $this->AuthHelper->checkLoggedIn();
        $this->model->deleteUser($id);
        $this->view->showUserLocation();
    }

    function CambiarCondicion($id){
        $this->AuthHelper->checkLoggedIn();
        $this->model->updateUser($id);
        $this->view->showUserLocation();
    }

}