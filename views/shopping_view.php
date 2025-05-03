<?php include "../public/templates/header.php"; ?>

<div class="product-container">
    <?php
        //Initalize $cost variable to use
        $total_cost = 0;
        $cart_empty = true;
    
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart_empty = false;
            foreach ($_SESSION['cart'] as $product_id => $quantity):
                // check product exists
                if (isset($products_by_id[$product_id])):
                    $item = $products_by_id[$product_id];
                    $item_cost = $item['product_cost'];
                    $subtotal = $item_cost * $quantity;
                    $total_cost += $subtotal;
    ?>
        
        <div class="product-item">
            <img src="<?php echo escape($item["product_image"]); ?>" alt="<?php echo escape($item["product_name"]); ?>">
            <h3><?php echo escape($item["product_name"]); ?></h3>
            <p>Quantity: <?php echo escape($quantity); ?></p>
            <p class="price">Unit Price: €<?php echo escape($item_cost); ?></p>
            <p>Subtotal: €<?php echo escape(number_format($subtotal, 2)); ?></p>
            <a href="index.php?page=product_details&id=<?php echo escape($item["product_id"]); ?>">
                <button class="btn-primary">View Details</button>
            </a>
        </div>
    <?php
                endif; // end check if product exists
            endforeach; // end cart loop
        } 

        if ($cart_empty) {
            echo "<p>Your shopping cart is empty.</p>";
        }
    ?>
</div>

<?php if (!$cart_empty): ?>
    <div style="text-align: center; margin-top: 20px;">
        <h3>Total Order Cost: €<?php echo escape(number_format($total_cost, 2)); ?></h3>
        <form method="post">
            <input class="btn-primary" type="submit" name="buy" value="BUY ITEMS">
        </form>
    </div>
<?php endif; ?>

<?php include "../public/templates/footer.php"; ?>