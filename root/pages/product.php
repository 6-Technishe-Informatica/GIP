<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <script src="http://code.jquery.com/jquery-3.6.3.min.js"></script>

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
            $servername = "localhost";
            $username = "root";
            $password = "usbw";

            $prijs = 0;
            $stock = 0;
            $productDiscription = "";

            $conn = new mysqli($servername, $username, $password, "gip");

            if (!$conn) {
                echo "Fout: geen connectie naar database. <br>";
                echo "Error: " . mysqli_connect_error() . "<br>";
                exit();
            }

            $referentieNummer = $_GET['referentieNummer'];

            $result = mysqli_query($conn, "SELECT * FROM artikelen WHERE referentieNummer = $referentieNummer");

            while ($row = mysqli_fetch_array($result)) {
                $productDiscription = $row['artikelBeschrijving'];
                $prijs = $row['prijs'];
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
                <p class="price"><?php echo $prijs ?></p>

                <?php
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
                $result = mysqli_query($conn, "SELECT * FROM specificaties WHERE referentieNummer = $referentieNummer");

                while ($row = mysqli_fetch_array($result)) {
                    $val1 = $row['val1'];
                    $val2 = $row['val2'];
                    $val3 = $row['val3'];
                    $val4 = $row['val4'];
                    $val5 = $row['val5'];
                    $soort = $row['soort'];
                }

                // fix this part of the code

                $result2 = mysqli_query($conn, "SELECT * FROM soorten WHERE soort = $soort");

                while ($row = mysqli_fetch_array($result2)) {
                    $spec1 = $row['spec1'];
                    $spec2 = $row['spec2'];
                    $spec3 = $row['spec3'];
                    $spec4 = $row['spec4'];
                    $spec5 = $row['spec5'];
                }

                

                echo "<p>$spec1: $val1</p>";
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