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
    <main id="winkelWagen">
        <?php
        //check if get referentieNummer is set
        $totaalPrijs = 0;

        if (isset($_GET['referentieNummer'])) { // als er een referentieNummer is
            addToShoppingCard($conn2); // voeg het product toe aan de winkelwagen
            $totaalPrijs = showShoppingCard($conn2); // laat de winkelwagen zien
        } else {
            $totaalPrijs = showShoppingCard($conn2); // laat de winkelwagen zien
        }
        ?>

        <div class="checkout">
            <a href="../pages/checkout.php?klantNummer=<?php echo $_SESSION['userid']; ?>&totaal=<?php echo $totaalPrijs; ?>" class="checkoutButton">Checkout</a>
            <p>Totaal: €<span><?php echo $totaalPrijs; ?></span></p>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>