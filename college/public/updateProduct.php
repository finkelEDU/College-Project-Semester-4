<?php
	require "../common.php";

	include "../models/AdminControl.php";
	$AdminControl = new AdminControl();
	
	if(isset($_POST["submit"])){
		$AdminControl->updateProduct();
	}

	if(isset($_GET["id"])){
		try{
			require_once "../src/DBconnect.php";
			
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
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST["submit"]) && $statement) : ?>
	<?php echo escape($_POST["product_username"]); ?> successfully updated.
<?php endif; ?>

<h2>Edit a user</h2>

<form method="post">
	<?php foreach ($product as $key => $value) : ?>
		<label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
		<input type="text" name="<?php echo $key; ?>" id="<?php echo $key;?>"
		value="<?php echo escape($value); ?>"
		<?php echo ($key === "product_id" ? "readonly" : null); ?>>
		<?php endforeach; ?>
		<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>