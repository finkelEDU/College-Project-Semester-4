<?php
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
?>

<?php include "templates/header.php"; ?>
<?php include "templates/nav.php"; ?>

<h2>Products</h2>

<?php foreach ($result as $row){ ?>
	<table>
		<tr><h3><?php echo escape($row["product_name"]) ?></tr><h3></tr>
		<tr><?php echo escape($row["product_description"]) ?></tr><br>
		<tr><?php echo "&#8364;" . escape($row["product_cost"]) ?></tr><br>
		<tr><img src=<?php echo $row["product_image"] . ">"?></tr><br>
	</table>

	<button>OK</button><hr>

<?php } ?>








<?php include "templates/footer.php";