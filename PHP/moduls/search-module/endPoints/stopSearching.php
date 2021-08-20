<?php

include_once __DIR__ ."/../../../data_base.php";
include_once __DIR__ ."/../../notifications-module/sending_module.php";


header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

if(isset($request)){
    $proID = $request['proID'];
    $userID = $request['userID'];
}

if(isset($_GET['proID'])){
    $proID = $_GET['proID'];
    $userID = $_GET['userID'];
}

$sending = new Sending;
$sending->deleteSearchingRequest($userID,$proID);
$sending->deleteSendingRowFromTable($userID,$proID);
header('Location: http://findbestprice.net/?page=priceUpdate');



?>