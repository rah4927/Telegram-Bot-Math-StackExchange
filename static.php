<?php 


echo "Hello, world" ;
$botToken = "330544559:AAEGpcl9x2qPAfS2tO9gEtmi2yT2AKkeyFQ" ;
$website = "https://api.telegram.org/bot".$botToken ;

$update = file_get_contents("php://input");


$updateArray = json_decode($update, TRUE) ;
print_r("$update") ;

$chatId = $updateArray["result"][0]["message"]["chat"]["id"] ;
$text = $updateArray["result"][0]["message"]["text"] ;

file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=test") ;

?>



