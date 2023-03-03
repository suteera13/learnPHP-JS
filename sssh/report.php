<?php 
    session_start();
    echo "ID : ".$_SESSION["user"]["user_id"]."<br>Name : "
    .$_SESSION["user"]["user_name"];
?>
<br><a href="mall.php">mall</a>

<table width="500" border="1">
    <tr>
        <th width="100">สินค้า</th><th width="100">จำนวน</th><th width="100">ราคา</th>
    </tr>
    <?php
        $pay = 0;
        foreach($_SESSION['cart'] as $value){
            echo "<tr><th>".$value[0]."</th><th>".$value[2]
            ."</th><th>".$value[1]."</th></tr>";
            $pay += $value[1];
        }
        echo "<tr><th>".""."</th><th>".""."</th><th>".$pay."</th></tr>";
    ?>
</table>
<?php
    function debug($cart){
        echo "<pre>";
        print_r($cart);
        echo "</pre>";
    }
?>
<style>
    body{
        text-align: center;
    }
    table{
        margin: auto;
        margin-top: 20px;
    }
</style>