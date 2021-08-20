<?php

include_once __DIR__ ."/../user_module.php";

header("Content-Type:application/json; charset=utf-8");

$body = trim(file_get_contents("php://input"));
$request = json_decode($body, true);

$newPassword = $request['password'];
$email = $request['email'];

$user = new User;
$updatePasswordInDb = $user->updatePasswordInDb($newPassword,$email);

$status = json_encode(Array('status' => $updatePasswordInDb));
echo $status;


?>