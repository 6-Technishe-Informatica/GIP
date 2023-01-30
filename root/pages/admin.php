<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body id="admin">
    <header>
        <?php include '../siteParts/nav.php'; ?>

        <?php

            if ($_SESSION["useruid"] != "Manu" || $_SESSION["useruid"] != "Quinten"){
                $conn= mysqli_connect("localhost", "root", "usbw", "gip");
            }else{
                header("location: ../index.php");
            }
        ?>
    </header>
    <main>

        <!-- text main page test -->

        <h2>Pas de text aan</h2>

        <div class="form">
            <form action="../includes/admin.inc.php" method="POST">
                <label for="text">verandering: </label>
                <textarea name="text" id="text" cols="30" rows="10"><?php
                        $text = mysqli_query($conn, "SELECT * FROM admintext");
                        $textValue = mysqli_fetch_assoc($text);

                        echo $textValue["frontpage"];
                    ?></textarea>
                <button type="submit" name="submit-text">pas aan</button>
            </form>
            <!-- foutcode -->
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<p>Vul alle velden in!</p>";
                    }
                }
            ?>
        </div>

        
        <!-- einde test -->
        <h2>Voeg artikel toe</h2>

        <div class="gridArtikelsButtons">
            <nav class="buttons">
                <button id="Cpu">CPU</button>
                <button id="Gpu">GPU</button>
                <button id="Ram">RAM</button>
                <button id="Storage">Storage</button>
                <button id="Case">Case</button>
                <button id="Motherboard">Motherboard</button>
                <button id="PowerSupply">Power supply</button>
                <button id="Monitor">Monitor</button>
                <button id="Keyboard">Keyboard</button>
                <button id="Mouse">Mouse</button>
                <button id="Headset">Headset</button>
            </nav>

            <div class="form">
                <form action="../includes/admin.inc.php" method="POST">
                    <label for="naam">Artikel naam:</label>
                    <input type="text" name="naam" id="naam" placeholder="Naam" require>

                    <label for="prijs">Prijs:</label>
                    <input type="number" name="prijs" id="prijs" placeholder="Prijs" require>

                    <label class="noRequire" for="promotiePrijs">Promotie Prijs:</label>
                    <input type="number" name="promotiePrijs" id="promotiePrijs" placeholder="Promotie prijs">

                    <label for="beschrijving">Beschrijving:</label>
                    <textarea name="beschrijving" id="beschrijving" cols="30" rows="10" require></textarea>

                    <label for="vooraad">Vooraad:</label>
                    <input type="number" name="vooraad" id="vooraad" placeholder="Vooraad" require>

                    <label for="brand">Merk:</label>
                    <input type="text" name="brand" id="brand" placeholder="Brand" require>

                    <label class="noRequire" for="specialDeals">Special deal:</label>
                    <input type="checkbox" name="specialDeals" id="specialDeals">

                    <label class="noRequire" for="discover">discover:</label>
                    <input type="checkbox" name="discover" id="discover">

                    <label for="specs">Specificaties:</label>
                    <div id="spec">

                    </div>

                    <button type="submit" name="artikelSubmit">Voeg een artikel toe</button>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>