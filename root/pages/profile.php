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
    <main id="profile">

        <div class="container">

            <aside id="navigatie">
                <nav>
                    <h1>
                        <!-- toont de naam van de persoon boven de navigatie -->
                        <?php echo "Hallo, " . $_SESSION["useruid"]; ?> 
                    </h1>

                    <ul><li><button id="btnNaam">Naam</button></li></ul>
                    <ul><li><button id="btnGebruikersnaam">Gebruikersnaam</button></li></ul>
                    <ul><li><button id="btnEmail">Email</button></li></ul>
                    <ul><li><button id="btnWachtwoord">Wachtwoord</button></li></ul>
                </nav>
            </aside>

            <div id="gegevens">
                <div id="start">
                    <h2>Pas jouw gegevens aan</h2>

                    <p>Kies 1 van de opties uit de navigatiebalk en pas je gegvens aan. Bij problemen kan je altijd terecht bij ons via de <a href="../pages/contact.php">contact pagina</a>.</p>
                </div>
                <div id="naam" class="hidden">
                    <form action="../includes/profile.inc.php" method="post">
                        <h2>Wijzig je naam</h2>
                        <label for="name">Naam</label>
                        <input type="text" name="name" placeholder="Volledige naam">
                        <button type="submit" name="submit-naam">Pas aan</button>
                    </form>
                </div>
                <div id="gebruikersnaam" class="hidden">
                    <form action="../includes/profile.inc.php" method="post">
                        <h2>Wijzig je gebruikersnaam</h2>
                        <label for="name">Gebruikersnaam</label>
                        <input type="text" name="usersUid" placeholder="Volledige naam">
                        <button type="submit" name="submit-gebruikersnaam">Pas aan</button>
                    </form>
                </div>
                <div id="email" class="hidden">
                    <form action="../includes/profile.inc.php" method="post">
                        <h2>Wijzig je email address</h2>
                        <label for="name">Email address</label>
                        <input type="text" name="usersEmail" placeholder="Volledige naam">
                        <button type="submit" name="submit-email">Pas aan</button>
                    </form>
                </div>
                <div id="wachtwoord" class="hidden">
                    <form action="../includes/profile.inc.php" method="post">
                        <h2>Wijzig je wachtwoord</h2>
                        <label for="name">Oud Wachtwoord</label>
                        <input type="text" name="usersPwd" placeholder="Volledige naam">

                        <label for="name">Herhaal oud wachtwoord</label>
                        <input type="text" name="usersPwd-repeat" placeholder="Volledige naam">

                        <label for="name">Nieuw wachtwoord</label>
                        <input type="text" name="usersNewPwd" placeholder="Volledige naam">
                        <button type="submit" name="submit-password">Pas aan</button>
                    </form>
                </div>
                
            </div>
            
        </div>

    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
    <script src="../main.js"></script>
</body>

</html>