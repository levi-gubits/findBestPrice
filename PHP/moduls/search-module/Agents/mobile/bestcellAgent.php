<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;
        
        class Search implements Isearch{
            public $web = "bestmobile";
            public $proid;
            public $check_price;
            public $product;
            public $price;
            public $link;

           function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val

                $this->proid = $argv[1];
                $result = Database::query("SELECT * FROM products WHERE id = '$this->proid'");
                $this->product = $result[0]['name'];
                $this->check_price = $result[0]['Price'];

                // using ebay advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "+", $this->product);
                $url = "http://www.bestcell.co.il/search/?q=".$this->product;
                $response = file_get_contents($url);


                // find link
                $_title = '<a class="price" href="';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'">')));
                $this->link = "http://www.bestcell.co.il".$this->link;

                // find price
                //$response = file_get_contents($this->link);
                $_anchor = '</span><strong>';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 0, strpos($response,'</strong>')));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;

                $this->SendInfoToModule();

            }


           public function SendInfoToModule (){
            //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web}
            
            if($this->price != 0){
                $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,12,'$this->link')");
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