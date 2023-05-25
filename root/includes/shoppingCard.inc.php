<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add to shopping card</title>

    <link rel="stylesheet" href="../style/index.css">
</head>
<main id="winkelWagen">
    <?php
    session_start();

    include 'dbh.inc.php';
    include 'functions.inc.php';

    $referentieNummer = $_GET['referentieNummer']; // haalt het referentie nummer op

    if (isset($_GET['addToCard'])) { // als er een referentieNummer is
        addToShoppingCard($conn2, $referentieNummer); // voeg het product toe aan de winkelwagen

        header("Location: ../pages/../pages/product.php?referentieNummer=$referentieNummer"); // stuurt de gebruiker terug naar de winkelwagen pagina
    }

    if (isset($_GET['clear'])) { // asl clear is gezet
        $klantNummer = $_GET['klantNummer']; // haalt het klant nummer op

        $sql = "DELETE FROM winkelwagen WHERE referentieNummer = $referentieNummer AND klantNummer = $klantNummer"; // verwijderd het product uit de winkelwagen
        mysqli_query($conn2, $sql); // voert de query uit

        header("Location: ../pages/shoppingCard.php"); // stuurt de gebruiker terug naar de winkelwagen pagina   
    }

    echo "<a href='../pages/product.php?referentieNummer=" . $referentieNummer . "' class='back'>Terug naar Product</a>"
    ?>
</main>

</html>