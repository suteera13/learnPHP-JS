<?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    switch($requestMethod){
        case 'POST':    echo json_encode("POST Method");    break;
        case 'GET':     echo json_encode("GET Method");     break;
        case 'PUT':     echo json_encode("PUT Method");     break;
        case 'DELETE':  echo json_encode("DELETE Method");  break;
        default: echo json_encode("Unsupport Method");
    }
?>