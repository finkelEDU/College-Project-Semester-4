<?php include "templates/header.php"; ?>

<div class="product-details-container">
    <?php if ($result): ?>
        <h2><?php echo escape($result["product_name"]); ?></h2>
        <img src="<?php echo escape($result["product_image"]); ?>" alt="<?php echo escape($result["product_name"]); ?>" class="product-details-image">
        <p><?php echo escape($result["product_description"]); ?></p>
        <p class="price"><?php echo "€" . escape($result["product_cost"]); ?></p>
        <a href="index.php?page=products"><button class="btn-primary">Back to Products</button></a>

        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo escape($result["product_id"]); ?>">
            <input class="btn-primary" type="submit" name="add" value="Add to Cart">
        </form>

    <?php else: ?>
        <p>Error, Product Unavailable</p>
        <a href="index.php?page=products"><button class="btn-primary">Back to Products</button></a>
    <?php endif; ?>
</div>

<?php include "templates/footer.php"; ?>