<?php
    namespace Agent{
        include_once __DIR__ ."/../../../../data_base.php";
        include_once __DIR__ ."/../../interface.php";
        use Database;

        class Search implements Isearch{
            public $web = "amazon";
            public $proID;
            public $product;
            public $dp;
            public $price;
            public $check_price;
            public $usd;
            public $ils;
            public $convert_price;
            public $link;

           function __construct($argv){
                //search in $web data about the $proID And take the lowest price $price = price.val
                $this->proID = $argv[1];
                $result = Database::query("SELECT * FROM products WHERE id = '$this->proID'");
                $this->product = $result[0]['name'];
                $this->check_price = $result[0]['Price'];
                
                echo "\nSearching for: ".$this->product."...\n";
                $this->product = str_replace(" ", "+", $this->product);

                // using amazon advanced search you get his url
                //https://www.amazon.com/s?k=oneplus+8t&rh=n%3A7072561011;
                //https://www.amazon.com/s?k=Galaxy+S20+SM-G980F&i=mobile&rh=n%3A7072561011&s=price-asc-rank&dm=true&language=he&qid=1609230756&ref=sr_st_price-asc-rank
                //$url1 = "https://www.amazon.com/s?k=".$this->product."&currencyCode=ILS&&ref=nb_sb_noss_2";
                $url1 = "https://www.amazon.com/s?k=".$this->product."&i=mobile&rh=n%3A7072561011&s=relevancerank&qid=1623172060&ref=sr_st_relevancerank";
                $response = file_get_contents($url1);
                //find code
                /*$_code = "/dp/";
                $response = substr($response, strpos($response, $_code) + strlen($_code), strlen($response));
                $this->dp = trim(substr($response, 0, strpos($response, "/")));
                $url2 ="https://www.amazon.com/gp/offer-listing/".$this->dp."/ref=dp_olp_unknown_mbc";
                $response = file_get_contents($url2);

                // find price
                $_anchor = '<span class="a-size-large a-color-price olpOfferPrice a-text-bold"> ';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 0, strpos($response,'.')));
                $this->usd = substr($this->price, strpos($this->price, '$') + strlen('$'), strlen($this->price));
                $this->usd = str_replace(",", "", $this->usd);
                
                // convert USD to ILS
                $url3 = "https://www.msn.com/he-il/money/currencyconverter";
                $response = file_get_contents($url3);
                $_ILS = '<span id="frmrate" class="ccrate">1 USD = ';
                $response = substr($response, strpos($response, $_ILS) + strlen($_ILS), strlen($response));
                $this->ils = trim(substr($response, 0, strpos($response,' ILS</span>')));
                $this->convert_price = (int)$this->ils * (int)$this->usd;*/

                $_title = '<a class="a-link-normal a-text-normal" href="';
                $response = substr($response, strpos($response, $_title) + strlen($_title), strlen($response));
                $this->link = trim(substr($response, 0, strpos($response,'">')));
                $this->link = "https://www.amazon.com".$this->link;

                $_anchor = '<span class="a-offscreen">$';
                $response = substr($response, strpos($response, $_anchor) + strlen($_anchor), strlen($response));
                $this->price = trim(substr($response, 0, strpos($response,'</span>')));
                $this->price = str_replace(",", "", $this->price);


               $url3 = "https://www.msn.com/he-il/money/currencyconverter";
                $response = file_get_contents($url3);
                $_ILS = '<span id="frmrate" class="ccrate">1 USD = ';
                $response = substr($response, strpos($response, $_ILS) + strlen($_ILS), strlen($response));
                $this->ils = trim(substr($response, 0, strpos($response,' ILS</span>')));
                $this->convert_price = (int)$this->ils * (int)$this->price;


                // find link
                

                $check = $this->get_percentage($this->check_price,$this->convert_price);
                if($check > 35){
                    $this->SendInfoToModule();
                }else{
                    echo "the product not found in this website\n";
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
            
            if($this->convert_price != 0){
                $result = Database::command("INSERT INTO `products_stores`(`proid`, `price`, `stor_id`,`link`) VALUES ($this->proID,$this->convert_price,5,'$this->link')");
                echo "\n\nthe search from: ".$this->web."\n";
                echo "\nprice: ".$this->convert_price."\n";
                echo "\nlink: ".$this->link."\n"; 
            }else{
                echo "the product not found in ".$this->web."\n";
            }
           }
        }

        $agent = new Search($argv);
    }

?>