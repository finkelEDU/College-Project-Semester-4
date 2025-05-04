<?php
class Orders{	
	public static function createOrder(PDO $connection, int $memberId, string $productName): bool {
        $sql = "INSERT INTO Orders (orders_date, product_name, member_id) VALUES (NOW(), :product_name, :member_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(":product_name", $productName);
            $statement->bindParam(":member_id", $memberId);
            return $statement->execute();
    }

	public static function getOrdersByMemberId(PDO $connection, int $memberId): array {
        $sql = "SELECT orders_id, orders_date, product_name FROM Orders WHERE member_id = :member_id ORDER BY orders_date DESC";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':member_id', $memberId);
        $statement->execute();
        return $statement->fetchAll();
    }

}







?>
