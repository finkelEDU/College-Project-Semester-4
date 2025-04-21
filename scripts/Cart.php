<?php
class Cart{
	//ATTRIBUTES
	public $cartItems = array(0, 0, 0, 0, 0);
	
	public function addItem($itemNumber){
		if($cartItems[0] == 0){
			$cartItems[0] = $itemNumber;
		}
	}



	//DISPLAY DETAILS
	public function displayMember(){
		echo "<br>MEMBER";
		echo "<br>ID: " . $this->getMemberID();
		echo "<br>Username: " . $this->getMemberUsername();
		echo "<br>Password: " . $this->getMemberPassword();
		echo "<br>Email: " . $this->getMemberEmail();
		echo "<br>Date of Birth: " . $this->getMemberDOB();
	}
}
?>