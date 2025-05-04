<?php
session_start();
require_once '../common.php'; 
require_once '../config.php'; 

try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    exit("DB error has occurred: " . $e->getMessage());
}

//page router
$page = $_GET['page'] ?? 'home'; 

switch ($page) {
    case 'home':
        require_once '../controllers/Index_Controller.php'; 
        $controller = new IndexController();
        $controller->index(); 
        break;


    case 'login': 
        require_once '../controllers/Login_Controller.php';
        $controller = new LoginController($connection);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                 $controller->handleLogin(); 
            } else {
                 $controller->showLoginForm(); 
            }
            break;


    case 'logout': 
         require_once '../controllers/Login_Controller.php'; 
         $controller = new LoginController($connection);
                $controller->logout();
                break;


     case 'signup': 
        require_once '../controllers/Signup_Controller.php';
        $controller = new SignupController($connection);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->handleSignup(); 
        } else {
            $controller->showSignupForm(); 
        }
        break;


    case 'products':
        require_once '../controllers/Product_Controller.php';
        $controller = new ProductController($connection);
        $controller->index();
        break;
    

    case 'product_details':
        require_once '../controllers/Product_Controller.php';
        $controller = new ProductController($connection);
        $controller->details();
        break;
        

    case 'shopping_cart':
        require_once '../controllers/Cart_Controller.php';
        $controller = new CartController($connection);
        $controller->index();
        break;

    case 'cart_add': 
        require_once '../controllers/Cart_Controller.php';
        $controller = new CartController($connection);
        $controller->add();
        break;

    default:
        echo "Page not found.";
        break;
}
?>