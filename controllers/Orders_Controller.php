<?php
require_once '../models/Orders.php';

//history of orders 
class OrdersController {

    private $dbConnection;
    private $ordersModel;

    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
        $this->ordersModel = new Orders($this->dbConnection); 
    }

    public function index() {
        if (!isset($_SESSION["UserID"])) {
            header("Location: index.php?page=login");
            exit;
        }

        $memberId = $_SESSION["UserID"];
        $orders = $this->ordersModel->getOrdersByMemberId($memberId); 

        include '../views/orders_view.php';
    }
}
?>
