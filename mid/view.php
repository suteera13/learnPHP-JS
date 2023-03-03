<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin: auto;
            width: 250px;
        }
        form{
            margin: auto;
            display: block;
            width: 200px;
            padding: 10px;
        }
        h2{
            padding-left: 60px;
        }
        input{
            margin-top: 10px;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        $show = "show";
        include 'control.php';
        echo "<table border='1'>";
        foreach($product_list as $p){
            echo "<tr>";
            echo "<td>".$p["product_id"]."</td>";
            echo "<td>".$p["product_name"]."</td>";
            echo "<td>".$p["price"]."</td>";
            echo "<td>".$p["qty"]."</td>";
            echo "<td><a href=view.php?edit=".$p["product_id"].">edit</a></td>";
            echo "<td><a href=view.php?id=".$p["product_id"].">del</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        if(isset($_GET['edit'])==false){
    ?>
    <form action="control.php" method="post">
        <h2>insert</h2>
        Product ID : 
        <input type="text" name="product_id" placeholder="ใส่เลขไม่เกิน 6 หลัก">
        Product Name : 
        <input type="text" name="product_name" placeholder="ชื่อสินค้า">
        Price : 
        <input type="text" name="price" placeholder="ราคา">
        Qty : 
        <input type="text" name="qty" placeholder="จำนวน(ลัง)">
        <input type="submit" name="save" value="save">
        <input type="reset" value="reset">
    </form>
    <?php
        }else{
            echo "<pre>";
            print_r($GLOBALS);
            echo "</pre>";
    ?>
    <form action="control.php" method="post">
        <h2>Update</h2>
        Product ID : 
        <input type="text" name="product_id" Value="<?= $p["product_id"] ?>" readonly>
        Product Name : 
        <input type="text" name="product_name" Value="<?= $p["product_name"] ?>">
        Price : 
        <input type="text" name="price" Value="<?= $p["price"] ?>">
        Qty : 
        <input type="text" name="qty" Value="<?= $p["qty"] ?>">
        <input type="submit" name="update" value="update">
        <input type="reset" value="reset">
    </form>
    <?php
        }
    ?>
</body>
</html>