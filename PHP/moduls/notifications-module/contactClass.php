<?php

    include_once __DIR__ ."/../../data_base.php";
    include_once __DIR__ ."/../user-module/checkIfUserConnect.php";
    require_once __DIR__ ."/../../vendor/autoload.php";
    require_once __DIR__ ."/../../sending_an_email.php";

    class Contact{

        public $userID;
        public $email;
        public $userName;

        public function getUserDetails(){
            $checkDetails = new CheckDetails;
            if($checkDetails->checkSession()){
                $this->userID = $checkDetails->userID;
                $this->email = $checkDetails->email;
                $this->userName = $checkDetails->name;
                return;
            }
            $this->email = null;
            $this->userID = 0;
        }

        public function replyEmailToUser(){

            // Create a message
            $body = "<h3>New system message</h3>";
            $body .= "<h1>Thank you very much for your inquiry</h1>";
            $body .= "<p>Hello $this->userName</p>";
            $body .= "<p>The system has received your request</p>";
            $body .= "<p>and we will try to answer it</p>";
            $body .= "<p>as soon as possible!</p>";
            $body .= "<a href='http://findbestprice.net/?page=home-page'>back to best price</a>";
                    
            $title = 'Automatic response to a message from the website';
                            
            sendingEmail($title,$body,$this->email);
        }
    }

?>