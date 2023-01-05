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
            <h2>Registreer</h2>
            <form action="../includes/signup.inc.php" method="post">
                <label for="name">Naam</label>
                <input type="text" name="name" placeholder="Volledige naam">

                <label for="email">E-mail</label>
                <input type="text" name="email" placeholder="E-mail">

                <label for="uid">Gebruikersnaam</label>
                <input type="text" name="uid" placeholder="Gebruikersnaam">

                <label for="pwd">Wachtwoord</label>
                <input type="password" name="pwd" placeholder="Wachtwoord">

                <label for="pwd-repeat">Herhaal wachtwoord</label>
                <input type="password" name="pwd-repeat" placeholder="Herhaal wachtwoord">
                
                <input type="submit" value="Registreer">
            </form>
        </div>
        
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>