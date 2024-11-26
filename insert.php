<?php
include("cnnection.php");
header('Content-Type: application/json');

$congin = new Config();
$conn_res = $congin->connect();
$name = $_POST['name'];
$train_name = $_POST['train_name'];
$train_number = $_POST['train_number'];
$plat_number = $_POST['plat_number'];
$arr = array();

if ($name != null && $train_name != null && $train_number != null && $train_number != null && $plat_number != null) {
    if ($conn_res) {
        $sql = "INSERT INTO `ticket`( `name`, `train_name`, `train_number`, `plat_number`) VALUES ('$name','$train_name ','$train_number','$plat_number ')";
        $response = mysqli_query($conn_res, $sql);
        if ($response) {
            $arr = array("status_code" => "200", "message" => "Data Update Successfully", "is_success" => "true");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(200);
        } else {
            $arr = array("status_code" => "500", "message" => "Data Update Failed", "is_success" => "false");
            echo json_encode($arr, JSON_PRETTY_PRINT);
            http_response_code(500);
        }
    } else {
        $arr = array("status_code" => "500", "message" => "Connection Failed", "is_success" => "false");
        echo json_encode($arr, JSON_PRETTY_PRINT);
        http_response_code(500);
    }
} else {
    $arr = array("status_code" => "400", "message" => "Id and Name are must be required", "is_success" => "false");
    echo json_encode($arr, JSON_PRETTY_PRINT);
    http_response_code(400);
}
