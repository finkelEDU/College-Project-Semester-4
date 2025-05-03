<?php
	if(isset($_POST["submit_all_members"])){
		try{
			require "../common.php";
			require_once "../src/DBconnect.php";
			
			$sql = "SELECT * FROM Member";
			
			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}
	else if(isset($_POST["submit_all_products"])){
		try{
			require "../common.php";
			require_once "../src/DBconnect.php";
			
			$sql = "SELECT * FROM Product";
			
			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}else if(isset($_POST["submit_all_orders"])){
		try{
			require "../common.php";
			require_once "../src/DBconnect.php";

			$sql = "SELECT * FROM Orders";

			$statement = $connection->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll();
		}catch(PDOException $error){
			echo $sql . "<br>" . $error->getMessage();
		}
	}else if(isset($_POST["create_product"])){
		require "../common.php";

		try{
			require_once "../src/DBconnect.php";

			$new_product = array(
				"name"			=>		escape($_POST["name"]),
				"description"			=>		escape($_POST["description"]),
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
?>

<?php include "templates/header_special.php"; ?>
<?php include "templates/nav.php"; ?>

<?php
	if(isset($_POST["submit_all_members"])){
		if($result && $statement->rowCount() > 0){
?>

<h2>Results</h2>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Member Type</th>
		</tr>
	</thead>
	
	<tbody>
	
	<?php foreach ($result as $row){ ?>
	<tr>
		<td><?php echo escape($row["member_id"]); ?></td>
		<td><?php echo escape($row["member_username"]); ?></td>
		<td><?php echo escape($row["member_password"]); ?></td>
		<td><?php echo escape($row["member_email"]); ?></td>
		<td><?php echo escape($row["member_type"]); ?></td>
	</tr>
	
	<?php } ?>
	</tbody>
</table>

		<?php }else{ ?>
		> No results!!
	<?php }
	} 
	else if(isset($_POST["submit_all_products"])){
		if($result && $statement->rowCount() > 0){
	?>
<h2>Results</h2>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Description</th>
			<th>Cost</th>
			<th>Image</th>
		</tr>
	</thead>
	
	<tbody>
	
	<?php foreach ($result as $row){ ?>
	<tr>
		<td><?php echo escape($row["product_id"]); ?></td>
		<td><?php echo escape($row["product_name"]); ?></td>
		<td><?php echo escape($row["product_description"]); ?></td>
		<td>&#8364;<?php echo escape($row["product_cost"]); ?></td>
		<td><?php echo escape($row["product_image"]); ?></td>
	</tr>
	
	<?php } ?>
	</tbody>
</table>

		<?php }else{ ?>
		> No results!!
	<?php }
	}else if(isset($_POST["submit_all_orders"])){
		if($result && $statement->rowCount() > 0){
	?>
<h2>Results</h2>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Product Name</th>
			<th>Member ID</th>
		</tr>
	</thead>
	
	<tbody>
	
	<?php foreach ($result as $row){ ?>
	<tr>
		<td><?php echo escape($row["orders_id"]); ?></td>
		<td><?php echo escape($row["product_name"]); ?></td>
		<td><?php echo escape($row["member_id"]); ?></td>
	</tr>
	
	<?php } ?>
	</tbody>
	</table>
		<?php }else{ ?>
		> No results!!
	<?php }
	}?>

<form method="post">
	<br>
	<input type="submit" name="submit_all_members" value="Show All Members">
	<input type="submit" name="submit_all_products" value="Show All Products">
	<input type="submit" name="submit_all_orders" value="Show All Orders">
</form>

<h2>Create Product</h2>
	<form method="post">
		<label for="name">Name: </label>
		<input type="text" name="name" id="name" required>
		<label for="description">Description: </label>
		<input type="text" name="description" id="description" required>
		<label for="cost"> Cost: </label>
		<input type="text" name="cost" id="cost" required>
		<label for="image">Image Path: </label>
		<input type="text" name="image" id="image"><br>
		<input type="submit" name="create_product" value="Create Product">
	</form>
	
<?php include "templates/footer.php"; ?>