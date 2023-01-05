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
            <form action="signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Volledige naam">
                <input type="text" name="email" placeholder="E-mail">
                <input type="text" name="uid" placeholder="Gebruikersnaam">
                <input type="password" name="pwd" placeholder="Wachtwoord">
                <input type="password" name="pwd-repeat" placeholder="Herhaal wachtwoord">
                <button type="submit" name="submit">Registreer</button>
            </form>
        </div>
        
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>