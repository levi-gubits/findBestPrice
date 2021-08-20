<?php

    include_once __DIR__ ."/../user_module.php";

    header("Content-Type:application/json; charset=utf-8");

    $body = trim(file_get_contents("php://input"));
    $request = json_decode($body, true);

    $name = $request['full_name'];
    $email = $request['email'];
    $password = $request['password'];

    $user = new User;
    $validate = $user->userDataValidation($name,$password,$email);
    if (!$validate) {
        session_start();
        $session = session_create_id();
        $_SESSION['session'] = $session;
        $createUser = $user->createUser($name,$password,$email,$session);
        $status = json_encode(Array('status' => "You have successfully registered!", "id" => $createUser));
        echo $status;
    } else {
        $status = json_encode(Array('status' => $validate));
        echo $status;
    }

?>