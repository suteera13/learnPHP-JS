<?php
    if(isset($_POST['upload'])){
        echo "<script>goback();</script>";
    }
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

</body>
</html>
<script>
    function goback(){
        setTimeout(()=>{  window.location.href='upload.html';}, 2000)
    }
</script>
<?php
    if(isset($_POST['upload']) == false){
        echo "<h1>Redirect to 'upload.html'</h1>";
        echo "<script>goback();</script>";
    }else{
        echo "<pre>";
        print_r($_POST);
        print_r($_FILES);
        echo "</pre>";
        echo "<hr>";
        if(!empty($_FILES['FileUpload']['name'])){
            $csv = fopen($_FILES['FileUpload']['tmp_name'], 'r');
            while(($data = fgetcsv($csv, 100, ',')) != FALSE){
                print_r($data);
                echo "<br>";
                for($i = 0; $i < count($data); $i++){
                    echo $data[$i]." : ";
                }
                echo ($data[4]<150000?"ไม่มีภาษี":CalTax($data[4]));
                echo "<br><br><hr>";
            }
            fclose($csv);
        }
    }
    function CalTax($salary){
        if($salary<300001){
            $tax = $salary-150000/100*5;
            echo "(5%) ";
        }
        elseif($salary<500001){
            $tax = ($salary-300000)/100*10+7500;
            echo "(10%) ";
        }
        elseif($salary<750001){
            $tax = ($salary-500000)/100*15+27500;
            echo "(15%) ";
        }
        elseif($salary<1000001){
            $tax = ($salary-750000)/100*20+65000;
            echo "(20%) ";
        }
        elseif($salary<2000001){
            $tax = ($salary-1000000)/100*25+115000;
            echo "(25%) ";
        }
        elseif($salary<5000001){
            $tax = ($salary-2000000)/100*30+365000;
            echo "(30%) ";
        }else{
            $tax = ($salary-5000000)/100*35+1265000;
            echo "(35%) ";
        }
        return "เสียภาษี ".$tax." บาท";
    }
?>