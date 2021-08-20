<?php

require_once __DIR__ ."/../data_base.php";
include_once __DIR__ ."/../moduls/user-module/checkIfUserConnect.php";

//Check for updates for user-selected products
class PriceUpdate{

    public $userID;
    private $colorStyle;

    public function getUserDetails(){
        $checkDetails = new CheckDetails;
        if($checkDetails->checkSession()){
            return $this->userID = $checkDetails->userID;
        }
    }

    //Check for updates
    public function checkIfUserGetUpdateForProduct(){

        $checkFromSending = Database::query("SELECT * FROM `sending` WHERE user_id = '$this->userID'");

        foreach($checkFromSending as $sending){
            $price = $sending['price'];
            $userPrice = $sending['userPrice'];
            $proID = $sending['proid'];
            $newUpdates = $sending['newUpdates'];

            $this->productUpdateCompnente($proID,$price,$userPrice,$newUpdates);
        }
    }

    //View updates
    private function productUpdateCompnente($proID,$price,$userPrice,$newUpdates){

        $productDetails = Database::query("SELECT * FROM `products` WHERE id = '$proID'");

        $proName = $productDetails[0]['name'];
        $proImg = $productDetails[0]['image'];
        $previousPrice = $productDetails[0]['previousPrice'];
        $difference = $price - $userPrice;

        if($price < $userPrice || $price == $userPrice){
            $match = "<p style='color: gold'>The product is at ₪ ".$difference." than your request!</p>";
        }else{
            $match = "<p style='font-size: 15px; max-width: 330px; text-align: center'>The product is expensive at ₪ ".$difference." at your request</p>";
        }

        if($price < $previousPrice || $price == $previousPrice){
            $this->colorStyle = 'rgb(64, 201, 162)';
        }
        if($price > $previousPrice){
            $this->colorStyle = 'red';
        }

        $newResult = "";
        if($newUpdates == 1){
            $newResult = "<span class='new-result'>NEW RESULT</span>";
        }

        echo $product = "<div class='product'>
            <div class='product-content'>"
                .$newResult.
                "<div class='product-img'>
                    <img src='".$proImg."' alt='product image'>
                </div>
            </div>

            <div class='product-info' style='max-height: 180px;'>
                <a href='?page=itemPage&proid=".$proID."' class='product-name'>".$proName."</a>
                <p class='product-price previous-price' style='color: ".$this->colorStyle." '>previous price:₪ ".$previousPrice.".00</p>
                <p class='product-price'>Current price: ₪ ".$price.".00</p>".$match."
                <button type='button' class='btn-update' value=".$proID.">For more information</button>

            </div>

        </div>";
        
    }
    public function resertCountOfUpdate(){
        $updates = Database::update("UPDATE `sending` SET `newUpdates` = 0 WHERE user_id = $this->userID");
    }
}

?>