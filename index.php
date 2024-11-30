<?php
    $API_KEY = "8167716118:AAE_Uf7B2kJyimcdcvp29-zctmtuF0_8lBU";
    define('API_KEY' , $API_KEY);

    $inData = file_get_contents('php://input');
    $tData = json_decode($inData);

    $message = $tData->message;
    $chat = $message->chat;
    $chat_id = $chat->id;

    bot("sendMessage",
    ["chat_id"=>$chat_id,
    "text"=>"loading..."
    ]);

    function bot($method, $data=[]){
        $url = "https://api.telegram.org/bot". API_KEY . "/" . $method;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL , $url);
        curl_setopt($ch , CURLOPT_RETURNTRANSFER , TRUE);
        curl_setopt($ch , CURLOPT_POSTFIELDS , $data);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }
?>