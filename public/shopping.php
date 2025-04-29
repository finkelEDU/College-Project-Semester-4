<?php
session_start();

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

<div class="product-container">
    <?php foreach ($result as $row): ?>
        <?php
            if(     $row["product_id"] == $_SESSION["Item1"] 
                ||  $row["product_id"] == $_SESSION["Item2"]
                ||  $row["product_id"] == $_SESSION["Item3"] 
                ||  $row["product_id"] == $_SESSION["Item4"] 
                ||  $row["product_id"] == $_SESSION["Item5"]
            ){
        ?>
        
        <div class="product-item">
            <img src="<?php echo escape($row["product_image"]); ?>" alt="<?php echo escape($row["product_name"]); ?>">
            <h3><?php echo escape($row["product_name"]); ?></h3>
            <p class="price"><?php echo "€" . escape($row["product_cost"]); ?></p>
            <a href="product_details.php?id=<?php echo escape($row["product_id"]); ?>">
            </a>
        </div> <?php } ?>
    <?php endforeach; ?>

    <form method="post">
        <input class="btn-primary" type="submit" name="buy" value="BUY ITEMS">
    </form>
</div>

<?php
    if(isset($_POST["buy"])){
        echo "Work on order is not finished yet.";
    }
?>


<?php include "templates/footer.php"; ?>