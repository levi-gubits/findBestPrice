<?php

    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "eBay";
            public $proid;
            public $product;
            public $price;
            public $price_number;
            public $link;

            function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                $this->proid = $argv[1];
                $result = Database::query("SELECT name FROM products WHERE id = '$this->proid'");
                $this->product = implode($result[0]);

                // using ebay advanced search you get his url

                echo "\nSearching for: ".$this->product."...\n";
                $this->product= str_replace(" ", "+", $this->product);
                $url = "https://www.ebay.com/sch/i.html?_nkw=" . $this->product . "&_in_kw=3&_ex_kw=&_sacat=0&_udlo=&_udhi=&LH_BIN=1&LH_ItemCondition=3&_ftrt=901&_ftrv=1&_sabdlo=&_sabdhi=&_samilow=&_samihi=&_sadis=15&_stpos=&_sargn=-1%26saslc%3D1&_salic=1&_sop=12&_dmd=1&_ipg=50&_fosrp=1";
                $response = file_get_contents($url);

                // find link
                $_title = '<h3 class="lvtitle"><a href="';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'"')-1));

                // find price
                $_anchor = "<b>ILS</b>";
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 1, strpos($response,".")-1));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;
                $this->SendInfoToModule();
            }

           public function SendInfoToModule (){         
                //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web}
                
                if($this->price != 0){
                    $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,2,'$this->link')");
                    echo "\n\nthe search from: ".$this->web."\n";
                    echo "\nprice: ".$this->price."\n";
                    echo "\nlink: ".$this->link."\n";
                }else{
                    echo "\nthe product not found in ".$this->web."\n";
                }
           }
        }
        $agent = new Search($argv);
    }

?>
