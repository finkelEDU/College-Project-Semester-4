<?php
class Product {
    //ATTRIBUTES
    public $productID;
    public $productName;
    public $productDescription;
    public $productCost;
    public $productImage;


    private $connection;

	//create and store connection
    public function __construct(PDO $connection , $productID, $productName, $productDescription, $productCost , $productImage ) {
        $this->connection = $connection; 

        $this->productID = $productID;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productCost = $productCost;
        $this->productImage = $productImage;
    }

    //fetch all products
    public function getAllProducts() {
        $sql = "SELECT * FROM Product";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($results as $row) {
            $products[] = new Product(
                $this->connection,
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
    public function getProductById($id) {
        $sql = "SELECT * FROM Product WHERE product_id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Product(
                $this->connection, 
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