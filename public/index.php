<?php
session_start();
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

     case 'signup': 
        require_once '../controllers/Signup_Controller.php';
        $controller = new SignupController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleSignup(); 
        } else {
            $controller->showSignupForm(); 
        }
        break;

    case 'products':
        require_once '../controllers/Product_Controller.php';
        $controller = new ProductController();
        $controller->index();
        break;
    
    case 'product_details':
        require_once '../controllers/Product_Controller.php';
        $controller = new ProductController();
        $controller->details();
        break;
        
    case 'shopping_cart':
        require_once '../controllers/Product_Controller.php';
        $controller = new ProductController();
        $controller->cart();
        break;


    default:
        echo "Page not found.";
        break;
}
?>