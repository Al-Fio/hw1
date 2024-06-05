<?php
    require_once('Authentication.php');    
        
    $user = authenticated();

    if (!$user) {
        exit;
    }

    
    echo removeCarrello($_POST['article']);

    function removeCarrello($article) {
        $conn = mysqli_connect('localhost','root','','Beretta') or die(mysqli_connect_error());

        global $user;
        $query = "DELETE FROM carrello WHERE users = ".$user." AND prodotto = ".$article." limit 1";

        $result = mysqli_query($conn, $query) or die(mysqli_error());

        if($result) {
            $arrayResults = array("result" => 'true');
        } else {
            $arrayResults = array('result' => 'false');
        }

        mysqli_close($conn);

        return json_encode($arrayResults);
    }
?>