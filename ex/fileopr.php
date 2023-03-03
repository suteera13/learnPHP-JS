<?php
if(isset($_GET["mode"])){
    // ลบข้อมูล แล้วเขียน
    if($_GET["mode"]=="w"){
        echo "Append Mode<br>";
        $fp = fopen("data.txt","w");
        fwrite($fp, "hello");
        fwrite($fp, "php\n");
        fclose($fp);
        echo "File written successfully";
    }
    // เขียนต่อท้าย
    else if($_GET["mode"]=="a"){
        echo "Append Mode<br>";
        $fp = fopen("data.txt","a");
        fwrite($fp, "append Data to");
        fwrite($fp, "php file\n");
        fclose($fp);
        echo "File written successfully";
    }
    // อ่าน
    else if($_GET["mode"]=="r"){
        $fp = fopen("data.txt", "r");
        echo "<pre>";
        echo fread($fp, filesize("data.txt"));
        echo "</pre>";
        fclose($fp);
    }
    // อ่านแบบลูปทีละบรรทัด
    else if($_GET["mode"]=="all"){
        $fp = fopen("data.txt", "r");
        echo "<pre>";
        while(!feof($fp)){
            echo fgets($fp)."<br>";
        }
        echo "</pre>";
        fclose($fp);
    }
}
?>