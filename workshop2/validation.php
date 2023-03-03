<script>
    function popup(text){
        window.alert(text);
    }
    function goto(url){
        window.location.href=url;
    }
</script>
<?php
    session_start();
    include_once('connect.php');
    $conn = new connect();
    $user = $_POST['name'];
    $pass = $_POST['pass'];

    if(isset($_POST['name'])){
        print_r($_POST);
        $check = $conn->checkLogin($user, $pass);
        if($check==1){
            echo "<script>popup('Registration successful.');</script>";
            $_SESSION['user'] = $_POST['name'];
            echo "<script>goto('show_info.php');</script>";
        }else{
            echo "<script>popup('Registration fail ! "
                ."This username has already been used.');</script>";
            echo "<script>goto('login.html');</script>";
        }
    }else{
        echo "<script>goto('login.html');</script>";
    }
?>
<!-- wrong password -->