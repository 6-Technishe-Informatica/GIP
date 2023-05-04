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

        $result = mysqli_query($conn2, "SELECT * FROM winkelwagen WHERE klantNummer = " . $klantnummer . ";");

        $teller = 0;

        while ($row = mysqli_fetch_array($result)) {
            $result2 = mysqli_query($conn2, "SELECT * FROM artikelen WHERE referentieNummer = " . $row['referentieNummer'] . ";");
            while ($row2 = mysqli_fetch_array($result2)) {
                $teller++;
            }
        }

        echo "<div class='order'>";
        echo "<h1>Bedankt voor uw aankoop!</h1>";
        echo "<h2>U heeft $teller producten in uw winkelwagen</h2>";
        echo "<h3>U heeft een totaal van €$totaal</h3>";
        echo "</div>";

        clearShoppingcard($conn2, $klantnummer);
        ?>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>