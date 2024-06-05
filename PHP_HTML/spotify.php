<?php
    require_once('Authentication.php');    
    
    if (!authenticated()) exit;
    
    header('Content-Type: application/json');
    
    if($_POST['page'] === '1') {
        $token = token();
        echo spotify($token);
    } else {
        for($i = 1; $i < $_POST['page']; $i++){
            $token = token();
            $res = spotify($token);
            $link = json_decode($res)->next;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token)); 
            $res = curl_exec($ch);
            curl_close($ch);

            echo $res;
        }
    }

    function token() {
        $client_id = "a03f22b86e5a461facd89708bc8c078a";
        $client_secret = "cc23d4002bbb4d6683c3804853f9ff3c";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
        $res = curl_exec($ch);
        $token = json_decode($res)->access_token;
        curl_close($ch);    

        return $token;
    }

    function spotify($token) {
        $url = 'https://api.spotify.com/v1/shows/7qaUF4cinQDZM7YwhtRAYW/episodes';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token)); 
        $res = curl_exec($ch);
        curl_close($ch);
    
        return $res;
    }
?>

