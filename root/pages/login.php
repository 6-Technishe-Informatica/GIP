<?php
    session_start(); // start session
?>
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
        <?php include '../siteParts/nav.php'; // include nav?>
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
                if(isset($_GET["error"])) { // if there is an error
                    if($_GET["error"] == "emptyinput") { // if the error is empty input
                        echo "<p>Vul alle velden in!</p>"; // echo error message
                    }
                    else if($_GET["error"] == "wronglogin") { // if the error is wrong login
                        echo "<p>Verkeerde login informatie!</p>"; // echo error message
                    }
                }
            ?>
        </div>
        
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; // include footer?>
    </footer>
</body>

</html>
</html>