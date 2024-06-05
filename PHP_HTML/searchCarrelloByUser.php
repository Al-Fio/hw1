<?php
    require_once('Authentication.php');    
            
    $user = authenticated();

    if (!$user) {
        exit;
    }

    echo search();

    function search() {
        $conn = mysqli_connect('localhost','root','','Beretta') or die(mysqli_connect_error());

        global $user;

        $query =   "SELECT * 
                    FROM prodotti P join Carrello C on P.ID = C.prodotto
                    WHERE C.users = ".$user;

        $result = mysqli_query($conn, $query) or die(mysqli_error());

        $arrayResults = array();

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) 
                $arrayResults[] = $row;
            

            mysqli_free_result($result);
            mysqli_close($conn);

            return json_encode($arrayResults);
        } else {
            $arrayResults['result'] = false;
            return json_encode($arrayResults);
        }
    }
?>