<script>
    getShow = document.getElementById('getShow').innerHTML
</script>
<?php
    include_once 'model.sensor.php';
    $up = new model();
    if(isset($_GET['pm25'])){
        $pm25 = $_GET['pm25'];
        $location = $_GET['id'];

        echo json_encode($pm25,$location);
        $up->insert($pm25,$location);
    }
    else if(isset($_GET['locat'])){
        $locat = $_GET['locat'];
        $show = $up->showPM($locat);
        $getShow = $show[0]['sensor'];
        echo json_encode($getShow);
    } 
?>
<p id="getShow"><?= $getShow ?></p>