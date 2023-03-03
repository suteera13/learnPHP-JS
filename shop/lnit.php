<?php
session_start();
$_SESSION['cart'] = [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    

    .card {
        padding: 15px;
        width: 600px;
        display: block;
        margin: auto;
        border-radius: 10px;
    }
</style>

<body>
    <div class="card">
        
        <form action="Mall.php" id="form" method="get">
            <input type="text" name="username" id="users" placeholder="Username" required>
            <input type="password" name="password" id="" placeholder="Password" required>
            <button class="btn" id="btn" type="submit">เข้าสู่ระบบ</button>
        </form>
    </div>
</body>
</html>