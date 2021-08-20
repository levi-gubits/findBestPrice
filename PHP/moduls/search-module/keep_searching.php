<?php

require_once __DIR__ ."/../../data_base.php";

    $userID = $_GET['user'];
    $proID = $_GET['proid'];
    $price = $_GET['price'];

    $result = Database::query("SELECT * FROM products_users WHERE userId = $userID AND proId = $proID");

    if(!$result){
        $result = Database::command("INSERT INTO `products_users`(`userId`, `proId`, `price`) 
        VALUES ('$userID','$proID','$price')");

        $result = Database::query("SELECT * FROM searching WHERE proId = $proID");
        if(!$result){
            $result = Database::command("INSERT INTO `searching`(`proId`) VALUES ('$proID')");
        }
        
    }

    header("Location: http://findbestprice.net/?page=priceUpdate");

?>