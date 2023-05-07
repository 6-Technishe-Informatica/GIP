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
        <?php include '../siteParts/nav.php'; ?>
    </header>

    <main id="winkelWagen">
        <?php
        include '../includes/dbh.inc.php';
        include '../includes/functions.inc.php';

        $klantnummer = $_GET['klantNummer'];
        $totaal = $_GET['totaal'];

        $result = mysqli_query($conn2, "SELECT * FROM winkelwagen WHERE klantNummer = " . $klantnummer . ";"); // haalt alle producten op van de klant

        $teller = 0;

        while ($row = mysqli_fetch_array($result)) { // loopt door alle producten van de klant
            $result2 = mysqli_query($conn2, "SELECT * FROM artikelen WHERE referentieNummer = " . $row['referentieNummer'] . ";"); // haalt alle informatie op van het product
            while ($row2 = mysqli_fetch_array($result2)) { // loopt door alle informatie van het product
                $teller++; // telt het aantal producten op
            }
        }

        echo "<div class='order'>";
        echo "<h1>Bedankt voor uw aankoop!</h1>";
        echo "<h2>U heeft $teller producten in uw winkelwagen</h2>";
        echo "<h3>U heeft een totaal van €$totaal</h3>";
        echo "</div>";

        clearShoppingcard($conn2, $klantnummer); // verwijderd alle producten van de klant
        ?>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>