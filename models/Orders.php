<?php
class Orders {
    private $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
    // creates an order with member id, product name 
    public function createOrder($memberId, $productName, $orderDate) {
        $sql = "INSERT INTO Orders (orders_date, product_name, member_id) VALUES (:orders_date, :product_name, :member_id)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":orders_date", $orderDate);
        $statement->bindParam(":product_name", $productName);
        $statement->bindParam(":member_id", $memberId);
        return $statement->execute();
    }

    // gets all orders by member id 
    public function getOrdersByMemberId($memberId) {
        $sql = "SELECT orders_id, orders_date, product_name FROM Orders WHERE member_id = :member_id ORDER BY orders_date DESC";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':member_id', $memberId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC); 
    }

}
?>
