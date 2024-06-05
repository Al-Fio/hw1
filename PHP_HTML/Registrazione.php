<?php
    require_once('Authentication.php');    
    
    if (authenticated()) {
        header('Location: index.php');
        exit;
    }

    if (!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nome"]) && 
        !empty($_POST["cognome"]) && !empty($_POST["confermaPassword"]) && !empty($_POST["nazione"]) && 
        !empty($_POST["allowInformationNotice"]) && !empty($_POST["allowTermsService"])) {

        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "Beretta") or die(mysqli_error($conn));

        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 

        if (strcmp($_POST["password"], $_POST["confermaPassword"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
        }

        if (count($error) == 0) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $dataNascita = mysqli_real_escape_string($conn, $_POST['dataNascita']);
            $numero = mysqli_real_escape_string($conn, $_POST['numeroTelefono']);
            $nazione = mysqli_real_escape_string($conn, $_POST['nazione']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(email, nome, cognome, dataNascita, numero, nazione,  password) 
                        VALUES('$email', '$nome', '$cognome', '$dataNascita', '$numero', '$nazione', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["ID"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: Login.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);

    } else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='//localhost/hw1/CSS/Registrazione.css'>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src='//localhost/hw1/JS/Registrazione.js' defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link rel="icon" href="//localhost/hw1/Immagini/Icon/Beretta_logo.svg.png">      
        <title>Beretta Registrazione</title>
    </head>
    <body>

        <div id='RegistrazioneDiv'>  
            <a href="index.php"><img src="//localhost/hw1/Immagini/Icon/Full__Blue.svg" alt=""></a>
            

            <?php
                // Verifica la presenza di errori
                if(isset($errore))
                {
                    echo "<p class='errore'>";
                    echo "Registrazione fallita. <br>";
                    echo "Username già in uso.";
                    echo "</p>";
                } else if (isset($registrazione)) {
                    
                }
            ?>

            <main>
                <form name='formRegistrazione' method='post'>
                    <div id='Email' class='border'>
                        <label><input type='text' name='email' placeholder="Email *" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></label>
                        <p class='errore hidden'>Email non valida</p>
                    </div>

                    <div class='wrap border'>
                        <div id='Nome'>
                            <label><input type='text' name='nome' placeholder="Nome *" <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>></label>
                            <p class='errore hidden'>Campo vuoto</p>
                        </div>
                        <div id='Cognome'>
                            <label><input type='text' name='cognome' placeholder='Cognome *' <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>></label>
                            <p class='errore hidden'>Campo vuoto</p>
                        </div>
                    </div>

                    <div id='DataNascita' class='border'>
                        <label><input type='text' name='dataNascita' placeholder='Data di Nascita (YYYY-MM-DD)' <?php if(isset($_POST["dataNascita"])){echo "value=".$_POST["dataNascita"];} ?>></label>
                    </div>
    
                    <div class='wrap border'>
                        <div id='NumeroTelefono'>
                            <label><input type='text' name='numeroTelefono' placeholder='Cellulare' <?php if(isset($_POST["numeroTelefono"])){echo "value=".$_POST["numeroTelefono"];} ?>></label>
                        </div>

                        <div id='Nazione'>
                            <label><input type='text' name='nazione' placeholder='Nazione *' <?php if(isset($_POST["nazione"])){echo "value=".$_POST["nazione"];} ?>></label>
                            <p class='errore hidden'>Campo vuoto</p>
                        </div>
                    </div>

                    <div class='wrap border'>
                        <div id='Password'>
                            <label><input type='password' name='password' placeholder='Password *'></label>
                            <p class='errore hidden'>Campo vuoto</p>
                        </div>
                        <div id='ConfermaPassword'>
                            <label><input type='password' name='confermaPassword' placeholder='Conferma password *'></label>
                            <p class='errore hidden'>Campo vuoto</p>
                            <p class='errore hidden'>Le due password non coincidono</p>
                        </div>
                    </div>

                    <?php if(isset($error)) {
                        foreach($error as $err) {
                            echo "<div class='errore'><span>".$err."</span></div>";
                        }
                    } ?>

                    <div id='InformationNotice' class="allow"> 
                        <label for='allow'>
                            <input type='checkbox' name='allowInformationNotice' value="1">
                            * I declare that I have read and understood the
                            <a href="" target="_blank">Information Notice</a>
                        </label>

                        <p class='errore hidden'>Devi accettare i termini</p>
                    </div>

                    <div id='TermsService' class="allow"> 
                        <label for='allow'>
                            <input type='checkbox' name='allowTermsService' value="1">
                            * I agree with the<a href="" target="_blank">Terms of Service</a>
                        </label>
                        
                        <p class='errore hidden'>Devi accettare i termini</p>
                    </div>

                    <div class='flexCenter'>
                        <label id='RegistrazioneButton'><input class='submit' type='submit' value='REGISTRAZIONE'></label>
                    </div>
                </form>
            </main>
        </div> 
    </body>
</html>
