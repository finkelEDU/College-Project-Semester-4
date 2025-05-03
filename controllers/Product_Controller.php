<?php
require_once '../models/Product.php';
//MIX OF MVC, WILL SEPARATE LATER
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
        if ($product && isset($_POST['add']))
            if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
            
            if (isset($_SESSION['cart'][$id])) {
                //adds to quantity
                $_SESSION['cart'][$id]++;
            } else {
                //add 1 new item
            $_SESSION['cart'][$id] = 1;
            }
            header("Location: index.php?page=products&added=" . $id); 
            exit;
        }
    }
        include '../views/product_details_view.php';
    }
        
    
    //temporary cart here
    public function cart() {
        
            global $dsn, $username, $password, $options;
            $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM Product";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $all_products_result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $products_by_id = [];
            
            foreach ($all_products_result as $prod) {
                $products_by_id[$prod['product_id']] = $prod;
            }
            
            if (isset($_POST["buy"])) {
                echo "Work on order is not finished yet.";
            
        }
        
        include '../views/shopping_view.php';
    }
    
}
?>