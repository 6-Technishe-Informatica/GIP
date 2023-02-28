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
                            <div class="input">

                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="artikelen">
                <ul>

                    <?php
                    // get data from database conn2 = database gip and put them in a list
                    $result = mysqli_query($conn2, "SELECT * FROM artikelen");

                    // put result in a list
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li>';
                        echo '<a href="../pages/product.php?productName=' . $row['artikelNaam'] . '&referentieNummer=' . $row["referentieNummer"] . '">';
                        echo '<div class="artikel">';
                        echo '<img src="../images/productImages/' . $row["referentieNummer"] . '_1.webp' . '" alt="productPicture">';
                        echo '<h2 class="titel">' . $row['artikelNaam'] . '</h2>';

                        $artikelBeschrijving = $row['artikelBeschrijving'];

                        if (strlen($artikelBeschrijving) > 300) // if you want to show 15 characters
                        {
                            $maxLength = 300;
                            $artikelBeschrijving = substr($artikelBeschrijving, 0, $maxLength);
                            $artikelBeschrijving .= " ...";
                        }


                        echo '<p class="beschrijving">' . $artikelBeschrijving . '</p>';
                        echo '<div class="prijs">';
                        if ($row['prijsNieuw'] !== "") {
                            echo '<p class="ouldPrice">€ ' . $row['prijs'] . '</p>';
                            echo '<p class="newPrice">€ ' . $row['prijsNieuw'] . '</p>';
                        } else {
                            echo '<p class="newPrice">€ ' . $row['prijs'] . '</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>