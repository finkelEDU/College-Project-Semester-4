<?php include "templates/header.php"; ?>

<p id=welcomeMSG>
<?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
    Hello, <?= escape($_SESSION["Username"]) ?>, browse our latest catalogue here!
<?php else: ?>
    Welcome, browse our latest catalogue here!;
 <?php endif; ?>
</p>

<div class="product-container">
    <?php foreach ($result as $row): ?>
        <div class="product-item">
            <img src="<?php echo escape($row["product_image"]); ?>" alt="<?php echo escape($row["product_name"]); ?>">
            <h3><?php echo escape($row["product_name"]); ?></h3>
            <p><?php echo escape($row["product_description"]); ?></p>
            <p class="price"><?php echo "€" . escape($row["product_cost"]); ?></p>
            <a href="index.php?page=product_details&id=<?php echo escape($row["product_id"]); ?>">
            <button class="btn-primary">View Details</button>
            </a>
        </div>
    <?php endforeach; ?>
</div>


<?php include "templates/footer.php"; ?>