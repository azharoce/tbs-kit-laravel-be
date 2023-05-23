<?php

function slack($payload){
    $curl = curl_init();

  
    curl_setopt_array($curl, array(
        CURLOPT_URL => $_ENV['URLBHOOK_SLACK'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($payload),
        CURLOPT_HTTPHEADER => array(
            'Content-type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}

function notification($msgTitle, \Exception $e){
    $payload = [
        "blocks" => [
            [
                "type" => "header",
                "text" => [
                    "type" => "plain_text",
                    "text" => ":warning: The Environtment is " . env("APP_ENV"),
                    "emoji" => true
                ]
            ],
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "`" . $msgTitle . "`"
                ]
            ],
            [
                "type" => "divider"
            ],
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "• TimeServer: " . date("Y-M-d H:i:s") . " \n • Line: " . $e->getLine() . " \n • Message: ```" . $e->getMessage() . "``` • File: ```" . $e->getFile() . "```"
                ]
            ],
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "PLEASE CHECK WOOOOYYYYY!!!!!!!"
                ]
            ],
            [
                "type" => "section",
                "text" => [
                    "type" => "mrkdwn",
                    "text" => "cc: @here"
                ]
            ],
        ]
    ];

    slack($payload);
}