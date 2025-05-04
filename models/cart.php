<?php
class Cart {
    private $items = [];
        // gathering all the items in the cart
        public function __construct() {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $this->items = $_SESSION['cart'];
        }
        //save cart items to sesjion 
        private function save() {
            $_SESSION['cart'] = $this->items;
        }

    //for the icon in header
    public function getItemCount() {
        return array_sum($this->items);
    }
    
    //adds item to the cart, if already there, increase quantity
    public function addToCart($productId, $itemQuantity = 1) {
        if (isset($this->items[$productId])) {
            $this->items[$productId] += $itemQuantity;
        } else {
            $this->items[$productId] = $itemQuantity;
        }
        $this->save();
        return true;
    }

    public function removeFromCart($productId) {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
            $this->save();
            return true;
        }
        return false;
    }
    public function getItems() {
        return $this->items;
    }
}