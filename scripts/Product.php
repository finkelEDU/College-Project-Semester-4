<?php
class Product{
	//ATTRIBUTES
	public $productID;
	public $productName;
	public $productDescription;
	public $productCost;
	public $productImage;
	
	//SETTERS
	public function setProductID($productID){
		$this->productID = $productID;
	}
	
	public function setProductName($productName){
		$this->productName = $productName;
	}
	
	public function setProductDescription($productDescription){
		$this->productDescription = $productDescription;
	}
	
	public function setProductCost($productCost){
		$this->productCost = $productCost;
	}
	
	public function setProductImage($productImage){
		$this->productImage = $productImage;
	}
	
	//GETTERS
	public function getProductID(){
		return $this->productID;
	}
	
	public function getProductName(){
		return $this->productName;
	}
	
	public function getProductDescription(){
		return $this->productDescription;
	}
	
	public function getProductCost(){
		return $this->productCost;
	}
	
	public function getProductImage(){
		return $this->productImage;
	}
	
	//DISPLAY DETAILS
	public function displayProduct(){
		echo "<br>PRODUCT";
		echo "<br>ID: " . $this->getProductID();
		echo "<br>Name: " . $this->getProductName();
		echo "<br>Description: " . $this->getProductDescription();
		echo "<br>Cost: " . $this->getProductCost();
		echo "<br>Image: " . $this.getProductImage();
	}
}
?>