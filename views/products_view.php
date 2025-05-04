<?php include "templates/header.php"; ?>

<?php //success message if ordered, or a welcomer msg?>
<?php if (isset($_GET['order']) && $_GET['order'] === 'success'): ?>
    <p id="welcomeMSG" style="color: lightgreen; border-color: lightgreen;">Thank you for your order!</p>
<?php else: ?>
<p id=welcomeMSG>
<?php //if user logged in, show username?>
<?php if (isset($_SESSION["Username"]) && !empty($_SESSION["Username"])): ?>
    Hello, <?= escape($_SESSION["Username"]) ?>, browse our latest catalogue here!
<?php else: ?>
    Welcome, browse our latest catalogue here!
 <?php endif; ?>
</p>
<?php endif; ?>

<div class="product-container">

    <?php foreach ($products as $product): ?>
        <div class="product-item">
            <img class="product-details-image" src="<?= escape($product->productImage) ?>" alt="<?= escape($product->productName) ?>">
            <h3><?= escape($product->productName) ?></h3>
            <p><?= escape($product->productDescription) ?></p>
            <p class="price"><?= "€" . escape($product->productCost) ?></p>
            <a href="index.php?page=product_details&id=<?= escape($product->productID) ?>">
            <button class="btn-primary">View Details</button>
            </a>
        </div>
    <?php endforeach; ?>
</div>


<?php include "templates/footer.php"; ?>