<?php
	//include "../models/AdminControl.php";
	//$AdminController = new AdminControl();
	
	if(isset($_POST["create_product"])){
		$AdminController->createProduct();
	}else if(isset($_POST["create_member"])){
		$AdminController->createMember();
	}else if(isset($_POST["create_order"])){
		$AdminController->createOrder();
	}
	
	if(isset($_GET["id"])){
		$AdminController->deleteMember();
	}
?>

<?php include "templates/header_special.php"; ?>
<?php include "templates/nav.php"; ?>

<?php
	if(isset($_POST["submit_all_members"])){
		$AdminController->readMembers();
	}else if(isset($_POST["submit_all_products"])){
		$AdminController->readProducts();
	}else if(isset($_POST["submit_all_orders"])){
		$AdminController->readOrders();
	}
?>


<form method="post">
	<br>
	<input type="submit" name="submit_all_members" value="Show All Members">
	<input type="submit" name="submit_all_products" value="Show All Products">
	<input type="submit" name="submit_all_orders" value="Show All Orders">
</form>

<hr>
<h2>Create Member</h2>
	<form method="post">
		<label for="username">Username: </label>
		<input type="text" name="username" id="username" required>
		<label for="password">Password: </label>
		<input type="text" name="password" id="password" required>
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" required>
		<label for="type">Member Type: </label>
		<input type="text" name="type" id="type"><br><br>
		<input type="submit" name="create_member" value="Create Member">
	</form><hr>

<h2>Create Product</h2>
	<form method="post">
		<label for="name">Name: </label>
		<input type="text" name="name" id="name" required>
		<label for="description">Description: </label>
		<input type="text" name="description" id="description" required>
		<label for="cost">Cost: </label>
		<input type="text" name="cost" id="cost" required>
		<label for="image">Image Path: </label>
		<input type="text" name="image" id="image"><br><br>
		<input type="submit" name="create_product" value="Create Product">
	</form><hr>
	
<h2>Create Order</h2>
	<form method="post">
		<label for="orders_date">Date: </label>
		<input type="text" name="orders_date" id="orders_date" required>
		<label for="product_name">Product: </label>
		<input type="text" name="product_name" id="product_name" required>
		<label for="member_id">Member ID: </label>
		<input type="text" name="member_id" id="member_id" required><br><br>
		<input type="submit" name="create_order" value="Create Order">
	</form><hr>
	
<?php include "templates/footer.php"; ?>