<?php

include_once __DIR__ ."/../../../data_base.php";
include_once __DIR__ ."/../search_module.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$userID = $request['userID'];
$proID = $request['proID'];
$price = $request['price'];



function addNewRequest($userID,$proID,$price){
    
    $CheckIfProductInSearch =  Database::query("SELECT proId FROM `searching` WHERE proId = '$proID'");
    
    if(!$CheckIfProductInSearch){
        $createNewSearch = Database::command("INSERT INTO `searching`(`proId`) VALUES ('$proID')");
    }

    $checkIfUserWasSearchingThisProduct = Database::query("SELECT * FROM `products_users` WHERE userId = '$userID' AND proId = '$proID'");

    if($checkIfUserWasSearchingThisProduct){
        $updatePrice = Database::update("UPDATE `products_users` SET `price` = $price WHERE userId = '$userID' AND proId = '$proID'");
    }else{
        $createNewRequest = Database::command("INSERT INTO `products_users`(`userId`, `proId`, `price`) 
        VALUES ('$userID','$proID','$price')");
    }
    
}

$search = New Searching;

if($price != 0){
    addNewRequest($userID,$proID,$price);
    $search->getProduct($proID);
    $search->ChecksWhoTheUser($proID);
}else{
    $search->getProduct($proID);
}



    
?>