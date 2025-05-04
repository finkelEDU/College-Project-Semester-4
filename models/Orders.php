<?php
class Orders{
	//ATTRIBUTES
	public $ordersID;
	public $ordersDate;
	public $memberID;
	
	//CONSTRUCTOR
	public function __construct($ordersID, $ordersDate, $memberID){
		$this->ordersID = $ordersID;
		$this->ordersDate = $ordersDate;
		$this->memberID = $memberID;
	}
		
	//SETTERS
	public function setOrdersID($ordersID){
		$this->ordersID = $ordersID;
	}
	
	public function setOrdersDate($ordersDate){
		$this->ordersDate = $ordersDate;
	}
	
	public function setMemberID($memberID){
		$this->memberID = $memberID;
	}
	
	//GETTERS
	public function getOrdersID(){
		return $this->ordersID;
	}
	
	public function getOrdersDate(){
		return $this->ordersDate;
	}
	
	public function getMemberID(){
		return $this->memberID;
	}
	
	//DISPLAY DETAILS
	public function displayOrders(){
		echo "<br>ORDERS";
		echo "<br>Orders ID: " . $this->getOrdersID();
		echo "<br>Date: " . $this->getOrdersDate();
		echo "<br>Member ID: " . $this->getMemberID();
	}
	public static function createOrder(PDO $connection, int $memberId, string $productName): bool {
        $sql = "INSERT INTO Orders (orders_date, product_name, member_id) VALUES (NOW(), :product_name, :member_id)";
            $statement = $connection->prepare($sql);
            $statement->bindParam(":product_name", $productName);
            $statement->bindParam(":member_id", $memberId);
            return $statement->execute();
    }
}







?>