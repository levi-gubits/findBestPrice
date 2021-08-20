<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;    

        class Search implements Isearch{
            public $web = "ksp";
            public $proid;
            public $product;
            public $price;
            public $link;


           function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                $this->proid = $argv[1];
                $result = Database::query("SELECT name FROM products WHERE id = '$this->proid'");
                $this->product = implode($result[0]);             
                
                // using ksp advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "%20", $this->product);
                //$url = "https://ksp.co.il/index.php?select=&kg=&list=1&sort=3&glist=0&uin=0&txt_search=".$this->product."&buy=&minprice=0&maxprice=0&intersect=..&rintersect=&store_real=";
                $url = "https://ksp.co.il/web/cat/?search=".$this->product;
                $response = file_get_contents($url);


                // find link
                $_title ="<a class='red' href='";
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,"'")));
                $this->link = "https://ksp.co.il/index.php".$this->link;

                // find price
                $_anchor = "<div class='linesprice' style=' margin-top:-2px; background: url(images/graybg.jpg) repeat-x;'>מחיר:";
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 1, strpos($response,"₪")-1));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;

                $this->SendInfoToModule();
                //data($product,$this->price_number,1,$this->url);
            }

           public function SendInfoToModule(){
            //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web}
            
            if($this->price != 0){
                $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,1,'$this->link')");
                echo "\n\nthe search from: ".$this->web."\n";
                echo "\nprice: ".$this->price."\n";
                echo "\nlink: ".$this->link."\n";
            }else{
                echo "the product not found in ".$this->web."\n";
            }
           }
           
        }
        $agent = new Search($argv);
    }

?>