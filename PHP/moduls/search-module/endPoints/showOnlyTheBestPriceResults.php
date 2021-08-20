<?php

include_once __DIR__ ."/../../../data_base.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$proID = $request['proID'];

$result = Database::query("SELECT * FROM `products_stores` WHERE proId = $proID 
ORDER BY `products_stores`.`price` LIMIT 1");

$price = $result[0]['price'];
$storeID = $result[0]['stor_id'];
$link = $result[0]['link'];
$image = Database::query("SELECT logo FROM `stores` WHERE id = $storeID");
$logo = $image[0]['logo'];

$array[0] = Array("proId" => $proID, "price" => $price, "logo" => $logo, "link" => $link);

echo json_encode($array[0]);

?>