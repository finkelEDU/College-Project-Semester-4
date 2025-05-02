<?php
class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }
    //adds ore increments
    public function add(int $id): void {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
    public function all(): array {
        return $_SESSION['cart'];
    }
    public function isEmpty(): bool {
        return empty($_SESSION['cart']);
    }
}