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
                <form action="?sort=true">
                    <div class="sortField">
                        <label id="button" for="prijsMin">Prijs</label>
                        <div class="input">
                            <input name="prijsMin" class="inputPrijs" type="number">
                            <label id="paragraaf" for="prijsMax">tot</label>
                            <input name="prijsMax" class="inputPrijs" type="number">
                        </div>
                    </div>

                    <div class="sortField">
                        <label id="button" for="voorraad">beschikbaarheid</label>
                        <div class="input">
                            <input type="checkbox" name="voorraad">
                            <label for="voorraad">Op voorraad</label>
                        </div>
                    </div>

                    <div class="sortSoort">
                        <div class="sortField">
                            <label id="buttonSoort">Cpu</label>
                            <div class="input">

                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="True" name="sort">

                    <input type="submit" value="zoek">
                </form>
            </div>

            <div class="artikelen">

                <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
                <ul id="myUL">

                    <?php

                    // get data from database conn2 = database gip and put them in a list
                    if (isset($_GET['sort'])){
                        $minPrijs = $_GET['prijsMin'];
                        $maxPrijs = $_GET['prijsMax'];

                        $addAND = 0;

                        $sql = "SELECT * FROM artikelen WHERE";

                        if ($minPrijs != NULL){
                            $sql .= " prijs BETWEEN $minPrijs AND $maxPrijs";
                            $addAND++;
                        }

                        if(isset($_GET['voorraad'])) {
                            if ($addAND > 0){
                                $addAND--;
                                $sql += "AND";
                            }
                            $sql .= " beschikbaarheid > 0";
                        }

                        $result = mysqli_query($conn2, $sql);
                    }else{
                        $result = mysqli_query($conn2, "SELECT * FROM artikelen");
                    }

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

    <script src="../main.js">
    </script>

    <script>
        function search() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("h2")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>