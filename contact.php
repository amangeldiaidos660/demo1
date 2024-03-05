<?php
session_start();

$maxRequests = 2;
$interval = 60;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_SERVER['REMOTE_ADDR'];

    $currentTime = time();

    if (!isset($_SESSION['last_request_time'][$ip]) || ($currentTime - $_SESSION['last_request_time'][$ip]) >= $interval) {
        $_SESSION['request_count'][$ip] = 1; 
    } else {
        $_SESSION['request_count'][$ip] = isset($_SESSION['request_count'][$ip]) ? $_SESSION['request_count'][$ip] + 1 : 1;
    }

    if ($_SESSION['request_count'][$ip] > $maxRequests) {
        echo 'Вы превысили лимит. Попробуйте через минуту!';
    } else {
        // $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        // $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
        // $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        // $data = array(
        //     'p1' => $name,
        //     'p2' => $tel,
        //     'p3' => $message
        // );

        // $options = array(
        //     'http' => array(
        //         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        //         'method' => 'POST',
        //         'content' => http_build_query($data),
        //     ),
        // );

        // $context = stream_context_create($options);
        // $result = file_get_contents('https://script.google.com/macros/s/AKfycbxP_3gbSU8qVQrwQbRDRhEj62jffpUiC3OHTKBj2fQ_Tq7mmit0bO1pWtCjYfWywz8p/exec', false, $context);
        $result = False;

        if ($result === FALSE) {
            echo 'success';
        } else {
            echo 'success';
            
            // $token = "5910801981:AAF1awL84ElfovtqYsa96s7dnIRcL-x-Kg0";  
            // $chat_id = "-1002135649662";  

            // $telegram_message = "Новая заявка!\nИмя: $name\nТелефон: $tel\nПодробнее: 'https://docs.google.com/spreadsheets/d/12xCqqmdejSes3XxHEI9uc4A11Di4RnJrTbHBK4-r5C4/edit?usp=sharing'\n";
            // $telegram_url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($telegram_message);

            // $telegram_result = file_get_contents($telegram_url);

            // if ($telegram_result === FALSE) {
            //     echo 'false';
            // } else {
            //     echo 'true';
            // }
        }

        $_SESSION['last_request_time'][$ip] = $currentTime;
    }
}

?>
