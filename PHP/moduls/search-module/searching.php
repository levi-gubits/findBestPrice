<?php

require_once __DIR__ ."/../../data_base.php";
require_once "search_module.php";


function keepSearching(){

    $products = Database::query("SELECT proId FROM searching;");
    if(!$products){
        echo "There are currently no active searches";
        return;
    }
            
    foreach($products as $product) {
        $proID = $product['proId'];
        $search = new Searching;
        $search->getProduct($proID);
        $search->ChecksWhoTheUser($proID);
    }  

}

while(true){
    keepSearching();
    sleep(3600*24);
}

?>