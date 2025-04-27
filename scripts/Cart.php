<?php
class Cart{
	//ATTRIBUTES
	public $cartItems = array(-1, -1, -1, -1, -1);
	
	public function __construct(){
		//Not used
	}
	
	public function setCartItem($arrayNumber, $itemNumber){
		$this->cartItems[$arrayNumber] = $itemNumber;
	}
	
	public function getCartItem($arrayNumber){
		return $this->cartItems[$arrayNumber];
	}
	
	public function addItem($itemNumber){
		if($this->cartItems[0] == -1){
			$this->cartItems[0] = $itemNumber;
		}else if($this->cartItems[1] == -1){
			$this->cartItems[1] = $itemNumber;
		}else if($this->cartItems[2] == -1){
			$this->cartItems[2] = $itemNumber;
		}else if($this->cartItems[3] == -1){
			$this->cartItems[3] = $itemNumber;
		}else if($this->cartItems[04] == -1){
			$this->cartItems[4] = $itemNumber;
		}
	}
	
	public function removeItem($itemNumber){
		if($this->cartItems[4] != -1){
			$this->cartItems[4] = $itemNumber;
		}else if($this->cartItems[3] != -1){
			$this->cartItems[3] = $itemNumber;
		}else if($this->cartItems[2] != -1){
			$this->cartItems[2] = $itemNumber;
		}else if($this->cartItems[1] != -1){
			$this->cartItems[1] = $itemNumber;
		}else if($this->cartItems[0] != -1){
			$this->cartItems[0] = $itemNumber;
		}
	}



	//DISPLAY DETAILS
	public function displayCart(){
		echo "<br>CART ITEMS";
		echo "<br>Item 1: " . $this->getCartItem(0);
		echo "<br>Item 2: " . $this->getCartItem(1);
		echo "<br>Item 3: " . $this->getCartItem(2);
		echo "<br>Item 4: " . $this->getCartItem(3);
		echo "<br>Item 5: " . $this->getCartItem(4);
	}
}

?>