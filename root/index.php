<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#01303f">
    <meta name="description" content="This is an example of a
meta description. This will often show up in search results.">

    <link rel="stylesheet" href="style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include 'siteParts/nav.php'; ?>
    </header>
    <main>
        <article class="hero">
            <h2>Tech <span>Point</span></h2>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "usbw";

            $conn = new mysqli($servername, $username, $password, "gip"); // connectie naar database

            if (!$conn) { // als er geen connectie is
                echo "Fout: geen connectie naar database. <br>"; // geef een foutmelding
                echo "Error: " . mysqli_connect_error() . "<br>"; // geef de foutmelding van de connectie
                exit(); // stop de code
            }

            $text = mysqli_query($conn, "SELECT * FROM admintext"); // haalt de text op

            $textValue = mysqli_fetch_assoc($text); // zet de text in een array

            echo "<p>" . $textValue["frontpage"] . "</p>"; // laat de text zien
            ?>
        </article>

        <div class="mobileCategorie">
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&cpu=on&sort=True"><div>CPU</div></a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&gpu=on&sort=True"><div>GPU</div></a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&moederbord=on&sort=True"><div>Moederbord</div></a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&ram=on&sort=True"><div>RAM</div></a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&case=on&sort=True"><div>Behuizing</div></a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&opslag=on&sort=True"><div>Opslag</div></a>
        </div>

        <h2 class="dealsText">Special deals</h2>
        <div class="deals">
            <?php

            $res = mysqli_query($conn, "SELECT * FROM artikelen WHERE specialDeal = 1"); // haalt alle producten op die in de aanbieding zijn

            while ($productDeal = mysqli_fetch_assoc($res)) { // zet de producten in een array
                echo "<a href='pages/product.php?productName=" . $productDeal['artikelNaam'] . '&referentieNummer=' . $productDeal["referentieNummer"] . "'>"; // maakt een link naar de product pagina
                echo '<article>';
                echo '<img src="images/productImages/' . $productDeal["referentieNummer"] . '_1.webp' . '" alt="productPicture">'; // laat de afbeelding zien
                echo '<p>' . $productDeal['brand'] . '</p>';
                echo '<div class="gridNamePrice dealsPrice">';
                echo '<h3>' . $productDeal['artikelNaam'] . '</h3>'; // laat de naam zien

                if ($productDeal['prijsNieuw'] !== "") { // als er een nieuwe prijs is
                    echo '<p class="ouldPrice">€ ' . $productDeal['prijs'] . '</p>'; // laat de oude prijs zien
                    echo '<p class="newPrice">€ ' . $productDeal['prijsNieuw'] . '</p>'; // laat de nieuwe prijs zien
                } else { // als er geen nieuwe prijs is
                    echo '<p class="newPrice">€ ' . $productDeal['prijs'] . '</p>'; // laat de oude prijs zien
                }

                echo '</div>';
                echo '</article>';
                echo '</a>';
            }
            ?>
        </div>

        <h2 class="dealsText">Ondek</h2>
        <div class="deals">
            <?php

            $res2 = mysqli_query($conn, "SELECT * FROM artikelen WHERE discover = 1"); // haalt alle producten op die in de aanbieding zijn

            while ($productDiscover = mysqli_fetch_assoc($res2)) { // zet de producten in een array
                echo "<a href='pages/product.php?productName=" . $productDiscover['artikelNaam'] . '&referentieNummer=' . $productDiscover["referentieNummer"] . "'>"; // maakt een link naar de product pagina
                echo '<article>';
                echo '<img src="images/productImages/' . $productDiscover["referentieNummer"] . '_1.webp' . '" alt="productPicture">'; // laat de afbeelding zien
                echo '<p>' . $productDiscover['brand'] . '</p>';
                echo '<div class="gridNamePrice dealsPrice">';
                echo '<h3>' . $productDiscover['artikelNaam'] . '</h3>'; // laat de naam zien

                if ($productDiscover['prijsNieuw'] !== "") { // als er een nieuwe prijs is
                    echo '<p class="ouldPrice">€ ' . $productDiscover['prijs'] . '</p>'; // laat de oude prijs zien
                    echo '<p class="newPrice">€ ' . $productDiscover['prijsNieuw'] . '</p>'; // laat de nieuwe prijs zien
                } else { // als er geen nieuwe prijs is
                    echo '<p class="newPrice">€ ' . $productDiscover['prijs'] . '</p>'; // laat de oude prijs zien
                }

                echo '</div>';
                echo '</article>';
                echo '</a>';
            }

            mysqli_close($conn); // sluit de connectie
            ?>
        </div>

        <article class="overOns">
            <h2 class="dealsText">Meer dan enkel een Technologie winkel</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae obcaecati impedit aliquid quod, tempora quibusdam quidem excepturi labore cumque quas nostrum dolorem deserunt accusamus accusantium ipsam quisquam corrupti corporis. Excepturi!</p>
        </article>
    </main>
    <footer>
        <?php include 'siteParts/contact.php'; ?>
    </footer>
</body>

</html>