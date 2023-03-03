<?php
    class ShoppingCart{
        private $name;
        private $items;
        public function __construct($name="N/A"){
            $this->name = $name;
        }
        public function addItem($ItemName, $qty){
            if(isset($this->items[$ItemName])){
                $this->items[$ItemName]+=$qty;
            }else{
                $this->items[$ItemName]=$qty;
            }
        }
        public function removeItem($ItemName, $qty){
            if($this->items[$ItemName] > $qty){
                $this->items[$ItemName] -= $qty;
                return true;
            }elseif($this->items[$ItemName] == $qty){
                unset($this->items[$ItemName]);
                return true;
            }else{
                echo "Error<br>";
                return false;
            }
        }
    }
?>