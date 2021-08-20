<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "shufersal";
            public $proid;
            public $product;
            public $price;
            public $check_price;
            public $link;
            public $small_text;

            function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                $this->proid = $argv[1];
                $result = Database::query("SELECT * FROM products WHERE id = '$this->proid'");
                $this->product = $result[0]['name'];
                $this->check_price = $result[0]['Price'];

                // using ebay advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "%20", $this->product);
                $url = "https://www.shufersal.co.il/online/he/search?text=".$this->product;
                $response = file_get_contents($url);

                $error = '<ul class="tileContainer" id="mainProductGrid">';
                $response = substr($response, strpos($response, $error) + strlen($error), strlen($response));
                $error = trim(substr($response, 0, strpos($response,'</section>')));
                $this->product = str_replace("%20"," ", $this->product);
                $checkIfError = explode($this->product ,$error);
                

                // find price
                $_anchor = '<div class="smallText">';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 0, strpos($response,'&')));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;

                // find link
                $_title = '<a href="/online/he/';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'">')));
                $this->link = "https://www.shufersal.co.il/online/he/".$this->link;

                $check = $this->get_percentage($this->check_price,$this->price);
                if($check > 35){
                    $this->SendInfoToModule();
                }else{
                    echo "the product not found in ".$this->web."\n";

                }

            }

            public function get_percentage($total, $number){
                if ( $total > 0 ) {
                    return round($number * ($total / 100000));
                } else {
                    return 0;
                }
            }

           public function SendInfoToModule (){
            //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web
            
            if($this->price != 0){
                $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,42,'$this->link')");
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