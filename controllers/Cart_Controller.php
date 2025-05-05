<?php
require_once '../models/Cart.php';
require_once '../models/Product.php';
require_once '../models/Orders.php';

class CartController {
    private $dbConnection;
    private $cart;
    private $productModel;
    private $ordersModel;

    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
        $this->cart = new Cart(); 
        $this->productModel = new Product($this->dbConnection); 
        $this->ordersModel = new Orders($this->dbConnection); 
    }

    public function index() {
        //get current cart items
        $cartItems = $this->cart->getItems();
        $productIds = array_keys($cartItems);
        $products_by_id = []; 

        //fetch all prod details for each item in cart
        foreach ($productIds as $id) {
            $product = $this->productModel->getProductById($id); 
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
        //calculate total cost
        $total_cost = 0;
        foreach ($cartItems as $id => $quantity) {
            if (isset($products_by_id[$id])) {
                $total_cost += $products_by_id[$id]['product_cost'] * $quantity;
            }
        }

        //basic ordering logic
        if (isset($_POST["buy"])) {
            if (isset($_SESSION["UserID"]) && !empty($cartItems)) {
                $memberId = $_SESSION["UserID"];
                $orderSuccess = true;
                $currentDateTime = date('Y-m-d H:i:s');

                foreach ($cartItems as $productId => $quantity) {
                    if (isset($products_by_id[$productId])) {
                        $productName = $products_by_id[$productId]['product_name'];
                        if (!$this->ordersModel->createOrder($memberId, $productName, $currentDateTime)) { 
                            $orderSuccess = false;
                            break;
                        }
                    }
                }

                //if order successful, clear cart and redirect
                if ($orderSuccess) {
                    $this->cart->clearCart(); 
                    header("Location: index.php?page=products&order=success");
                    exit;
                } else {
                    header("Location: index.php?page=shopping_cart&order=failed");
                    exit;
                }
            }
        }

        $viewData = [
            'cart_items' => $cartItems,
            'products_by_id' => $products_by_id,
            'total_cost' => $total_cost
        ];
        include '../views/shopping_view.php';

    }
    public function add() {
        if (isset($_POST['add']) && isset($_POST['product_id_hidden'])) {
            $id = $_POST['product_id_hidden'];
            $this->cart->addToCart($id, 1);
            header("Location: index.php?page=product_details&id=" . $id . "&added=true");
            exit;
        }
        header("Location: index.php?page=products");
        exit;
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->cart->removeFromCart($id);
        }
        header("Location: index.php?page=shopping_cart");
        exit;
    }
}
?>