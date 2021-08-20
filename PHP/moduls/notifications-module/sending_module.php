<?php

require_once __DIR__ ."/../../data_base.php";
require_once __DIR__ ."/../../vendor/autoload.php";
require_once __DIR__ ."/../../sending_an_email.php";

class Sending{

    private function logit($message) {

        if (!$this->debug) return;

        $log = date('Y-m-d H:i:s') . ": " . $message . "\n";
        file_put_contents("c:\\logs\\search_module.log", $log, FILE_APPEND);
    }

    public function infoFromSendingTable($proID,$price,$userID,$storeID){
        // getting data from  sending table from the sendingID row 
        //{id:id, userID: userID, proID:proID, price:price, storID: storID} And links the data to parameters
        $selectEmail = Database::query("SELECT mail FROM users WHERE Id = $userID");
        $selectProductName = Database::query("SELECT name FROM products WHERE id = $proID");      
        $selectUserPrice = Database::query("SELECT price FROM products_users WHERE userId = $userID AND proId = $proID");
        
        $info['email'] = $selectEmail[0]['mail'];
        $info['productName'] = $selectProductName[0]['name'];
        $info['userPrice'] = $selectUserPrice[0]['price'];

        if($price < $info['userPrice'] || $price == $info['userPrice']){
            $info['h1'] = "<h1 style='color: gold'>The system has found a price match for the product you are looking for</h1>";
        }else{
            $info['h1'] = "<h1>Information for the item you are looking for</h1>";
        }

        return $info;

    }

    Public function SendMessageToMail($proID, $product,$price,$storeID,$email,$userID,$userPrice,$h1){

        // Create a message
        $body = "<h3>New system message</h3>";
        $body .= $h1;
        $body .= "<p>product: $product</p>";
        $body .= "<p>found in price: $price</p>";
        $body .= "<p>in this link: $storeID</p>";
        $body .= "<p>Make the purchase for you?</p>";
        $body .= "<a href='http://localhost/PHP/moduls/search-module/keep_searching.php?user=$userID&proid=$proID&price=$userPrice'>keep searching</a>";
        $body .= "<a href='http://localhost/PHP/moduls/search-module/endPoints/stopSearching.php?proID=$proID&userID=$userID'>stop searching </a><br>";

        $title = 'You are getting new results';
                
        sendingEmail($title,$body,$email);
    } 

    
    public function deleteSearchingRequest($userID,$proID){
        //delete request from user_products
        $delete = Database::del("DELETE FROM `products_users` WHERE userId = $userID AND  proId = $proID");
        
        echo "\nsearching request is deleted\n";
        $this->deleteOnSearchingTable($proID);

    }

    private function deleteOnSearchingTable($proID){
        $result = Database::query("SELECT * FROM `products_users` WHERE proId = $proID");
        if(!$result){
            $delete = Database::del("DELETE FROM `searching` WHERE proId = $proID");
            echo "\nsearching product successfully deleted!\n";
        }else{
            echo "\nThere is still a user looking for the product..\n";
        }
    }

    public function deleteSendingRowFromTable($userID,$proID){
        $delete = Database::del("DELETE FROM `sending` WHERE proId = $proID AND user_id = $userID");
        echo "the notifications successfully deleted\n";
    }

    
}


?>