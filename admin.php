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
	}
?>

<?php include "templates/header_special.php"; ?>

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
		</tr>
	</thead>
	
	<tbody>
	
	<?php foreach ($result as $row){ ?>
	<tr>
		<td><?php echo escape($row["member_id"]); ?></td>
		<td><?php echo escape($row["member_username"]); ?></td>
		<td><?php echo escape($row["member_password"]); ?></td>
		<td><?php echo escape($row["member_email"]); ?></td>
		<td><?php echo escape($row["member_dob"]); ?></td>
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
	}?>

<form method="post">
	<br>
	<input type="submit" name="submit_all_members" value="Show All Members">
	<input type="submit" name="submit_all_products" value="Show All Products">
</form>

<p>
	A function to obtain a json file of data should also be created here.
</p>
	
<?php include "templates/footer.php"; ?>