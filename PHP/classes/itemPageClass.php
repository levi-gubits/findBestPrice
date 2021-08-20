<?php

include_once __DIR__ ."/../data_base.php";
include_once __DIR__ ."/../moduls/user-module/checkIfUserConnect.php";

class ItemPage{

    public $userID;
    public $proID;
    public $proName;
    public $image;
    public $description;
    public $category;

    
    public function getUserDetails(){
        $checkDetails = new CheckDetails;
        if($checkDetails->checkSession()){
            $this->userID = $checkDetails->userID;
            return;
        }

        $this->userID = 0;
    }

    public function getProductDetails(){
        $this->proID = $_GET['proid'];
        $result = Database::query("SELECT * FROM `products` WHERE id = '$this->proID'");
        $this->category = $result[0]['category'];
        $this->proName = $result[0]['name'];
        $this->image = $result[0]['image'];
    }

    public function description(){

        $description = $this->proName." ";

        $listOfCategory =  Database::query("SELECT distinct COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$this->category'");
        $getDetails = Database::query("SELECT * FROM `$this->category` WHERE proId = $this->proID");
        
        $count = 0;
        foreach ($listOfCategory as $key => $value){
            $count++;
            if($count > 2){
                $categoryName = $value['COLUMN_NAME'];
                $description .= $categoryName.': '.$getDetails[0][$categoryName]." ";
            }
        }
        return $description;
    }
}

?>