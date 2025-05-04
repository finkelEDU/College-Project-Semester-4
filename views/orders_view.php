<?php include "../public/templates/header.php"; ?>

<h2>My Order History</h2>

<?php if (empty($orders)): ?>
    <p>You have not placed any orders yet.</p>
<?php else: ?>
    <table class="order-history-table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                <td><?= escape($order['orders_id']); ?></td>
                <td><?= escape(date('Y-m-d', strtotime($order['orders_date']))); ?></td>
                <td><?= escape($order['product_name']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<div class="order-history-actions">
    <a href="index.php?page=shopping_cart"><button class="btn-primary">Back to Cart</button></a>
</div>

<?php include "../public/templates/footer.php"; ?>