<?php
    class ShoppingCart
    {
        private $name; // Name of shopper
        private $items; // Items in our shopping cart

        public function ShoppingCart($inputname)
        {
            $this->name = $inputname;
        }

        // Add $num articles of $artnr to the cart
        public function addItem($artnr, $num,$price)
        {
            @$this->items[$artnr][0] = $artnr;
            @$this->items[$artnr][1] += $num;
            @$this->items[$artnr][2] += $num*$price;
        }

        // Take $num articles of $artnr out of the cart
        public function removeItem($artnr, $num)
        {
            if ($this->items[$artnr] > $num) {
                $this->items[$artnr] -= $num;
                return true;
            } elseif ($this->items[$artnr] == $num) {
                unset($this->items[$artnr]);
                return true;
            } else {
                return false;
            }
        }
    }
?>