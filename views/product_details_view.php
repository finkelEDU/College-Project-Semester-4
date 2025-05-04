<?php include "templates/header.php"; ?>

<div class="product-details-container">
    <?php if ($product): ?>
        <h2><?= escape($product->productName) ?></h2>
        <img class="product-details-image" src="<?= escape($product->productImage) ?>" alt="<?= escape($product->productName) ?>">
        <p><?= escape($product->productDescription) ?></p> 
        <p class="price">€<?= escape($product->productCost) ?></p>
        <a href="index.php?page=products"><button class="btn-primary">Back to Products</button></a>
        <?php if (isset($_SESSION["UserID"])):?>
        <form method="post" action="index.php?page=cart_add">
            <input type="hidden" name="product_id_hidden" value="<?= escape($product->productID) ?>">
            <input class="btn-primary" type="submit" name="add" value="Add to Cart">
        </form>
    <?php else: ?>
        <p class='loginPlease'>Please log in to add items to the cart.</p>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php include "templates/footer.php"; ?>