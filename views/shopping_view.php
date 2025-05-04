<?php include "../public/templates/header.php"; ?>

<div class="product-container">
    <?php
        $cart_empty = empty($viewData['cart_items']);
    
        if (!$cart_empty) {
            foreach ($viewData['cart_items'] as $productId => $quantity):
                // check product exists
                if (isset($viewData['products_by_id'][$productId])):
                    $productInfo = $viewData['products_by_id'][$productId];
                    $item_cost = $productInfo['product_cost'];
                    $subtotal = $item_cost * $quantity;
    ?>
        
        <div class="product-item">
            <img src="<?= escape($productInfo["product_image"]); ?>" alt="<?= escape($productInfo["product_name"]); ?>">
            <h3><?= escape($productInfo["product_name"]); ?></h3>
            <p>Quantity: <?= escape($quantity); ?></p>
            <p class="price">Unit Price: €<?= escape($item_cost); ?></p>
            <p>Subtotal: €<?= escape(number_format($subtotal, 2)); ?></p>
            <a href="index.php?page=product_details&id=<?= escape($productInfo["product_id"]); ?>">
                <button class="btn-primary">View Details</button>
            </a>
            <a href="index.php?page=cart_remove&id=<?php echo escape($productInfo["product_id"]); ?>">
                <button class="btn-primary">Remove</button>
            </a>
        </div>
    <?php
                endif; 
            endforeach; 
        } 

        if ($cart_empty) {
            echo "<p>Your shopping cart is empty.</p>";
        }
    ?>
</div>

<?php //shows the total if the cart isnt empty ?>
<?php if (!$cart_empty): ?>
    <div style="text-align: center; margin-top: 20px;">
        <h3>Total Order Cost: €<?= escape(number_format($viewData['total_cost'], 2)); ?></h3>
        <form method="post">
            <input class="btn-primary" type="submit" name="buy" value="Purchase Items">
        </form>
    </div>
<?php endif; ?>

<?php //if user  logged in, show order history btn ?>
<?php if (isset($_SESSION["UserID"])): ?>
    <div style="text-align: center;">
        <a href="index.php?page=order_history">
            <button class="btn-primary">View Order History</button>
        </a>
    </div>
<?php endif; ?>

<?php include "../public/templates/footer.php"; ?>