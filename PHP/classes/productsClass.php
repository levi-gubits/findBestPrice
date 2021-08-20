<?php

include_once __DIR__ ."/../data_base.php";
include_once "filterClass.php";

//View a list of products
class Products{

    public $listOfProducts = array();
    public $title;

    //Check product category
    public function checkCategory(){

        if(count($_GET) == 2){
            if(isset($_GET['category'])){
                $this->listOfProducts[0] =  Database::query("SELECT * FROM `products` WHERE category = '$_GET[category]'");
                $this->title = $_GET['category'];
                echo $this->title;
                return;
            }
            if(isset($_GET['search'])){
                $searchValue = $_GET['search'];
                $this->listOfProducts[0] = Database::query("SELECT * FROM `products` WHERE name LIKE '$searchValue%' OR name LIKE '%$searchValue' OR name LIKE '%$searchValue%'");
                $this->title = "search result";
                echo $this->title;
                return;
            }
        }
        
        if(count($_GET) > 2){
            $this->filterList();
            echo $this->title = $_GET['category'];
            return;
        }
        
        if(count($_GET) == 1){
            $this->listOfProducts[0] =  Database::query("SELECT * FROM `products`");
            $this->title = "all";
            echo $this->title;
        }

    }

    //Filter filter test
    public function filterList(){

        $view = $_GET['category'].'view';
        $filterList = array();
        $keyArray = array();
        $titlesArray = array_keys($_GET);
        $count = 0;
        foreach($titlesArray as $title){
            if($count >= 2){
                $keyArray[] = $title;
            }
            $count++;
        }    

        foreach($_GET as $get){
            if(is_array($get)){
                foreach($keyArray as $title){
                    for($i = 0; $i < count($get); $i++){
                        $filterList[] = Database::query("SELECT * FROM `$view` WHERE `$title` = '$get[$i]'");
                    }
                }
            }
            if(isset($_GET["Price"])){
                $minPrice = Database::query("SELECT MIN(`Price`) FROM `$view`");
                $minPrice = (int)$minPrice[0]['MIN(`Price`)'];
                $maxPrice = (int)$_GET["Price"];
                $filterList[] = Database::query("SELECT * FROM `$view` WHERE `Price` BETWEEN $minPrice AND $maxPrice");
            }
        }

        $proID = array();
        foreach($filterList as $list){
            foreach ($list as $key => $value){
                $proID[] = $value['proId'];
            }
        }
        foreach(array_unique($proID) as $id){
            $this->listOfProducts[] =  Database::query("SELECT * FROM `products` WHERE `id` = $id");
        }

    }

    //Prepares a list of products
    public function getProducts(){

        foreach($this->listOfProducts as $list){
            foreach($list as $product){
                $proID = $product['id'];
                $image = $product['image'];
                $name = $product['name'];
                $price = $product['Price'];
    
                $this->productsComponent($proID,$image,$name,$price);
            }
        }

    }

    //View products
    private function productsComponent($proID,$image,$name,$price){
        echo '<div class="product">
            <div class="product-content">
                <div class="product-img">
                <a href="?page=itemPage&proid='.$proID.'"><img src="'.$image.'" alt="product image"></a>
                </div>
            </div>

            <div class="product-info">
                <a href="?page=itemPage&proid='.$proID.'" class="product-name">'.$name.'</a>
                <p class="product-price">₪ '.$price.'.00</p>
                <button type="button" class="btn-update update" value='.$proID.'>Look for a new price</button>

        </div></div>';

    }

}

?>