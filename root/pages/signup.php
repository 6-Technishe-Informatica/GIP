<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include '../siteParts/nav.php'; ?>
    </header>
    <main id="signup">

        <div class="gridSignup">
            <h2>Registreer</h2>
            <form action="../includes/signup.inc.php" method="post">
                <label for="name">Naam</label><br>
                <input type="text" name="name" placeholder="Volledige naam">
                
                <label for="email">E-mail</label><br>
                <input type="text" name="email" placeholder="E-mail">
                
                <label for="uid">Gebruikersnaam</label><br>
                <input type="text" name="uid" placeholder="Gebruikersnaam">
                
                <label for="pwd">Wachtwoord</label><br>
                <input type="password" name="pwd" placeholder="Wachtwoord">
                
                <label for="pwd-repeat">Herhaal wachtwoord</label><br>
                <input type="password" name="pwd-repeat" placeholder="Herhaal wachtwoord">
                
                <!-- <input type="submit" value="Registreer"> -->
                <button type="submit" name="submit">Registreer</button>
            </form>
            <!-- Geeft een foutcode op de pagina -->
            <?php
                if(isset($_GET["error"])) { // als er een error is
                    if($_GET["error"] == "emptyinput") { // als de error emptyinput is
                        echo "<p>Vul alle velden in!</p>";
                    }
                    else if($_GET["error"] == "invaliduid") { // als de error invaliduid is
                        echo "<p>Kies een geldige gebruikersnaam!</p>";
                    }
                    else if($_GET["error"] == "invalidemail") { // als de error invalidemail is
                        echo "<p>Kies een geldig e-mail adres!</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch") { // als de error passwordsdontmatch is
                        echo "<p>Wachtwoorden komen niet overeen!</p>";
                    }
                    else if($_GET["error"] == "stmtfailed") { // als de error stmtfailed is
                        echo "<p>Er is iets fout gegaan, probeer het opnieuw!</p>";
                    }
                    else if($_GET["error"] == "usernametaken") { // als de error usernametaken is
                        echo "<p>Deze gebruikersnaam is al in gebruik!</p>";
                    }
                    else if($_GET["error"] == "none") { // als de error none is
                        echo "<p>U bent geregistreerd!</p>";
                    }
                }
            ?>
        </div>

        
        
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>