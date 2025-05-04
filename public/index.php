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
		
	case 'admin':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->index();
		
		if(isset($_POST["submit_all_members"])){
			$controller->readMembers($connection);
		}else if(isset($_POST["submit_all_products"])){
			$controller->readProducts($connection);
		}else if(isset($_POST["submit_all_orders"])){
			$controller->readOrders($connection);
		}else if(isset($_POST["create_member"])){
			$controller->createMember($connection);
		}else if(isset($_POST["create_product"])){
			$controller->createProduct($connection);
		}else if(isset($_POST["create_order"])){
			$controller->createOrder($connection);
		}
		break;
		
	case 'update_member':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->modifyMember($connection);
		
		if(isset($_POST["update_member"])){
			$controller->updateMember($connection);
		}
		break;
		
	case 'update_product':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->modifyProduct($connection);
		
		if(isset($_POST["update_product"])){
			$controller->updateProduct($connection);
		}
		break;
	
	case 'update_order':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->modifyOrder($connection);
		
		if(isset($_POST["update_order"])){
			$controller->updateOrder($connection);
		}
		break;
		
	case 'delete_member':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->deleteMember($connection);
		
	case 'delete_product':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->deleteProduct($connection);
		
	case 'delete_order':
		require_once '../controllers/Admin_Controller.php';
		$controller = new AdminController($connection);
		$controller->deleteOrder($connection);
		

    case 'order_history':
        require_once '../controllers/Orders_Controller.php';
        $controller = new OrdersController($connection);
        $controller->index();
        break;

    default:
        echo "Page not found.";
        break;
}
?>