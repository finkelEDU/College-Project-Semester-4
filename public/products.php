<?php
session_start();
    $result = [];

    try{
        require "../common.php";
        require_once "../src/DBconnect.php";

        $sql = "SELECT * FROM Product";

        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    }catch(PDOException $error){
        echo "Database Error: " . $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?>
<?php include "templates/nav.php"; ?>

<h2>Products</h2>
<p id=welcomeMSG>
<?php
if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])) {
    echo "Hello, " . $_SESSION["Username"] . ", browse our latest catalogue here!";
} else {
    echo "Welcome, browse our latest catalogue here!";
}
?>
</p>

<div class="product-container">
 
    <?php foreach ($result as $row): ?>
        <div class="product-item">
            <img src="<?php echo escape($row["product_image"]); ?>" alt="<?php echo escape($row["product_name"]); ?>">
            <h3><?php echo escape($row["product_name"]); ?></h3>
            <p><?php echo escape($row["product_description"]); ?></p>
            <p class="price"><?php echo "€" . escape($row["product_cost"]); ?></p>
            <button>View Details</button>
        </div>
    <?php endforeach; ?>
</div>

<?php include "templates/footer.php"; ?>