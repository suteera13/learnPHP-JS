<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();
$_SESSION['username'] = $_GET['username'];
$_SESSION['password'] = $_GET['password'];
$dem = [["COM", 500], ["MOUSE", 250], ["KEYBOARD", 125]]
?>

<body>
<p><?php echo "คุณ ".$_SESSION['username']." รหัส ".$_SESSION['password']  ?></p>
                <form action="" method="post">
                    <select name="dems" id="">
                        <?php foreach ($dem as $data) { ?>
                            <option value="<?php echo $data[0] . "," . $data[1] ?>"><?php echo $data[0] . " ราคา " . $data[1] . " บาท" ?></option>
                        <?php } ?>
                    </select>
                    <input class="num" type="number" name="item" id="" required autocomplete="off">
                    <input type="radio" name="dr" id="" checked value="add"> add
                    <input type="radio" name="dr" id="" value="remove"> remove
                        <button type="submit">OK</button>
                        <button type="reset">RESET</button>
                    
                </form>
                <a href="Report.php" class="su">สรุปยอด</a>
            
            <div class="card-item">
                <?php
                if (isset($_POST['dems'])) {
                    $tr = $_POST['dems'];
                    $tr .= "," . $_POST['item'];
                    $str = explode(",", $tr);
                    $key = array_keys($_SESSION['cart']);
                    $r = array_search($str[0], $key);

                    if ($_POST['dr'] == 'add') {
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
                }
                include_once "ShoppingCart.php";
                $mycart[$_SESSION['username']] = new ShoppingCart($_SESSION['username']);
                foreach ($_SESSION['cart'] as $data) {
                    $mycart[$_SESSION['username']]->addItem($data[0], $data[2], $data[1]);
                }
                echo "<pre>";
                print_r($mycart);
                echo "</pre>";
                ?>
</body>


</html>