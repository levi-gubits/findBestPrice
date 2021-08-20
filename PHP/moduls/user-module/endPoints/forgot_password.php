<?php

include_once __DIR__ ."/../user_module.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$email = $request['email'];

$user = new User;
$forgotPassword = $user->forgotPassword($email);

if(!$forgotPassword){
    $status = json_encode(Array('status' => "Check your email to renew a password"));
    echo $status;
    $user->emailForNewPassword($email);
}else{
    $status = json_encode(Array('status' => $forgotPassword));
    echo $status;
}





?>