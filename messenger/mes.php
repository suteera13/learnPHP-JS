<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="mes.php" mathod="get">
        <p>name</p>
        <input class="mess" type="text" name="name" placeholder="file name...">
        <p>messenger</p>
        <textarea class="mess" name="messenger" placeholder="text in file..."></textarea>
        <div>
            <input type="submit" name="submit" value="send">
            <input type="reset" name="reset" value="cancel">
        </div>
    </form>
    <div>
        <?php
            if(isset($_GET["submit"])){
                if($_GET["name"]!=""){
                    if($_GET["messenger"]!=""){
                        $_SESSION['id'] += 1;
                        // echo "name ".$_SESSION['id']." : ".$_GET["name"];
                        $fp = fopen("file.txt","a");
                        fwrite($fp, "ID :");
                        fwrite($fp, $_SESSION['id']);
                        fwrite($fp, "\nname :");
                        fwrite($fp, $_GET["name"]);
                        fwrite($fp, "\nmessenger :");
                        fwrite($fp, $_GET["messenger"]);
                        fwrite($fp, "\n");
                        fclose($fp);
                    }else{
                        echo "not messenger";
                    }
                }else{
                    echo "not name";
                }
            }else{
                $_SESSION['id'] = 0;
                echo "ID : ".$_SESSION['id'];
                $fp = fopen("file.txt","w");
                fwrite($fp, "");
                fclose($fp);
            }
        ?>
        <br>
        <?php
            if(isset($_GET["submit"])){
                if($_GET["name"]!=""){
                    $fp = fopen("file.txt", "r");
        ?>
        <textarea class="mess"><?php echo fread($fp, filesize("file.txt")); ?></textarea>
        <?php
                    fclose($fp);
                }
            }
        ?>
    </div>
</body>
</html>
<style>
    body{
        background: #eee;
        font-family: Sans-serif;
    }
    p{
        margin: 0;
    }
    form{
        margin: auto;
        padding: 20px;
        display: block;
        width: 200px;
        background: #fff;
    }
    .mess{
        margin-top: 5px;
        width: 190px;
    }
    textarea{
        height: 100px;
    }
    div{
        margin-top: 5px;
        text-align: center;
    }
</style>