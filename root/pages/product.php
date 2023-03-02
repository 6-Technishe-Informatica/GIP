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

            $result = mysqli_query($conn2, "SELECT * FROM artikelen WHERE referentieNummer = $referentieNummer");

            while ($row = mysqli_fetch_array($result)) {
                $productDiscription = $row['artikelBeschrijving'];
                $prijsNieuw = "";
                if ($row['prijsNieuw'] !== "") {
                    $prijs = $row['prijs'];
                    $prijsNieuw = $row['prijsNieuw'];
                } else {
                    $prijs = $row['prijs'];
                }
                $stock = $row['beschikbaarheid'];
            }

            ?>

            <h2 class="productName"><?php echo $_GET['productName']; ?></h2>

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
                if ($prijsNieuw !== "") {
                    echo '<p class="ouldPrice">€ ' . $prijs . '</p>';
                    echo '<p class="newPrice">€ ' . $prijsNieuw . '</p>';
                } else {
                    echo '<p class="newPrice">€ ' . $prijs . '</p>';
                }

                echo '</div>';

                if ($stock > 0) {
                    echo "<p class='stock'>Op vooraad</p>";
                } else {
                    echo "<p class='stock out'>Niet op vooraad</p>";
                }
                ?>

                <button class="winkelMand"><img src="../images/winkelwagen.svg" alt="winkelwagen"> WinkelMandje</button>
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

                $result = mysqli_query($conn2, "SELECT * FROM specificaties WHERE referentieNummer = $referentieNummer");

                while ($row = mysqli_fetch_array($result)) {
                    $val1 = $row['val1'];
                    $val2 = $row['val2'];
                    $val3 = $row['val3'];
                    $val4 = $row['val4'];
                    $val5 = $row['val5'];
                    $soort = $row['soort'];
                }

                $result2 = mysqli_query($conn2, "SELECT * FROM soorten WHERE soort = '$soort'");

                if (!$result2) {
                    trigger_error(mysqli_error($conn2), E_USER_ERROR);
                }

                while ($row = mysqli_fetch_array($result2)) {
                    $spec1 = $row['spec1'];
                    $spec2 = $row['spec2'];
                    $spec3 = $row['spec3'];
                    $spec4 = $row['spec4'];
                    $spec5 = $row['spec5'];
                }



                if ($spec1 != "") {
                    echo "<strong>$spec1:</strong>" . "<p>$val1</p>";
                }
                if ($spec2 != "") {
                    echo "<strong>$spec2:</strong>" . "<p>$val2</p>";
                }
                if ($spec3 != "") {
                    echo "<strong>$spec3:</strong>" . "<p>$val3</p>";
                }
                if ($spec4 != "") {
                    echo "<strong>$spec4:</strong>" . "<p>$val4</p>";
                }
                if ($spec5 != "") {
                    echo "<strong>$spec5:</strong>" . "<p>$val5</p>";
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