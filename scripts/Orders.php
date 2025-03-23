<?php
class Orders{
	//ATTRIBUTES
	public $ordersID;
	public $ordersDate;
	public $memberID;
		
	//SETTERS
	public funtion setOrdersID($ordersID){
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
}







?>