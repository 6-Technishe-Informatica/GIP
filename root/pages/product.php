<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title><?php echo $_GET['productName'] ?></title>
</head>

<body id="product">
    <header>
        <?php include '../siteParts/nav.php'; ?>
    </header>
    <main id="products">
        <article>
            <?php
            //connect to database
            require '../includes/dbh.inc.php';

            $referentieNummer = $_GET['referentieNummer'];

            $result = mysqli_query($conn2, "SELECT * FROM artikelen WHERE referentieNummer = $referentieNummer"); // haalt alle informatie op van het product

            while ($row = mysqli_fetch_array($result)) { // loopt door alle informatie van het product
                $productDiscription = $row['artikelBeschrijving'];
                $prijsNieuw = "";
                if ($row['prijsNieuw'] !== "") { // kijkt of er een nieuwe prijs is
                    $prijs = $row['prijs'];
                    $prijsNieuw = $row['prijsNieuw'];
                } else { // als er geen nieuwe prijs is
                    $prijs = $row['prijs'];
                }
                $stock = $row['beschikbaarheid'];
                $product = $row['artikelNaam'];
            }

            ?>

            <h2 class="productName"><?php echo $product; ?></h2>

            <div class="images">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <?php echo '<img src="../images/productImages/' . $referentieNummer . '_1.webp' . '" alt="productPicture">'; ?>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <?php echo '<img src="../images/productImages/' . $referentieNummer . '_2.webp' . '" alt="productPicture">'; ?>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <?php echo '<img src="../images/productImages/' . $referentieNummer . '_3.webp' . '" alt="productPicture">'; ?>
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>

            <div class="shop">
                <?php
                echo '<div class="productPrice">';
                if ($prijsNieuw !== "") { // kijkt of er een nieuwe prijs is
                    echo '<p class="ouldPrice">€ ' . $prijs . '</p>'; // als er een nieuwe prijs is laat hij de oude prijs zien
                    echo '<p class="newPrice">€ ' . $prijsNieuw . '</p>'; // en de nieuwe prijs
                } else {
                    echo '<p class="newPrice">€ ' . $prijs . '</p>'; // als er geen nieuwe prijs is laat hij alleen de nieuwe prijs zien
                }

                echo '</div>';

                if ($stock > 0) { // kijkt of het product op vooraad is
                    echo "<p class='stock'>Op vooraad</p>"; // als het product op vooraad is laat hij dit zien
                } else {
                    echo "<p class='stock out'>Niet op vooraad</p>"; // als het product niet op vooraad is laat hij dit zien
                }
                ?>

                <a class="winkelMand" href="../includes/shoppingCard.inc.php?addToCard=True&referentieNummer=<?php echo $referentieNummer ?>"><img src="../images/winkelwagen.svg" alt="winkelwagen"> WinkelMandje</a>
            </div>
        </article>
        <div class="detailsDiscription">
            <div class="buttons">
                <a id="discription-button" class="active">Productomschrijving</a>
                <a id="details-button">Details</a>
            </div>


            <p id="discription" class="discription active"><?php echo $productDiscription; ?></p>
            <div id="details" class="details">
                <?php

                $result = mysqli_query($conn2, "SELECT * FROM specificaties WHERE referentieNummer = $referentieNummer"); // haalt alle informatie op van het product

                while ($row = mysqli_fetch_array($result)) { // loopt door alle informatie van het product
                    $val1 = $row['val1'];
                    $val2 = $row['val2'];
                    $val3 = $row['val3'];
                    $val4 = $row['val4'];
                    $val5 = $row['val5'];
                    $soort = $row['soort'];
                }

                $result2 = mysqli_query($conn2, "SELECT * FROM soorten WHERE soort = '$soort'"); // haalt alle informatie op van het product

                if (!$result2) { // kijkt of er een error is
                    trigger_error(mysqli_error($conn2), E_USER_ERROR); // als er een error is laat hij dit zien
                }

                while ($row = mysqli_fetch_array($result2)) { // loopt door alle informatie van het product
                    $spec1 = $row['spec1'];
                    $spec2 = $row['spec2'];
                    $spec3 = $row['spec3'];
                    $spec4 = $row['spec4'];
                    $spec5 = $row['spec5'];
                }



                if ($spec1 != "") { // kijkt of er een spec is
                    echo "<strong>$spec1:</strong>" . "<p>$val1</p>"; // als er een spec is laat hij dit zien
                }
                if ($spec2 != "") { // kijkt of er een spec is
                    echo "<strong>$spec2:</strong>" . "<p>$val2</p>"; // als er een spec is laat hij dit zien 
                }
                if ($spec3 != "") { // kijkt of er een spec is
                    echo "<strong>$spec3:</strong>" . "<p>$val3</p>"; // als er een spec is laat hij dit zien
                }
                if ($spec4 != "") { // kijkt of er een spec is
                    echo "<strong>$spec4:</strong>" . "<p>$val4</p>"; // als er een spec is laat hij dit zien
                }
                if ($spec5 != "") { // kijkt of er een spec is
                    echo "<strong>$spec5:</strong>" . "<p>$val5</p>"; // als er een spec is laat hij dit zien
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>