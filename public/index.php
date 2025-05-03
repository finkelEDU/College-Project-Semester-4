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


    default:
        echo "Page not found.";
        break;
}
?>