<?php 
    session_start();
    echo "ID : ".$_SESSION["user"]["user_id"]."<br>Name : "
    .$_SESSION["user"]["user_name"];
    $dem = [["Hummer", 159], ["Paper", 620], ["Scissors", 59]]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mall</title>
    <style>
        body{
            text-align: center;
            padding-top: 20px;
        }
        form{
            margin-top: 10px;
        }
        input{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- action="mall.php" -->
    <form method="post">
        <select name="selects">
            <?php foreach ($dem as $data) { ?>
                <option value="<?php echo $data[0] . "," . $data[1] ?>">
                <?php echo $data[0] . " " . $data[1] . " baht" ?>
            </option>
            <?php } ?>
        </select>
        <br>
        <input type="number" name="amount" min="1" max="10" value="1">
        <br>
        <input type="radio" name="radio" value="add">add
        <input type="radio" name="radio" value="remove">remove
        <br><input type="submit" value="pick up">
    </form>
    <a href="report.php"><input type="submit" value="buy"></a><br>
    <a href="init.php">init</a>
</body>
</html>

<?php
    if(isset($_POST['selects'])){
        $name = $_POST['selects'];
        $name .= "," . $_POST['amount'];
        $str = explode(",", $name);
        $key = array_keys($_SESSION['cart']);
        $r = array_search($str[0], $key);

        if ($_POST['radio'] == 'add') {
            $r = strval($r);
            if ($r == "") {
                $_SESSION['cart'][$str[0]] = $str;
            } else {
                $_SESSION['cart'][$str[0]][2] += $str[2];
            }
        } else {
            if (@$_SESSION['cart'][$str[0]][2] > $str[2]) {
                $_SESSION['cart'][$str[0]][2] -= $str[2];
            } else if (@$_SESSION['cart'][$str[0]][2] <= $str[2]) {
                unset($_SESSION['cart'][$str[0]]);
            }
        }
        require_once("shoppingCart.php");
        $mycart[$_SESSION["user"]["user_name"]] = new shopping($_SESSION["user"]["user_name"]);
        foreach($_SESSION['cart'] as $key ){
            $mycart[$_SESSION["user"]["user_name"]]->addItems($key[0], $key[2], $key[1]);
        }
        debug($mycart);
        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
    }
    function debug($cart){
        echo "<pre>";
        print_r($cart);
        echo "</pre>";
    }
?>