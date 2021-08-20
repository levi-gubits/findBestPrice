<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "azrieli";
            public $proid;
            public $product;
            public $price;
            public $link;

           function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val

                $this->proid = $argv[1];
                $result = Database::query("SELECT name FROM products WHERE id = '$this->proid'");
                $this->product = implode($result[0]);

                // using ebay advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "%20", $this->product);
                $url = "https://www.azrieli.com/".$this->product."?attr239=%D7%A1%D7%9E%D7%90%D7%A8%D7%98%D7%A4%D7%95%D7%A0%D7%99%D7%9D";
                $response = file_get_contents($url);

                // find link
                $_title = '<a href="https://www.azrieli.com/o/';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'"')));
                $this->link = "https://www.azrieli.com/o/".$this->link;
                // find price
                $_anchor = '<span style="display:inline;margin-right:10px;">';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 0, strpos($response,'&nbsp;</span>')));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;
                $this->SendInfoToModule();

            }

           public function SendInfoToModule (){
            //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web}
            if($this->price != 0){
                if($this->link != 'https://www.azrieli.com/o/9c5c83f0-7d05-4b17-a6a9-693ca0867893'){
                    $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,10,'$this->link')");
                    echo "\n\nthe search from: ".$this->web."\n";
                    echo "\nprice: ".$this->price."\n";
                    echo "\nlink: ".$this->link."\n";
                }
            }else{
                echo "the product not found in ".$this->web."\n";
            }
        }
        }
        $agent = new Search($argv);
    }

?>