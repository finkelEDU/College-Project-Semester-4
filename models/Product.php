<?php
class Product{
	//ATTRIBUTES
	public $productID;
	public $productName;
	public $productDescription;
	public $productCost;
	public $productImage;

	//CONSTRUCTOR
	public function __construct($productID,$productName,$productDescription,$productCost,$productImage){
		$this->productID = $productID;
		$this->productName = $productName;
		$this->productDescription = $productDescription;
		$this->productCost = $productCost;
		$this->productImage = $productImage;
	}

	//collect all products as product objects
	public static function getAllProducts(PDO $connection): array {
        $sql = "SELECT * FROM Product";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($results as $row) {
    $products[] = new Product(
		$row['product_id'],
		$row['product_name'],
		$row['product_description'],
		$row['product_cost'],
		$row['product_image']
            );
        }
        return $products;
    }


	//get single product by id
	public static function getProductById(PDO $connection, int $id): ?Product {
        $sql = "SELECT * FROM Product WHERE product_id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if ($row) {
	return new Product(
		$row['product_id'],
		$row['product_name'],
		$row['product_description'],
		$row['product_cost'],
		$row['product_image']
            );
        }
        return null;
    }

}
?>