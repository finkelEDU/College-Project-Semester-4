<?php
session_start();
require_once __DIR__ . '/../models/Cart.php'; // __dir__ to get correct path for light testing in terminal
//tests adding to cart.
echo "Testing Cart...\n";
$_SESSION['cart'] = [];
$cart = new Cart();

$cart->addToCart(1, 2);
$items = $cart->getItems();
if (isset($items[1]) && $items[1] === 2) {
    echo "addToCart test passed\n";
} else {
    echo "addToCart test failed\n";
}

$cart->removeFromCart(1);
$itemsAfterRemove = $cart->getItems();
if (!isset($itemsAfterRemove[1])) {
    echo "removeFromCart test passed\n";
} else {
    echo "removeFromCart test failed\n";
    print_r($itemsAfterRemove); 
}
?>
