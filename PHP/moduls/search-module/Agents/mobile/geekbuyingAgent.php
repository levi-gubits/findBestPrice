<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "geekbuying";
            public $proid;
            public $product;
            public $price;
            public $check_price;
            public $link;

            function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                $this->proid = $argv[1];
                $result = Database::query("SELECT * FROM products WHERE id = '$this->proid'");
                $this->product = $result[0]['name'];
                $this->check_price = $result[0]['Price'];

                // using ebay advanced search you get his url
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "%20", $this->product);
                $url = "https://www.geekbuying.com/search?keyword=".$this->product."&c=1556";
                $response = file_get_contents($url);

                // find link
                $_title = '" href="https://www.geekbuying.com/item/';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'"')));
                $this->link = "https://www.geekbuying.com/item/".$this->link;

                // find price
                $_anchor = '<div class="price">';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 3, strpos($response,'.')-3));
                $this->price = (int)$this->price;

                $check = $this->get_percentage($this->check_price,$this->price);

                if($check > 25 && $check < 50){
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
                    $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proid,$this->price,20,'$this->link')");
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