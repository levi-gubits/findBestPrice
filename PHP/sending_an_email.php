<?php


function sendingEmail($title,$body,$email){
    try {
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.googlemail.com', 465, 'ssl'))
          ->setUsername('gubitsly770@gmail.com')
          ->setPassword('jeznjkpnglufjdrg')
        ;
     
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);
    
     
        $message = (new Swift_Message($title))
          ->setFrom(['gubitsly770@gmail.com' => 'Best Price'])
          ->setTo([$email])
          ->setBody($body)
          ->setContentType('text/html')
        ;
     
        // Send the message
        $mailer->send($message);
     
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}


?>