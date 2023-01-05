<!DOCTYPE html>
<html lang="en">

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
            <form action="../includes/login.inc.php" method="post">

                <label for="name">Naam</label>
                <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">

                <label for="pwd">Wachtwoord</label>
                <input type="password" name="pwd" placeholder="Wachtwoord">
                
                <input type="submit" value="Log in">
            </form>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<p>Vul alle velden in!</p>";
                    }
                    else if($_GET["error"] == "wronglogin") {
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