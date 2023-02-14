<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Artikelen</title>
</head>

<body id="Artikelen">
    <header>
        <?php
        include '../siteParts/nav.php';
        require '../includes/dbh.inc.php'
        ?>
    </header>
    <main>
        <div class="container">
            <div class="sort">
                <form action="#">
                    <div class="sortField">
                        <button id="button">Prijs</button>
                        <div class="input">
                            <input name="prijsMin" class="inputPrijs" type="number">
                            <p id="paragraaf">tot</p>
                            <input name="prijsMax" class="inputPrijs" type="number">
                        </div>
                    </div>

                    <div class="sortField">
                        <button id="button">beschikbaarheid</button>
                        <div class="input">
                            <input type="checkbox" name="voorraad">
                            <label for="voorraad">Op voorraad</label>
                        </div>
                    </div>

                    <div class="sortSoort">
                        <div class="sortField">
                            <button id="buttonSoort">Cpu</button>
                            <div class="input" >

                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="artikelen">

            </div>
        </div>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>