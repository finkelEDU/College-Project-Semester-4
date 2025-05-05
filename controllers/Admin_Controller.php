<?php

class AdminController{	

	private $dbConnection;
	
    public function __construct(PDO $connection) {
        $this->dbConnection = $connection;
    }

	public function index() {
        include '../views/admin_view.php';
    }
	
	public function modifyMember($connection){
		if(isset($_GET["id"])){
			try{
				$id = $_GET["id"];
				$sql = "SELECT * FROM Member WHERE member_id = :member_id";
				$statement = $connection->prepare($sql);
				$statement->bindValue(":member_id", $id);
				$statement->execute();
				
				$member = $statement->fetch(PDO::FETCH_ASSOC);
			}catch(PDOException $error){
				echo $sql . "<br>" . $error->getMessage();
			}
		}else{
			echo "Something went wrong!";
			exit;
		}
		
		
		echo "<form method='post'>";
		foreach ($member as $key => $value) :
		echo "<label for='" . $key . "'>";
		echo ucfirst($key) . "</label>";
		echo "<input type='text' name='" . $key . "' id='" . $key;
		echo "' value='" . escape($value) . "'" ;
		echo ($key === 'member_id' ? 'readonly' : null) . "><br>";
		endforeach;
		echo "<input type='submit' name='update_member' value='Submit'>";
		echo "</form>";
	}
	
	public function createMember($connection){
		try{
			$new_member = array(
				"username"		=>		escape($_POST["username"]),
				"password"		=>		escape($_POST["password"]),
				"email"			=>		escape($_POST["email"]),
				"type"			=>		escape($_POST["type"])
			);

			$sql = sprintf("INSERT INTO %s (%s) values (%s)",
                            "Member", 
                            implode(", ", array_map(function($key) { return "member_" . $key; }, array_keys($new_member))), 
                            ":" . implode(", :", array_keys($new_member))
                           ); 
							
			$statement = $connection->prepare($sql);
			$statement->execute($new_member);

			echo "Member created!!";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function readMembers($connection){
		try{
			$sql = "SELECT * FROM Member";
			
			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
		
		if($result && $statement->rowCount() > 0){
			echo "<h2>Results</h2>";
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>#</th>";
			echo "<th>Username</th>";
			echo "<th>Password</th>";
			echo "<th>Email</th>";
			echo "<th>Member Type</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
				
			foreach ($result as $row){
				echo "<tr>";
				echo "<td>" . escape($row["member_id"]) . "</td>";
				echo "<td>" . escape($row["member_username"]) . "</td>";
				echo "<td>" . escape($row["member_password"]) . "</td>";
				echo "<td>" . escape($row["member_email"]) . "</td>";
				echo "<td>" . escape($row["member_type"]) . "</td>";
				
				echo "<td><a href='index.php?page=update_member&id=" . escape($row['member_id']) . "'>Edit</a></td>";
				echo "<td><a href='index.php?page=delete_member&id=" . escape($row["member_id"]) . "'>Delete</a></td>";
				
				echo "</tr>";
			}
			
			echo "</table>";

		}else{
			echo "> No results!!";
		}
	}//End of ReadMembers function
	
	
	public function updateMember($connection){		
		try{
			$member = [
				"member_id"			=> escape($_POST["member_id"]),
				"member_username" 	=> escape($_POST["member_username"]),
				"member_password"	=> escape($_POST["member_password"]),
				"member_email"		=> escape($_POST["member_email"]),
				"member_type"		=> escape($_POST["member_type"])
			];
			
			$sql = "UPDATE Member
					SET member_id = :member_id,
					member_username = :member_username,
					member_password = :member_password,
					member_email = :member_email,
					member_type = :member_type
					WHERE member_id = :member_id";
					
			$statement = $connection->prepare($sql);
			$statement->execute($member);
			
			echo "Updated entry!";
			echo "<a href='index.php'>Return to Home Page</a>";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function deleteMember($connection){
		try{
			$id = $_GET["id"];
			$sql = "DELETE FROM Member WHERE member_id = :id";
			
			$statement = $connection->prepare($sql);
			$statement->bindValue(":id", $id);
			$statement->execute();
			
			echo "Deleted entry!";
			echo "<br><a href='index.php'>Back to Home Page</a>";
		}catch(PDOException $error){
			echo "Cannot delete someone who has made an order!<br>";
			echo "<a href='index.php'>Return to Home Page</a>";
		}
	}
	
	public function modifyProduct($connection){
		if(isset($_GET["id"])){
			try{
				$id = $_GET["id"];
				$sql = "SELECT * FROM Product WHERE product_id = :product_id";
				$statement = $connection->prepare($sql);
				$statement->bindValue(":product_id", $id);
				$statement->execute();
				
				$product = $statement->fetch(PDO::FETCH_ASSOC);
			}catch(PDOException $error){
				echo $sql . "<br>" . $error->getMessage();
			}
		}else{
			echo "Something went wrong!";
			exit;
		}
		
		echo "<form method='post'>";
		foreach ($product as $key => $value) :
		echo "<label for='" . $key . "'>";
		echo ucfirst($key) . "</label>";
		echo "<input type='text' name='" . $key . "' id='" . $key;
		echo "' value='" . escape($value) . "'" ;
		echo ($key === 'member_id' ? 'readonly' : null) . "><br>";
		endforeach;
		echo "<input type='submit' name='update_product' value='Submit'>";
		echo "</form>";
	}
	
	public function createProduct($connection){
		try{
			

			$new_product = array(
				"name"			=>		escape($_POST["name"]),
				"description"	=>		escape($_POST["description"]),
				"cost"			=>		escape($_POST["cost"]),
				"image"			=>		escape($_POST["image"])
			);

			$sql = sprintf("INSERT INTO %s (%s) values (%s)",
                            "Product", 
                            implode(", ", array_map(function($key) { return "product_" . $key; }, array_keys($new_product))), 
                            ":" . implode(", :", array_keys($new_product))
                           ); 
							
			$statement = $connection->prepare($sql);
			$statement->execute($new_product);

			echo "Product created!!";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function readProducts($connection){
		try{
			$sql = "SELECT * FROM Product";
			
			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
		
		if($result && $statement->rowCount() > 0){
			echo "<h2>Results</h2>";
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>#</th>";
			echo "<th>Name</th>";
			echo "<th>Description</th>";
			echo "<th>Cost</th>";
			echo "<th>Image Path</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
				
			foreach ($result as $row){
				echo "<tr>";
				echo "<td>" . escape($row["product_id"]) . "</td>";
				echo "<td>" . escape($row["product_name"]) . "</td>";
				echo "<td>" . escape($row["product_description"]) . "</td>";
				echo "<td>" . escape($row["product_cost"]) . "</td>";
				echo "<td>" . escape($row["product_image"]) . "</td>";
				
				echo "<td><a href='index.php?page=update_product&id=" . escape($row['product_id']) . "'>Edit</a></td>";
				echo "<td><a href='index.php?page=delete_product&id=" . escape($row["product_id"]) . "'>Delete</a></td>";
				
				echo "</tr>";
			}
			
			echo "</table>";

		}else{
			echo "> No results!!";
		}
	}
	
	public function updateProduct($connection){
		try{
			$product = [
				"product_id"			=> escape($_POST["product_id"]),
				"product_name"			=> escape($_POST["product_name"]),
				"product_description" 	=> escape($_POST["product_description"]),
				"product_cost"			=> escape($_POST["product_cost"]),
				"product_image"			=> escape($_POST["product_image"])
			];
			
			$sql = "UPDATE Product
					SET product_id = :product_id,
					product_name = :product_name,
					product_description = :product_description,
					product_cost = :product_cost,
					product_image = :product_image
					WHERE product_id = :product_id";
					
			$statement = $connection->prepare($sql);
			$statement->execute($product);
			
			echo "Updated entry!";
			echo "<a href='index.php'>Return to Home Page</a>";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function deleteProduct($connection){
		try{
			$id = $_GET["id"];
			$sql = "DELETE FROM Product WHERE product_id = :id";
			
			$statement = $connection->prepare($sql);
			$statement->bindValue(":id", $id);
			$statement->execute();
			
			echo "Deleted entry!";
			echo "<a href='index.php'>Return to Home Page</a>";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function modifyOrder($connection){
		if(isset($_GET["id"])){
			try{
				$id = $_GET["id"];
				$sql = "SELECT * FROM Orders WHERE orders_id = :orders_id";
				$statement = $connection->prepare($sql);
				$statement->bindValue(":orders_id", $id);
				$statement->execute();
				
				$orders = $statement->fetch(PDO::FETCH_ASSOC);
			}catch(PDOException $error){
				echo $sql . "<br>" . $error->getMessage();
			}
		}else{
			echo "Something went wrong!";
			exit;
		}
		
		
		echo "<form method='post'>";
		foreach ($orders as $key => $value) :
		echo "<label for='" . $key . "'>";
		echo ucfirst($key) . "</label>";
		echo "<input type='text' name='" . $key . "' id='" . $key;
		echo "' value='" . escape($value) . "'" ;
		echo ($key === 'member_id' ? 'readonly' : null) . "><br>";
		endforeach;
		echo "<input type='submit' name='update_order' value='Submit'>";
		echo "</form>";
	}
	
	public function createOrder($connection){
		try{			   
			$sql = "INSERT INTO ORDERS (orders_date, product_name, member_id) VALUES (:orders_date, :product_name, :member_id)";
							
			$statement = $connection->prepare($sql);
			$statement->bindParam(":orders_date", $_POST["orders_date"]);
			$statement->bindParam(":product_name", $_POST["product_name"]);
			$statement->bindParam(":member_id", $_POST["member_id"]);
			
			$statement->execute();

			echo "Order created!!";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function readOrders($connection){
		try{
			$sql = "SELECT * FROM Orders";
			
			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
		
		if($result && $statement->rowCount() > 0){
			echo "<h2>Results</h2>";
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>#</th>";
			echo "<th>Date</th>";
			echo "<th>Products</th>";
			echo "<th>Member #</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
				
			foreach ($result as $row){
				echo "<tr>";
				echo "<td>" . escape($row["orders_id"]) . "</td>";
				echo "<td>" . escape($row["orders_date"]) . "</td>";
				echo "<td>" . escape($row["product_name"]) . "</td>";
				echo "<td>" . escape($row["member_id"]) . "</td>";
				
				echo "<td><a href='index.php?page=update_order&id=" . escape($row['orders_id']) . "'>Edit</a></td>";
				echo "<td><a href='index.php?page=delete_order&id=" . escape($row["orders_id"]) . "'>Delete</a></td>";
				
				echo "</tr>";
			}
			
			echo "</table>";

		}else{
			echo "> No results!!";
		}
	}
	
	public function updateOrder($connection){
		try{
			$orders = [
				"orders_id"		=> escape($_POST["orders_id"]),
				"orders_date" 	=> escape($_POST["orders_date"]),
				"product_name"	=> escape($_POST["product_name"]),
				"member_id"		=> escape($_POST["member_id"])
			];
			
			$sql = "UPDATE Orders
					SET orders_id = :orders_id,
					orders_date = :orders_date,
					product_name = :product_name,
					member_id = :member_id
					WHERE orders_id = :orders_id";
					
			$statement = $connection->prepare($sql);
			$statement->execute($orders);
			
			echo "Updated entry!";
			echo "<a href='index.php'>Return to Home Page</a>";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	
	public function deleteOrder($connection){
		try{
			$id = $_GET["id"];
			$sql = "DELETE FROM Orders WHERE orders_id = :id";
			
			$statement = $connection->prepare($sql);
			$statement->bindValue(":id", $id);
			$statement->execute();
			
			echo "Deleted entry!";
			echo "<a href='index.php'>Return to Home Page</a>";
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
}