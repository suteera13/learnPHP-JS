<?php
    session_start();
?>
<script>
    function goto(url){
        setTimeout(()=>{
            window.location.herf=url;
        },2000)
    }
</script>
<?php
    require_once 'model.php';
    $pd = new product();
    if(isset($show)){
        $product_list = $pd->product_list();
    }
    if(isset($_POST["save"])){
        $id = $_POST["product_id"];
        $name = $_POST["product_name"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $pd->insert($id, $name, $price, $qty);
        echo "<script>goto('view.php')</script>";
    }
    elseif(isset($_GET["edit"])){
        $pd->getProductbyID($_GET["edit"]);
        echo "<pre>".print_r($_POST)."</pre>";
    }
    elseif(isset($_POST["update"])){
        print_r($_POST);
        $id = $_POST["product_id"];
        $name = $_POST["product_name"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $pd->update($id, $name, $price, $qty);
        echo "<script>goto('view.php')</script>";
    }
    elseif(isset($_GET['id'])){
        $pd->delete($_GET['id']);
        echo "<script>goto('view.php')</script>";
    }
    $pd->closeConnect();
?>