<?php
require_once '../models/Product.php';
class ProductController {
    
    private $dbConnection;
    private $productModel;
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
        $this->productModel = new Product($this->dbConnection); 
    }

    //displays all products
    public function index() {
        $products = $this->productModel->getAllProducts(); 
        include '../views/products_view.php';
    }
    
    //for product details
    public function details() {
        $product = null;
        if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = $this->productModel->getProductById($id); 
    }
        include '../views/product_details_view.php';
}   
}
?>