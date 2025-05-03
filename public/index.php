<?php

require_once '../common.php'; 
require_once '../config.php'; 

//router
$page = $_GET['page'] ?? 'home'; 

switch ($page) {
    case 'home':
        require_once '../controllers/Index_Controller.php'; 
        $controller = new IndexController();
        $controller->index(); 
        break;

    case 'login': 
        require_once '../controllers/Login_Controller.php';
        $controller = new LoginController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 $controller->handleLogin(); 
            } else {
                 $controller->showLoginForm(); 
            }
            break;

    case 'logout': 
         require_once '../controllers/Login_Controller.php'; 
        $controller = new LoginController();
                $controller->logout();
                break;


    default:
        echo "Page not found.";
        break;
}
?>