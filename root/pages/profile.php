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
    <main id="profile">
        <aside id="navigatie">
            <nav>
                <h2>
                    <!-- toont de naam van de persoon boven de navigatie -->
                    
                        <?php echo $_SESSION["useruid"]; ?>
                </h2>
                <ul>
                    <li><a href="#gegevens">Account details</a></li>
                </ul>
                <ul>
                    <li><a href="">Beveiliging</a></li>
                </ul>
                <ul>
                    <li><a href="">Facturen</a></li>
                </ul>
                <ul>
                    <li><a href="">Bestellingen</a></li>
                </ul>
            </nav>
        </aside>

        <form id="gegevens" action="../profile.inc.php" method="POST">

            <h2>Pas jouw gegevens aan</h2>

            <label for="naam">Naam <br>
                <input type="text" name="naam" id="naam">
            </label>
            <br>
            <label for="email">e-mail<br>
                <input type="text" name="email" id="email">
            </label><br>

            <label for="gebruikersnaam">Gebruikersnaam<br>
                <input type="text" name="gebruikersnaam" id="gebruikersnaam">
            </label><br>

            <label for="wachtwoord">Wachtwoord:<br>
                <input type="text" name="wachtwoord" id="wachtwoord">
            </label><br>

            <button type="submit" name="account-gegevens">Pas aan</button>
        </form>

    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>