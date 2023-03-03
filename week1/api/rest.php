<?php
    include_once '../model/customer.php';
    $cus = new customer();
    if($_SERVER["REQUEST_METHOD"]=='POST'){
        $data = file_get_contents("php://input");
        $cus_data = json_decode($data, true);
        print_r($cus_data);
        if($cus->addcustomer($cus_data)){
            echo json_encode(["status"=>"ok", "message"=>"insert {$cus_data['cus_name']} completed"]);
        }else{
            echo json_encode(["status"=>"error", "message"=>"error something wrong"]);
        }
    }
    else if($_SERVER["REQUEST_METHOD"]=='GET'){
        echo json_encode($cus->getall());
    }
?>