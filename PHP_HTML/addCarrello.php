<?php
    require_once('Authentication.php');    
        
    $user = authenticated();

    if (!$user) {
        exit;
    }

    
    echo addCarrello($_POST['article']);

    function addCarrello($article) {
        $conn = mysqli_connect('localhost','root','','Beretta') or die(mysqli_connect_error());

        global $user;
        $query = "INSERT INTO CARRELLO(prodotto, users) VALUES ('" .$article. "'," .$user. ")";

        $result = mysqli_query($conn, $query) or die(mysqli_error());

        if($result) {
            $arrayResults = array("result" => true);
        } else {
            $arrayResults = array('result' => false);
        }

        mysqli_close($conn);

        return json_encode($arrayResults);
    }
?>