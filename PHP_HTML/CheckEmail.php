<?php
    if (!isset($_GET["q"])) exit;

    $conn = mysqli_connect("localhost", "root", "", "Beretta") or die(mysqli_error($conn));;

    $email = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT email FROM users WHERE email = '$email'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>