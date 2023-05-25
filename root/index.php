<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#01303f">
    <meta name="description" content="Onze webshop is een uitgebreid online platform waar u een breed scala aan producten kunt ontdekken en kopen. Met een gebruiksvriendelijke interface en intuïtieve navigatie biedt onze webshop een naadloze winkelervaring. Van elektronica en mode tot huishoudelijke apparaten en accessoires, u vindt hier alles wat u nodig heeft.">

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
            include 'includes/dbh.inc.php'; // maakt connectie met de database

            $text = mysqli_query($conn2, "SELECT * FROM admintext"); // haalt de text op

            $textValue = mysqli_fetch_assoc($text); // zet de text in een array

            echo "<p>" . $textValue["frontpage"] . "</p>"; // laat de text zien
            ?>
        </article>

        <div class="mobileCategorie">
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&cpu=on&sort=True">
                <div>CPU</div>
            </a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&gpu=on&sort=True">
                <div>GPU</div>
            </a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&moederbord=on&sort=True">
                <div>Moederbord</div>
            </a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&ram=on&sort=True">
                <div>RAM</div>
            </a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&case=on&sort=True">
                <div>Behuizing</div>
            </a>
            <a href="pages/artikelen.php?prijsMin=&prijsMax=&opslag=on&sort=True">
                <div>Opslag</div>
            </a>
        </div>

        <h2 class="dealsText">Special deals</h2>
        <div class="deals">
            <?php

            $res = mysqli_query($conn2, "SELECT * FROM artikelen WHERE specialDeal = 1"); // haalt alle producten op die in de aanbieding zijn

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

            $res2 = mysqli_query($conn2, "SELECT * FROM artikelen WHERE discover = 1"); // haalt alle producten op die in de aanbieding zijn

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
            ?>
        </div>

        <article class="overOns">
            <h2 class="dealsText tekstOverOns">Meer dan enkel een Technologie winkel</h2>
            <p>
                Welkom bij onze winkel, waar technologie tot leven komt. We zijn meer dan alleen een technologiewinkel; we
                zijn een bestemming voor innovatie, inspiratie en interactie. Ontdek de nieuwste gadgets, verken cutting-edge
                apparaten en laat je meeslepen door de mogelijkheden die technologie te bieden heeft. Of je nu een expert bent
                of nieuw bent in de wereld van tech, ons toegewijde team staat klaar om je te helpen bij het vinden van de perfecte
                oplossing voor jouw behoeften. Stap binnen en ervaar de spannende reis die begint bij onze winkel en eindigt met jouw
                technologische verwezenlijkingen.
            </p>
        </article>
    </main>
    <footer>
        <?php include 'siteParts/contact.php'; ?>
    </footer>
</body>

</html>