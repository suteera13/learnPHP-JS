<?php
    require_once('classPerson.php');
    // require('classPerson.php');
    // include_once('classPerson.php');
    // include('classPerson.php');
    $a = new Person("Suteera");
    // private
    // $a->setName("Suteera");
    // public
    // $a->name = "Suteera";
    // echo "name : ".$a->name;
    echo "name : ".$a->getName();
    echo "<br>";
    $a->print();
    $b = new Person("Sunakorn");
?>

<pre>
    <?php var_dump($GLOBALS); ?>
</pre>