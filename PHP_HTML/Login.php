<?php
    require_once('Authentication.php');    
    
    if (authenticated()) {
        header('Location: index.php');
        exit;
    }
    
    if(isset($_POST["email"]) && isset($_POST["password"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "Beretta") or die(mysqli_connect_error());

        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "SELECT * FROM users WHERE email = '".$email."'";
        $res = mysqli_query($conn, $query);
    
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $errore['noRegistrato'] = false;

            if(password_verify($_POST['password'], $row['password'])) {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["ID"] = $row['ID'];
                $errore['password'] = true;
                header("Location: index.php");
                exit;
            } else {
                $errore['password'] = true;
            }
        } else {
            $errore['noRegistrato'] = true;
            $errore['password'] = false;
        }
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='//localhost/hw1/CSS/Login.css'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='//localhost/hw1/JS/Login.js' defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="icon" href="//localhost/hw1/Immagini/Icon/Beretta_logo.svg.png">      
        <title>Beretta login</title>
    </head>
    <body>

        <div id='LoginDiv' class='flexCenter directionColumn'>   
            <a href="index.php"><img src="//localhost/hw1/Immagini/Icon/Full__Blue.svg" alt=""></a>
            <?php
                if(isset($errore))
                {
                    echo "<p id='ErroreCredenziali' class='errore flexCenter'>";
                    echo "Credenziali non valide. <br>";
                    echo "Nome utente o password errate.";
                    echo "</p>";
                }
            ?>

            <p id='ErroreVuoto' class='hidden errore flexCenter'>
                Compila tutti i campi!
            </p>

            <main>
                <form name='formLogin' method='post' class='flexCenter directionColumn'>
                    <p>
                        <label><img src="//localhost/hw1/Immagini/Icon/email.png" alt=""><input type='text' name='email' placeholder="Email" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></label>
                    </p>
                    <?php
                        if(isset($errore)) if($errore['noRegistrato']) echo '<p class = "errore">Email non valida</p>';
                    ?>
                    <p>
                        <label><img src="//localhost/hw1/Immagini/Icon/password.png" alt=""><input type='password' name='password' placeholder='Password' value=''></label>
                    </p>
                    <?php
                        if(isset($errore)) if($errore['password'] && !$errore['noRegistrato']) echo '<p class = "errore">Password non valida</p>';
                    ?>
                    <p>
                        <label class='login flexCenter'><input class='submit' type='submit' value='SIGN IN'></label>
                    </p>
                </form>
                <div id='Registrazione'>
                    <a href="Registrazione.php">Registrati</a>
                </div>
            </main>
        </div> 
    </body>
</html>