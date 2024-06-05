<?php
    session_start();
?>

<html>
    <head>
        <link rel='stylesheet' href='//localhost/hw1/CSS/Carrello.css'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='//localhost/hw1/JS/Carrello.js' defer></script>
        <script>
            <?php
                if(isset($_SESSION['email'])) { echo 'const login = '.$_SESSION['ID'];}
                else { echo 'const login = 0'; }
            ?>
        </script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="icon" href="//localhost/hw1/Immagini/Icon/Beretta_logo.svg.png">      
        <title>Beretta Carrello</title>
    </head>
    <body <?php if(!isset($_SESSION['email'])){echo "class='noScroll'";} ?>>
    <?php
        if(!isset($_SESSION['email']))
        {
            echo '<div class="Errore">';
            echo '<a href="index.php" class="logo"><img src="//localhost/hw1/Immagini/Icon/Full__Blue.svg" alt=""></a>';
            echo '<h1>Non hai effettuato il Login</h1>';
            echo "<p class='log'><a href='login.php'>Accedi</a></p>";
            echo "<p class='log'><a href='Registrazione.php'>Registrati</a></p>";
            echo '</div>';
        } else {
            echo '<a href="index.php" class="logo"><img src="//localhost/hw1/Immagini/Icon/Full__Blue.svg" alt=""></a>';
            echo '<div id = "ContenitoreProdotti"></div>';
        }
    ?>

    </body>
</html>