<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/index.css">

    <title>Tech point</title>
</head>

<body>
    <header>
        <?php include 'siteParts/nav.php'; // includes nav bar ?> 
    </header>
    <main>
        <article class="hero">
            <h2>Tech <span>Point</span></h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil accusantium corporis quidem, aut cupiditate voluptatum, adipisci ea consequuntur officiis temporibus eveniet perferendis laborum sunt fuga placeat sequi pariatur non impedit!</p>
        </article>

        <h2 class="dealsText">Special deals</h2>
        <div class="deals">
            <?php
                //connect to database
                $servername = "localhost";
                $username = "root";
                $password = "usbw";

                $conn = new mysqli($servername, $username, $password, "gip"); // connection command mysql database

                if (!$conn) { // shows error when connection failed
                    echo "Fout: geen connectie naar database. <br>"; 
                    echo "Error: " . mysqli_connect_error() . "<br>";
                    exit();
                }

                $res = mysqli_query($conn, "SELECT * FROM artikelen WHERE specialDeal = 1"); // query selctor to get artikelen with special deals set to true


                

                while ($productDeal = mysqli_fetch_assoc($res)) { // loop to all product with special deals and put them in a card on index.php -> Special deals
                    echo '<a href="pages/product.php?productName=' . $productDeal['artikelNaam'] .'&referentieNummer=' . $productDeal["referentieNummer"] .'">';
                    echo '<article>';
                    echo '<img src="images/productPicture.webp" alt="productPicture">';
                    echo '<p>' . $productDeal['brand'] . '</p>';
                    echo '<div class="gridNamePrice dealsPrice">';
                    echo '<h3>' . $productDeal['artikelNaam'] . '</h3>';

                    //check if there is a new price
                    if ($productDeal['prijsNieuw'] != 0) {
                        echo '<p class="ouldPrice">' . $productDeal['prijs'] . '</p>';
                        echo '<p class="newPrice">' . $productDeal['prijsNieuw'] . '</p>';
                    }else{
                        echo '<p class="newPrice">' . $productDeal['prijs'] . '</p>';
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

                $res2 = mysqli_query($conn, "SELECT * FROM artikelen WHERE discover = 1"); // query selctor to get artikelen with discover set to true

                while ($productDiscover = mysqli_fetch_assoc($res2)) { // loop to all product with discover and put them in a card on index.php -> ondek
                    echo '<a href="pages/product.php?productName=' . $productDiscover['artikelNaam'] .'&referentieNummer=' . $productDiscover["referentieNummer"] .'">';
                    echo '<article>';
                    echo '<img src="images/productPicture.webp" alt="productPicture">';
                    echo '<p>' . $productDiscover['brand'] . '</p>';
                    echo '<div class="gridNamePrice dealsPrice">';
                    echo '<h3>' . $productDiscover['artikelNaam'] . '</h3>';

                    //check if there is a new price
                    if ($productDiscover['prijsNieuw'] != 0) {
                        echo '<p class="ouldPrice">' . $productDiscover['prijs'] . '</p>';
                        echo '<p class="newPrice">' . $productDiscover['prijsNieuw'] . '</p>';
                    }else{
                        echo '<p class="newPrice">' . $productDiscover['prijs'] . '</p>';
                    }

                    echo '</div>';
                    echo '</article>';
                    echo '</a>';
                }

                mysqli_close($conn); // close database connection
            ?>
        </div>

        <article class="overOns">
            <h2 class="dealsText">Meer dan enkel een Technologie winkel</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vitae obcaecati impedit aliquid quod, tempora quibusdam quidem excepturi labore cumque quas nostrum dolorem deserunt accusamus accusantium ipsam quisquam corrupti corporis. Excepturi!</p>
        </article>
    </main>
    <footer>
        <?php include 'siteParts/contact.php'; // includes footer?>
    </footer>
</body>

</html>