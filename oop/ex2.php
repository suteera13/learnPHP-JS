<?php
    require_once("class.Cart.php");
    $cart = new ShoppingCart("My");
    $itemName = "SmartTV 50 inch";
    $itemName2 = "SmartTV 40 inch";
    $cart->addItem($itemName, 2);
    debug($cart);
?>
<?php
    $cart->addItem($itemName, 3);
    debug($cart);
    $cart->addItem($itemName2, 3);
    debug($cart);
    $cart->removeItem($itemName, 3);
    debug($cart);
    $cart->removeItem($itemName, 3);
    debug($cart);
    $cart->removeItem($itemName, 2);
    debug($cart);
?>
<?php
    function debug($cart){
        echo "<pre>";
        print_r($cart);
        echo "</pre>";
    }
?>