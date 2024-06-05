<?php
    echo search($_POST['ricerca']);

    function search($categoria) {
        $conn = mysqli_connect('localhost','root','','Beretta') or die(mysqli_connect_error());

        $query = "SELECT * FROM prodotti WHERE categoria = '".$categoria."'";

        $result = mysqli_query($conn, $query) or die(mysqli_error());

        $arrayResults = array();
        while($row = mysqli_fetch_assoc($result)) 
            $arrayResults[] = $row;

        mysqli_free_result($result);
        mysqli_close($conn);

        return json_encode($arrayResults);
    }
?>