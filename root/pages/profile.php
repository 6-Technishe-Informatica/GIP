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

        <div class="container">

            <aside id="navigatie">
                <nav>
                    <h2>
                        <!-- toont de naam van de persoon boven de navigatie -->
                        <?php echo $_SESSION["useruid"]; ?>
                    </h2>

                    <ul><li><a href="#gegevens">Naam</a></li></ul>
                    <ul><li><a href="">Gebruikersnaam</a></li></ul>
                    <ul><li><a href="">Email</a></li></ul>
                    <ul><li><a href="">Wachtwoord</a></li></ul>
                </nav>
            </aside>

            <div id="gegevens">
                <div id="naam">
                    <form action="../includes/profile.inc.php" method="post">
                        
                        <label for="name">Naam</label>
                        <input type="text" name="name" placeholder="Volledige naam">
                        <!-- <input type="submit" value="Registreer"> -->
                        <button type="submit" name="submit-naam">Pas aan</button>
                    </form>
                </div>
                <div id="gebruikersnaam">
                    <form action="../includes/profile.inc.php" method="post">
                    
                    <label for="name">Gebruikersnaam</label>
                    <input type="text" name="usersUid" placeholder="Volledige naam">
                    <!-- <input type="submit" value="Registreer"> -->
                    <button type="submit" name="submit-gebruikersnaam">Pas aan</button>
                    </form>
                </div>
                <div id="email">
                    <form action="../includes/profile.inc.php" method="post">
                    
                    <label for="name">Email address</label>
                    <input type="text" name="usersEmail" placeholder="Volledige naam">
                    <!-- <input type="submit" value="Registreer"> -->
                    <button type="submit" name="submit-email">Pas aan</button>
                    </form>
                </div>
                <div id="wachtwoord">
                    <form action="../includes/profile.inc.php" method="post">
                    
                    <label for="name">Oud Wachtwoord</label>
                    <input type="text" name="usersPwd" placeholder="Volledige naam">

                    <label for="name">Herhaal oud wachtwoord</label>
                    <input type="text" name="usersPwd-repeat" placeholder="Volledige naam">

                    <label for="name">Nieuw wachtwoord</label>
                    <input type="text" name="usersNewPwd" placeholder="Volledige naam">
                    <!-- <input type="submit" value="Registreer"> -->
                    <button type="submit" name="submit-password">Pas aan</button>
                    </form>
                </div>
                
            </div>
            
        </div>

    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>