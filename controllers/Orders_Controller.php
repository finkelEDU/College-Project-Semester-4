<?php
require_once '../models/Orders.php';

//history of orders 
class OrdersController {

    private $dbConnection;

    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

    public function index() {
        if (!isset($_SESSION["UserID"])) {
            header("Location: index.php?page=login");
            exit;
        }

        $memberId = $_SESSION["UserID"];
        $orders = Orders::getOrdersByMemberId($this->dbConnection, $memberId);

        include '../views/orders_view.php';
    }
}
?>
