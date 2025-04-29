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


<div class="product-container">
    <?php
        //Initalize $cost variable to use
        $cost = 0;
    ?>

    <?php foreach ($result as $row): ?>
        <?php

            //Check to see if any of the added products match the product_id, display if true
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
                
            <?php 
                //Add the cost of the item in foreach loop to $cost variable
                $cost += $row["product_cost"];
            ?>
        </div> <?php } ?>
    <?php endforeach; ?>

    <?php
        //Display the total cost of the items
        echo "<p>The total cost for this order will be: €" . $cost;
    ?>

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