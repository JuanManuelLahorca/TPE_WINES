<?php    
    require_once "./Controller/CategoryController.php";
    require_once "./Controller/ProductController.php";
    require_once "./Controller/LoginController.php";


    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'start'; // acción por defecto si no envían
    }

    $params = explode('/', $action);

    $CategoryController = new   CategoryController();
    $ProductController = new   ProductController();
    $LoginController = new LoginController();


    // determina que camino seguir según la acción
    switch ($params[0]) {
        case 'start': 
            $LoginController->start(); // Comenzar
            break;  
        case 'login': 
            $LoginController->login(); // Loguearse
            break;  
        case 'verify': 
            $LoginController->verifylogin(); // verificar logueo
            break;    
        case 'adminHome': 
            $LoginController->adminHome(); //home de crud de una bodega -- lista de categorias admin
            break;
        case 'logout': 
            $LoginController->logout(); // Desloguearse
            break;         
        case 'register': 
            $LoginController->register(); // Registrarse
            break;   
        case 'verifyregister': 
            $LoginController->verifyregister(); // verificar registro
            break; 
        case 'home': 
            $LoginController->showHome(); //Listado de los vinos -- listado de items
            break;
        case 'wines': 
            $ProductController->showWines(); //Listado de los vinos -- listado de items
            break;  
        case 'ListStore': 
            $CategoryController->ListStore(); //Muestra la lista de bodegas -- listado de categorias
            break;  
        case 'winesForStore': 
            $CategoryController->winesForStore($params[1]); // Muestra los vinos de una bodega seleccionada -- listado de item por categoria
            break;
        case 'viewWine': 
            $ProductController->viewWine($params[1]); // Muestra los datos del vino
            break;
        case 'createWine': 
            $ProductController->createWine(); //crear un vino -- agrega items admin
            break;
        case 'createComments': 
            $ProductController->createComments(); //crear un comentario -- agrega items admin
            break;
        case 'deleteWine': 
            $ProductController->deleteWine($params[1]); //borro un vino -- 
            break;
        case 'goUpdateWine': 
            $ProductController->goUpdateWine($params[1]); //modifico un vino -- 
            break;
        case 'updateWine': 
            $ProductController->updateWine(); //modifico un vino -- 
            break;
        case 'showCreateWine': 
            $ProductController->showCreateWine(); //muestra formulario para crear un vino -- 
            break;
        case 'showCreateStore': 
            $CategoryController->showCreateStore(); //muestra formulario para crear una bodega --
            break;
        case 'createStore': 
            $CategoryController->createStore(); //crea una bodega--
            break;
        case 'deleteStore': 
            $CategoryController->deleteStore($params[1]); //borra una bodega--
            break;
        case 'goUpdateStore': 
            $CategoryController->goUpdateStore($params[1]); //modificar una bodega--
            break;
        case 'updateStore': 
            $CategoryController->updateStore(); //modificar una bodega--
            break;
        case 'adminUser': 
            $LoginController->adminUser(); //modificar una bodega--
            break;     
        case 'borrarUser': 
            $LoginController->deleteUser($params[1]); //borro un vino -- 
            break;
        case 'cambiarCondicion': 
            $LoginController->cambiarCondicion($params[1]); //borro un vino -- 
            break;

    default: 
            echo('404 Page not found'); 
            break;
            
    }
