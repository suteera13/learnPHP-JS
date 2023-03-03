<?php
    session_start();
    if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align: center;">Username : <?= $_SESSION['user']; ?></h1>
    <a style="text-align: center;" href="login.html">logout</a>
</body>
</html>
<?php
    }else{
?>
<script>window.location.href="login.html";</script>
<?php
    }
?>