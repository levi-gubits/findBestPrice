<?php

//require_once "C:/xampp2/htdocs/Final_Project/best-price/PHP/data_base.php";
include_once __DIR__ ."/../user_module.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);


$name = $request['name'];
$email = $request['email'];
$password = $request['password'];
$session = $request['session'];

$user = new User;
$updateUserInformation = $user->updateUserInformation($name,$password,$email,$session);
$status = json_encode(Array('status' => $updateUserInformation));
echo $status;



?>