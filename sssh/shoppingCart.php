<?php
    class shopping{
        private $name;
        private $items;
        public function __construct($name){
            $this->name = $name;
        }
        public function addItems($itemName,$amount,$price){
            @$this->items[$itemName][0] = $itemName;
            @$this->items[$itemName][1] += $amount;
            @$this->items[$itemName][2] += $amount*$price;
        }
        public function removeItems($itemName,$amount){
            if($this->items[$itemName] > $amount){
                @$this->items[$itemName][1] -= $amount;
                return true;
            }elseif($this->items[$itemName] == $amount){
                unset($this->items[$itemName]);
                return true;
            }else{
                echo "Error<br>";
                return false;
            }
        }
    }
?>