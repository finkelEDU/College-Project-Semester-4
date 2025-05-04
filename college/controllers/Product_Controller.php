<?php
require_once '../models/Product.php';
class ProductController {
    
    private $dbConnection;
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

    //displays all products
    public function index() {
        $products = Product::getAllProducts($this->dbConnection); 
        include '../views/products_view.php';
    }
    
    //for product details
    public function details() {
        $product = null;
        if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = Product::getProductById($this->dbConnection, $id);
    }
        include '../views/product_details_view.php';
}   
}
?>