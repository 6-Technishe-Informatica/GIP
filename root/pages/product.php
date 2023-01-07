<?php
    session_start(); // start session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title><?php echo $_GET['productName'] // shows product name in page title?></title>
</head>

<body id="product">
    <header>
        <?php include '../siteParts/nav.php'; // includes navbar?>
    </header>
    <main id="products">
        <article>
            <?php
            //connect to database
            $servername = "localhost";
            $username = "root";
            $password = "usbw";

            $prijs = 0; // price
            $stock = 0; // stock
            $productDiscription = ""; // product discription

            $conn = new mysqli($servername, $username, $password, "gip"); // connect to database

            if (!$conn) { // if there is no connection give error
                echo "Fout: geen connectie naar database. <br>";
                echo "Error: " . mysqli_connect_error() . "<br>";
                exit();
            }

            $referentieNummer = $_GET['referentieNummer']; // get referentie nummer

            $result = mysqli_query($conn, "SELECT * FROM artikelen WHERE referentieNummer = $referentieNummer"); // get data from database where referentie nummer is the same as the referentie nummer from the url

            while ($row = mysqli_fetch_array($result)) { // while there is data in the database
                $productDiscription = $row['artikelBeschrijving']; // get the data
                $prijs = $row['prijs']; // get the data
                $stock = $row['beschikbaarheid']; // get the data
            }

            ?>

            <h2 class="productName"><?php echo $_GET['productName']; // show product name
                                    ?></h2>

            <div class="images">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="../images/productPicture.webp" style="width:100%">
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
                <p class="price"><?php echo $prijs // show price?></p>

                <?php
                if ($stock > 0) { // if stock is more than 0 show op vooraad
                    echo "<p class='stock'>Op vooraad</p>";
                } else { // if stock is 0 or less show n niet op vooraad
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


            <p id="discription" class="discription active"><?php echo $productDiscription; // shows product discrition?></p>
            <div id="details" class="details">
                <?php
                foreach ($details as $key => $value) { // shows product details
                    echo "<strong>" . $key . "</strong><p>" . $value . "</p>";
                }
                ?>
            </div>
        </div>
    </main>

    <footer>
        <?php include '../siteParts/contact.php'; // includes footer?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>