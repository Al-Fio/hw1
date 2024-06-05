<?php
    require_once('Authentication.php');    
    
    if (!authenticated()) exit;
    
    header('Content-Type: application/json');
    
    echo news();

    function news() {
        $APIKEY = '0bDT6IyYD0PYlMCsj4MyFyJinfHmbkWXAHbw8l64';
        $urlNews = 'https://api.thenewsapi.com/v1/news/all?api_token=0bDT6IyYD0PYlMCsj4MyFyJinfHmbkWXAHbw8l64&search=beretta';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlNews);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
    
        return $res;
    }
?>

