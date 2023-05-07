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
            <h2>Log in</h2>
            <form action="../includes/login.inc.php" method="post" enctype="multipart/form-data">

                <label for="uid">Naam</label>
                <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">

                <label for="pwd">Wachtwoord</label>
                <input type="password" name="pwd" placeholder="Wachtwoord">
                
                <button type="submit" name="login-submit">Log in</button>
            </form>
            <?php
                if(isset($_GET["error"])) { // als er een error is
                    if($_GET["error"] == "emptyinput") {  // als de error emptyinput is
                        echo "<p>Vul alle velden in!</p>"; 
                    }
                    else if($_GET["error"] == "wronglogin") { // als de error wronglogin is
                        echo "<p>Verkeerde login informatie!</p>";
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
</html>