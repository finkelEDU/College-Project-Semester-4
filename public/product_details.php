<?php
session_start();

require "../config.php";
require "../common.php";

$product = false; 

if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $product_id = $_GET['id'];

       
        $sql = "SELECT * FROM product WHERE product_id = :product_id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':product_id', $product_id);
        $statement->execute();

       // try fetching products
        $product = $statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        error_log("Database Error: " . $error->getMessage());
    }
}


?>

<?php include "templates/header.php"; ?>

<div class="product-details-container">
    <?php if ($product):?>
        <h2><?php echo escape($product["product_name"]); ?></h2>
        <img src="<?php echo escape($product["product_image"]); ?>" alt="<?php echo escape($product["product_name"]); ?>" class="product-details-image">
        <p><?php echo escape($product["product_description"]); ?></p>
        <p class="price"><?php echo "€" . escape($product["product_cost"]); ?></p>
        <a href="products.php"><button class="btn-primary">Back to Products</button></a>

        <form method="post">
        <input class="btn-primary" type="submit" name="add" value="Add to Cart">
        </form>

    <?php else: ?>
        <p>Error, Product Unavailable</p>
        <a href="products.php"><button class="btn-primary">Back to Products</button></a>
    <?php endif; ?>
</div>

<?php
    require "../scripts/Cart.php";
    $cart = new Cart();

    if(isset($_POST["add"])){        
        if($_SESSION["Item1"] == -1){$_SESSION["Item1"] = $product_id - 1;}
        else if($_SESSION["Item2"] == -1){$_SESSION["Item2"] = $product_id - 1;}
        else if($_SESSION["Item3"] == -1){$_SESSION["Item3"] = $product_id - 1;}
        else if($_SESSION["Item4"] == -1){$_SESSION["Item4"] = $product_id - 1;}
        else if($_SESSION["Item5"] == -1){$_SESSION["Item5"] = $product_id - 1;}

        header("location:products.php");
		exit;
    }


?>

<?php include "templates/footer.php"; ?>