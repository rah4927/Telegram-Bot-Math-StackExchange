<?php 


echo "Hello, world" ;
$botToken = "330544559:AAEGpcl9x2qPAfS2tO9gEtmi2yT2AKkeyFQ" ;
$website = "https://api.telegram.org/bot".$botToken ;

$update = file_get_contents("php://input");


$updateArray = json_decode($update, TRUE) ;
print_r($updateArray) ;

$chatId = $updateArray["message"]["chat"]["id"] ;
$text =$updateArray["message"]["text"] ;

$SOsearch = 'https://api.stackexchange.com//2.2/similar?order=desc&sort=relevance&site=math' ;
$search = rawurlencode($text) ;
$urlpost = file_get_contents($SOsearch.'&title='.$search);
$urlpostArray = json_decode($urlpost, TRUE) ;
$topResult = $urlpostArray['items'][0]['link'];
print_r($topResult) ;


file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$topresult") ;

?>



