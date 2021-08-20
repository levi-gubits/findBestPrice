<?php

include_once __DIR__ ."/../../../data_base.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$proID = $request['proID'];

$result = Database::query("SELECT * FROM `products_stores` WHERE proId = $proID 
ORDER BY `products_stores`.`price`");
$resultPrice = $result[0]['price'];


for($i = 0; $i < count($result); $i++){
    $storeID = $result[$i]['stor_id'];
    $image = Database::query("SELECT logo FROM `stores` WHERE id = $storeID");
    $array[$i] = Array("proId" => $proID, "price" => $result[$i]['price'], "link" => $result[$i]['link'], "logo" => $image[0]['logo']);
} 
    
echo json_encode($array);


?>