<?php

    include_once __DIR__ ."/../user_module.php";
    require_once __DIR__ ."/../../../data_base.php";    

    header("Content-Type:application/json; charset=utf-8");

    $body = trim(file_get_contents("php://input"));
    $request = json_decode($body, true);

    $email = $request['email'];
    $password = $request['password'];

    $user = new User;
    $checkIfTheUserExists = $user->checkIfTheUserExists($password,$email);

    if(!$checkIfTheUserExists){
        $userDetails =  Database::query("SELECT * FROM `users` WHERE password = '$password' AND mail = '$email'");
        $login = $user->login($userDetails[0]['sessionKey']);
        $status = json_encode(Array('status' => $login, 'id' => $userDetails[0]['Id']));
        echo $status;
    }else{
        $status = json_encode(Array('status' => $checkIfTheUserExists));
        echo $status;
    }

?>