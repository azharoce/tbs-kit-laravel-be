<?php

function sendNotifSlack(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $_ENV['LOG_SLACK_WEBHOOK_URL'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{"text":"Hello,wkwkwk "}',
        CURLOPT_HTTPHEADER => array(
            'Content-type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}
