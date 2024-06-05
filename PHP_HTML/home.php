<?php

    // Avvia la sessione
    session_start();
    // Verifica se l'utente è loggato
    if(!isset($_SESSION['username']))
    {
        // Vai alla login
        header("Location: login.php");
        exit;
    }

?>

<html>
    <head>
    </head>
    <body>
        <h1>Benvenuto <?php echo $_SESSION["username"]; ?>!</h1>
        <p><a href='index.php'>Torna al sito</a></p>
        <p><a href='logout.php'>Esci dalla sessione</a></p>
    </body>
</html>