<?php

    require_once __DIR__ ."/../../../data_base.php";
    require_once __DIR__ ."/../contactClass.php";

    header("Content-Type:application/json; charset=utf-8");

    $body = trim(file_get_contents("php://input"));
    $request = json_decode($body, true);

    $title = $request['title'];
    $body = $request['message'];
    $email = $request['email'];
    $userID = $request['userID'];

    $result = Database::command("INSERT INTO `messages`(`userId`, `title`, `message`, `userMail`, `date`) 
    VALUES ($userID,'$title','$body','$email',NOW())");

    $contant = new Contact;
    $contant->replyEmailToUser()

?>