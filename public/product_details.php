<?php
session_start();

require "../config.php";
require "../common.php";

if (isset($_POST["add"]) && isset($_POST['product_id'])) {
    $product_id_to_add = $_POST['product_id']; //gets id from current product page


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    //checks if item is already in cart
    if (isset($_SESSION['cart'][$product_id_to_add])) {
        //adds to quantity
        $_SESSION['cart'][$product_id_to_add]++;
    } else {
        //add 1 new item
        $_SESSION['cart'][$product_id_to_add] = 1;
    }

    header("location: products.php");
    exit;
}

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
        <input type="hidden" name="product_id" value="<?php echo escape($product["product_id"]); ?>">
        <input class="btn-primary" type="submit" name="add" value="Add to Cart">
        </form>

    <?php else: ?>
        <p>Error, Product Unavailable</p>
        <a href="products.php"><button class="btn-primary">Back to Products</button></a>
    <?php endif; ?>
</div>


<?php include "templates/footer.php"; ?>