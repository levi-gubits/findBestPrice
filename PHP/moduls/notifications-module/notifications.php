<?php
require_once __DIR__ ."/../../data_base.php";
require_once "sending_module.php";

function CheckAndSendMessages(){
    $result = Database::query("SELECT * FROM sending");
    if($result){
        foreach($result as $row){
            if($row['newUpdates'] == 1){
                $proID = $row['proid'];
                $price = $row['price'];
                $link = $row['link'];
                $userID = $row['user_id'];
                $sending = new Sending;
                $info = $sending->infoFromSendingTable($proID,$price,$userID,$link);
                if($info){              
                    $sending->SendMessageToMail($proID, $info['productName'],$price,$link,$info['email'],$userID,$info['userPrice'],$info['h1']);
                    return;
                }
            }
        }
    }
        
    echo "\nNo new notifications\n";
    
}
while(true){
    CheckAndSendMessages();
    sleep(3600 * 24);
}
?>