<?php

require_once __DIR__ . "/../../data_base.php";
require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../sending_an_email.php";

class User{

    private $debug = false;

    private function logit($message) {

        if (!$this->debug) return;

        $log = date('Y-m-d H:i:s') . ": " . $message . "\n";
        file_put_contents("c:\\logs\\user_module.log", $log, FILE_APPEND);
    }

    //signUp
    public function userDataValidation($name,$password,$email){
        //Checking the integrity of information (true/false)
        $CheckIfMailAlreadyExists =  Database::query("SELECT mail FROM `users` WHERE mail = '$email'");

        if($CheckIfMailAlreadyExists){
            return "Error: Email address already exists Please try another address or login.";
        }

        if(strlen($name) == 0 || !$this->checkSubmitPassword($password) || !$this->checkSubmitEmail($email)){
            if(strlen($name) == 0){
                return "The name you entered is invalid";
            }
            if(!$this->checkSubmitPassword($password)){
                return 'Password should be at least 8 characters in length And should be included in letters and numbers.';
            }
            if(!$this->checkSubmitEmail($email)){
                return "Invalid email address Please fix";
            }
        }

        return false;
    }

    public function createUser($name,$password,$email,$session){
        //create user on DB
        $result = Database::command("INSERT INTO `users`(`name`, `mail`, `password`,`sessionKey`) 
        VALUES ('$name','$email','$password','$session')");

        $getUserId = Database::query("SELECT * FROM `users` WHERE sessionKey = '$session'");

        $this->logit("sendEmailToUser($name,$email,$getUserId[0]['Id'])");
        $this->sendEmailToUser($name,$email,$getUserId[0]['Id']);
        return $getUserId[0]['Id'];
    }

    private function sendEmailToUser($name,$email,$id){
        //Sends email to user to verify data 
         
        // Create a message
        $body = "<h3>how fun! We saw you sign up for our website</h3>";
        $body .= "<h2>hello: $name</h2>";
        $body .= "<p>Your registration to the site has been successfully received</p>";
        $body .= "<p>Back to the site: <a href='http://findbestprice.net/?page=home-page'>Best Price</a></p>";
        $body .= "<p>If this is a mistake, just ignore this email.</p>";

        $title = 'Welcome to Best Price';
        
        sendingEmail($title,$body,$email);

    } 
    
    //logIn
    Public function checkIfTheUserExists($password ,$email){
        // Checks in the database if there is a user with the same email and password (true/false)
        $checkIfUserExists =  Database::query("SELECT * FROM `users` WHERE password = '$password' AND mail = '$email'");
        if(!$checkIfUserExists){
            return "Username or password incorrect";
        }

        return false;

    }

    Public function login($session){
        session_start();
        $_SESSION['session'] = $session;
        return  "You've logged in successfully!";
    }

    //logOut
    Public function logOut(){
        //logout Request from user
        session_start();
        unset($_SESSION['session']);
        header('Location: http://findbestprice.net/?page=home-page');
        exit;
    }

    //forgot Password
    public function forgotPassword($email){
        //Receive a request from the website for a new password, user email address require     

        $CheckIfEmailExists =  Database::query("SELECT * FROM `users` WHERE mail = '$email'");
        if(!$CheckIfEmailExists){
            return "email address incorrect";
        }

        return false;

    }
    
    Public function emailForNewPassword($email){
        //Verifies an email address in the database and sends an email link to create a new password
        $result =  Database::query("SELECT * FROM `users` WHERE mail = '$email'");
        $name = $result[0]['name'];
        $password = $result[0]['password'];

        // Create a message
        $body = "<p>Hello,</p>";
        $body .= "<p>Request to reset password for username - $name</p>";
        $body .= "<p>If this is a mistake, just ignore this email.</p>";
        $body .= "<p>To reset your password, click on the link below</p>";
        $body .= "<a href='http://findbestprice.net/PHP/moduls/user-module/endPoints/resset_password.php?id=".urlencode(base64_encode($password))."&email=$email'>password reset</a>";
        
        $title = 'Your new password';
                
        sendingEmail($title,$body,$email);
    } 

    Public function updatePasswordInDb ($password,$email){
        //Edit a database password for userID
        $result = Database::update("UPDATE `users` SET `password` = '$password' WHERE `mail` = '$email'");
        return "Password is changed successfully";
    }

    //Edit user data
    Public function updateUserInformation($name,$password,$email,$session){
        //Editing user information in the database
        $result = Database::update("UPDATE `users` SET `name`='$name',`mail`='$email',`password`='$password' WHERE `sessionKey` = '$session'");
        return "The data were successfully edited!";
    }

    //Data check functions
    private function checkSubmitPassword($password){
        $letters = preg_match('@[a-zA-Z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if(!$letters || !$number || strlen($password) < 8){
            return false;
        }else{
            return true;
        }
    }

    private function checkSubmitEmail($email){
        $validEmailAddress =  filter_var($email, FILTER_VALIDATE_EMAIL);
        if(!$validEmailAddress){
            return false;
        }else{
            return true;
        }
    }


}


?>