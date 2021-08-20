<?php

include_once __DIR__ ."/../../data_base.php";

    class Searching{

        public $price;
        public $link;
        public $storeID;
        public $agent;

        private $debug = false;

        private function logit($message) {

            if (!$this->debug) return;

            $log = date('Y-m-d H:i:s') . ": " . $message . "\n";
            file_put_contents("c:\\logs\\search_module.log", $log, FILE_APPEND);
        }

        public function getProduct($proID){

            $this->logit("starting getProduct");
            $this->logit("deletePreviousResults($proID)");
            $this->deletePreviousResults($proID); 
            $this->logit("runAgents($proID)");
            $this->runAgents($proID); 
            $this->logit("getInfoFromAgents($proID)");
            $this->getInfoFromAgents($proID);    
            $this->logit("Done.\n\n");
        }

        private function deletePreviousResults($proID){
            Database::del("DELETE FROM `products_stores` WHERE proId = $proID");   
        }

        private function runAgents($proID) {

            $categorys = Database::query("SELECT category FROM products WHERE id = $proID");
            $category = $categorys[0]['category'];

            echo "\nLaunch all agents wait until they are all finished..\n";
            $desc = [];
            $prcs = array();
            $sts = array();
            $agents = scandir( __DIR__ ."/Agents/$category");
            foreach ($agents as $agent){
                if ($agent != "." && $agent != ".."){
                    $command = "c:\\xampp\\php\\php.exe ".__DIR__ ."/Agents/$category/$agent $proID";
                    $this->logit($command);
                    $p = proc_open($command, $desc, $pipes);
                    $prcs[] = $p;
                    $s = proc_get_status($p);
                    $sts[] = $s;
                }
            } 

            $this->waitForAgentsToComplete($prcs, $sts);
        }
        
        private function waitForAgentsToComplete($prcs, $sts) {

            $done = false;
    
            while (!$done) {
                // get IDs of all currently running tasks
                exec("tasklist /FO CSV", $tasks);
    
                // make a list of task Ids
                $ids = array();
                foreach ($tasks as $task) {
                    $ids[] = trim(explode(',', $task)[1], '"');
                }
    
                // must unset tasks before next use
                unset($tasks);
                
                // get rid of duplicates, if any
                $ids = array_unique($ids, SORT_NUMERIC);
                
                // search if any of our tasks are in this list of IDs
                $found = false;
                foreach($sts as $st) {
                    if (in_array($st['pid'], $ids)) {
                        $found = true;
                    }
                } 
    
                if (!$found) {
                    $done = true;
                    echo "\nWE ARE DONE!\n";
                } else {
                    echo "\nnot done - sleeping another 2 sec.\n";
                    sleep(2);
                }
            }
               
        }

        private function getInfoFromAgents($proID){
            //get info from products_stores table if proID == $proID Take the lowest price
            $result = Database::query("SELECT * FROM `products_stores` WHERE proId = $proID 
            ORDER BY `products_stores`.`price` ASC LIMIT 1");  
            $this->price = $result[0]['price'];
            $this->link = $result[0]['link'];
            $this->storeID = $result[0]['stor_id'];

            $this->updatePrice($proID);
        }

        private function updatePrice($proID){

            $productDetails = Database::query("SELECT * FROM `products` WHERE id = '$proID'");
            $previousPrice = $productDetails[0]['previousPrice'];
            $price = $productDetails[0]['Price'];

            if($price != $this->price){
                $updatePrice = Database::update("UPDATE `products` SET `previousPrice` = $price WHERE id = $proID");
            }

            $updatePrice = Database::update("UPDATE `products` SET `Price` = $this->price WHERE id = $proID");

        }

        public function ChecksWhoTheUser($proID){
            //check in user_products table which userID requested $proID 
            $users = Database::query("SELECT * FROM `products_users` WHERE proId = $proID");

            foreach($users as $user) {
                $userID = $user['userId'];
                $userPrice = $user['price'];
                $this->sendInfoToSendingTable($proID,$userID,$userPrice);                
            }
          
        }
        
        private function sendInfoToSendingTable($proID,$userID,$userPrice){
            //send all information to the sending table       

            $checkAboutThisSending = Database::query("SELECT * FROM `sending` WHERE proid = $proID AND user_id = $userID");
            
            if($checkAboutThisSending){
                if($this->price != $checkAboutThisSending[0]['price']){
                    $newUpdates = Database::update("UPDATE `sending` SET `newUpdates` = 1 WHERE proid = $proID AND user_id = $userID");
                }
                $updatePrice = Database::update("UPDATE `sending` SET `price` = $this->price, userPrice = $userPrice, link = '$this->link' WHERE proid = $proID AND user_id = $userID");

                return;
            }

            echo "\nproid: ".$proID."\n"."price: ".$this->price."\n"."link: ".$this->link."\n"."user: ".$userID."\n";
            $result = Database::command("INSERT INTO `sending`(`proid`, `price`, `userPrice`, `link`, `user_id`,`newUpdates`) 
            VALUES ($proID,$this->price,'$userPrice','$this->link',$userID,1)");
        }

    }

?>
