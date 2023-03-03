<pre>
    <?php
        print_r($GLOBALS);
    ?>
</pre>
<?php
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])){
        $check = getimagessize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
            echo "file is an image - ".$check["mime"].".<br>";
            $uploadOk = 1;
        }else{
            echo "file is not an image.<br>";
            $uploadOk = 0;
        }
    }
    if(file_exists($target_file)){
        echo "Sorry, file already exits.<br>";
        $uploadOk = 0;
    }
    if($_FILES["fileToUpload"]["size"] > 1048567){
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png"){
        echo "Sorry, only JPG & PNG files are allowed.<br>";
        $uploadOk = 0;
    }
    if($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    }else{
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
            echo "Success: upload completed<br>";
            echo "The file "
            .htmlspecialchars(basename($_FILES["fileToUpload"]["name"]))
            ." has been uploaded to server.";
        }else{
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
?>