<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body id="profile">
    <header>
        <?php include '../siteParts/nav.php'; ?>
    </header>
    <main>

        <nav class="navProfile">
            <ul>
                <li><button id="btnNaam">Naam</button></li>
            </ul>
            <ul>
                <li><button id="btnGebruikersnaam">Gebruikersnaam</button></li>
            </ul>
            <ul>
                <li><button id="btnEmail">Email</button></li>
            </ul>
            <ul>
                <li><button id="btnWachtwoord">Wachtwoord</button></li>
            </ul>
        </nav>

        <div id="gegevens">
            <div id="start">
                <h1>
                    <!-- toont de naam van de persoon boven de navigatie -->
                    <?php echo "Hallo, " . $_SESSION["useruid"]; ?>
                </h1>
                <hr>
                <h2>Pas jouw gegevens aan</h2>
                <br>
                <p>Kies 1 van de opties uit de navigatiebalk en pas je gegvens aan. </p>
                <p>Bij problemen kan je altijd terecht bij ons via de <a href="../pages/contact.php">contact pagina</a>.</p>
            </div>
            <div id="naam" class="hidden">
                <form class="profileChange" action="../includes/profile.inc.php" method="post">
                    <h2>Wijzig je naam</h2>
                    <hr>
                    <div class="profileGrid">
                        <label for="name">Naam </label>
                        <input type="text" name="name" placeholder="Nieuwe naam">
                    </div>
                    <button type="submit" name="submit-naam">Pas aan</button>
                </form>
            </div>
            <div id="gebruikersnaam" class="hidden">
                <form class="profileChange" action="../includes/profile.inc.php" method="post">
                    <h2>Wijzig je gebruikersnaam</h2>
                    <hr>
                    <div class="profileGrid">
                        <label for="name">Gebruikersnaam</label>
                        <input type="text" name="usersUid" placeholder="Nieuwe gebruikersnaam">
                    </div>
                    <button type="submit" name="submit-gebruikersnaam">Pas aan</button>
                </form>
            </div>
            <div id="email" class="hidden">
                <form class="profileChange" action="../includes/profile.inc.php" method="post">
                    <h2>Wijzig je email address</h2>
                    <hr>
                    <div class="profileGrid">
                        <label for="name">Email address</label>
                        <input type="text" name="usersEmail" placeholder="Nieuw email address">
                    </div>
                    <button type="submit" name="submit-email">Pas aan</button>
                </form>
            </div>
            <div id="wachtwoord" class="hidden">
                <form class="profileChange" action="../includes/profile.inc.php" method="post">
                    <h2>Wijzig je wachtwoord</h2>
                    <hr>
                    <div class="profileGrid">
                        <label for="name">Oud Wachtwoord</label>
                        <input type="text" name="usersPwd" placeholder="Oud Wachtwoord">

                        <label for="name">Herhaal oud wachtwoord</label>
                        <input type="text" name="usersPwd-repeat" placeholder="Oud wachtwoord">

                        <label for="name">Nieuw wachtwoord</label>
                        <input type="text" name="usersNewPwd" placeholder="Nieuw wachtwoord">
                    </div>
                    <button type="submit" name="submit-password">Pas aan</button>
                </form>
            </div>

        </div>



    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
    <script src="../main.js"></script>
</body>

</html>