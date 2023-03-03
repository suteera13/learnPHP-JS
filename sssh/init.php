<?php 
    session_start();
    $_SESSION=[];
    $_SESSION['user'] = ["user_id"=>"321","user_name"=>"suteera"];
    $_SESSION['cart'] = [];
?>
<a href="mall.php">
    <input type="submit" value="login">
</a>
<style>
    body{
        text-align: center;
        padding-top: 20px;
    }
</style>