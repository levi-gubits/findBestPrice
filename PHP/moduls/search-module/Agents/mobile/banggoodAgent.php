<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "banggood";
            public $proID;
            public $product;
            public $price;
            public $check_price;
            public $number;
            public $link;

           function  __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                //echo $argv[1];

                $this->proID = $argv[1];
                $result = Database::query("SELECT * FROM products WHERE id = '$this->proID'");
                $this->product = $result[0]['name'];
                $this->check_price = $result[0]['Price'];
              

                // using ebay advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "-", $this->product);
                $url = "https://www.banggood.com/search/".$this->product.".html?from=nav&DCC=IL&currency=ILS";
                $response = file_get_contents($url);

                // find link
                $_title = '<span class="img notranslate">';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'" dpid')));
                $this->link = substr($this->link, strpos($this->link, '<a href="') + strlen('<a href="'), strlen($this->link));

                // find price
                $_anchor = 'oriprice-range="0-0">';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 1, strpos($response,'<')-1));
                $this->price = trim(substr($this->price, 2, strpos($this->price,'.')-2));
                $this->price = str_replace(",", "", $this->price);
                $this->price = (int)$this->price;


                $check = $this->get_percentage($this->check_price,$this->price);
                echo $check;


                if($check > 25){
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
            //Send all information to the products_stores table {id: id, proID:$proID, price:$price, stor: $web}
            
            if($this->price != 0){
                $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proID,$this->price,11,'$this->link')");
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