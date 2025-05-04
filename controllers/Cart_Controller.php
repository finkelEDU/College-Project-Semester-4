<?php
require_once '../models/Cart.php';
require_once '../models/Product.php';
require_once '../models/Orders.php';

class CartController {
    private $dbConnection;

    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

    public function index() {
        $cartItems = Cart::getItems();
        $productIds = array_keys($cartItems);
        $products_by_id = [];

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
            if (isset($_SESSION["UserID"]) && !empty($cartItems)) {
                $memberId = $_SESSION["UserID"];
                $orderSuccess = true;

                foreach ($cartItems as $productId => $quantity) {
                    if (isset($products_by_id[$productId])) {
                        $productName = $products_by_id[$productId]['product_name'];
                        if (!Orders::createOrder($this->dbConnection, $memberId, $productName)) {
                            $orderSuccess = false;
                            break;
                        }
                    }
                }

                if ($orderSuccess) {
                    $_SESSION['cart'] = [];
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
        extract($viewData);
        include '../views/shopping_view.php';

    }

    public function add() {
        if (isset($_POST['add']) && isset($_POST['product_id_hidden'])) {
            $id = $_POST['product_id_hidden'];
            Cart::addToCart($id, 1);
            header("Location: index.php?page=product_details&id=" . $id . "&added=true");
            exit;
        }
        header("Location: index.php?page=products");
        exit;
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Cart::removeFromCart($id);
        }
        header("Location: index.php?page=shopping_cart");
        exit;
    }
}
?>