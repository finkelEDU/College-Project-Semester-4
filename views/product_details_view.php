<?php include "templates/header.php"; ?>

<div class="product-details-container">
    <?php if ($product): ?>
        <h2><?= escape($product->productName) ?></h2>
        <img src="<?= escape($product->productImage) ?>" alt="<?= escape($product->productName) ?>">
        <p><?= escape($product->productDescription) ?></p> 
        <p class="price"><?= escape(number_format($product->productCost, 2)) ?></p>
        <a href="index.php?page=products"><button class="btn-primary">Back to Products</button></a>

        <form method="post" action="index.php?page=product_details&id=<?= escape($product->productID) ?>">
            <input type="hidden" name="product_id_hidden" value="<?= escape($product->productID) ?>">
            <input class="btn-primary" type="submit" name="add" value="Add to Cart">
        </form>

    <?php else: ?>
        <p>Product Unavailable</p>
        <a href="index.php?page=products"><button class="btn-primary">Back to Products</button></a>
    <?php endif; ?>
</div>

<?php include "templates/footer.php"; ?>