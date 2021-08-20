<?php
include_once __DIR__ ."/../../../data_base.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$searchValue = $request['searchValue'];

$productsDetails =  Database::query("SELECT * FROM `products` WHERE name LIKE '$searchValue%' OR name LIKE '%$searchValue' OR name LIKE '%$searchValue%'");

for($i = 0; $i < count($productsDetails); $i++){
    $result[$i] = Array('id' => $productsDetails[$i]['id'], 'name' => $productsDetails[$i]['name'], 'image' => $productsDetails[$i]['image']);
}

if(!$productsDetails){
    $result = Array('error' => 'Sorry we did not find the product you are looking for');
}

echo json_encode($result);

?>