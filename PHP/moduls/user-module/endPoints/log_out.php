<?php
    include_once __DIR__ ."/../user_module.php";

    $user = new User;
    $logOut = $user->logOut();

?>