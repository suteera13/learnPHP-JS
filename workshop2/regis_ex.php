<script>
    function popup(text){
        window.alert(text);
    }
    function goto(url){
        window.location.href=url;
    }
</script>
<?php
    include_once('connect.php');
    $conn = new connect();
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if(isset($_POST['name'])){
        print_r($_POST);
        if($pass!=$cpass){
            echo "<script>popup('Please reconfirm your password.');</script>";
            echo "<script>goto('register.html');</script>";
        }else{
            $mes = $conn->insert($user, $pass);
            echo "<script>popup('".$mes."');</script>";
            echo "<script>goto('login.html');</script>";
        }
    }
?>