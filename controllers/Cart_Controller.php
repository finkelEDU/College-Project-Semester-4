<?php
require_once '../models/Cart.php';
require_once '../models/Product.php';

class CartController {
    private $dbConnection;

    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

    public function index() {
        $cartItems = Cart::getItems();
        $productIds = array_keys($cartItems);

        //array to store product details
        $products_by_id = [];
        
        //get product details for each item in cart for that array
        foreach ($productIds as $id) {
            $product = Product::getProductById($this->dbConnection, $id);
            if ($product) {
            $products_by_id[$id] = [
            'product_id' => $product->productID,
            'product_name' => $product->productName,
            'product_description' => $product->productDescription,
            'product_cost' => $product->productCost,
            'product_image' => $product->productImage
            ];
        }
    }
        
        $total_cost = 0;
        foreach ($cartItems as $id => $quantity) {
            if (isset($products_by_id[$id])) {
                $total_cost += $products_by_id[$id]['product_cost'] * $quantity;
            }   
        }
        if (isset($_POST["buy"])) { 
            echo "Work on order is not finished yet."; 
        }   
        
        $viewData = [
            'cart_items' => $cartItems,
            'products_by_id' => $products_by_id,
            'total_cost' => $total_cost
        ];
        extract($viewData);
        include '../views/shopping_view.php';
    }
    
    public function add() {
        if (isset($_POST['add']) && isset($_POST['product_id_hidden'])) {
            $id = $_POST['product_id_hidden'];
            Cart::addToCart($id, 1);
            exit;
        }
    }
}
?>
