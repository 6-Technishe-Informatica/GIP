<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Winkelwagen</title>
</head>

<body id="card">
    <header>
        <?php 
        include '../siteParts/nav.php'; 
        include '../includes/dbh.inc.php';
        include '../includes/functions.inc.php';
        ?>
    </header>
    <main>
        <?php
            //check if get referentieNummer is set

            if (isset($_GET['referentieNummer'])) {
                addToShoppingCard($conn2);
            } else {
                showShoppingCard($conn2);
            }
        ?>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>