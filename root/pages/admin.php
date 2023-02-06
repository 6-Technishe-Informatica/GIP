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

        if ($_SESSION["admin"] == 1) {
            require_once '../includes/dbh.inc.php';
        } else {
            header("location: ../index.php");
            exit();
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
                                                                    $text = mysqli_query($conn2, "SELECT * FROM admintext");
                                                                    $textValue = mysqli_fetch_assoc($text);

                                                                    echo $textValue["frontpage"];
                                                                    ?></textarea>
                <button type="submit" name="submit-text">pas aan</button>
            </form>
            <!-- foutcode -->
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
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
                <form action="../includes/admin.inc.php" method="POST" multipart="" enctype="multipart/form-data">
                    <label for="naam">Artikel naam:</label>
                    <input type="text" name="naam" id="naam" placeholder="Naam" >

                    <label for="prijs">Prijs:</label>
                    <input type="number" name="prijs" id="prijs" placeholder="Prijs" >

                    <label class="noRequire" for="promotiePrijs">Promotie Prijs:</label>
                    <input type="number" name="promotiePrijs" id="promotiePrijs" placeholder="Promotie prijs">

                    <label for="beschrijving">Beschrijving:</label>
                    <textarea name="beschrijving" id="beschrijving" cols="30" rows="10" ></textarea>

                    <label for="vooraad">Vooraad:</label>
                    <input type="number" name="vooraad" id="vooraad" placeholder="Vooraad" >

                    <label for="brand">Merk:</label>
                    <input type="text" name="brand" id="brand" placeholder="Brand" >

                    <label class="noRequire" for="specialDeals">Special deal:</label>
                    <input type="checkbox" name="specialDeals" id="specialDeals">

                    <label class="noRequire" for="discover">discover:</label>
                    <input type="checkbox" name="discover" id="discover">

                    <label for="images">3 images van het product:</label>
                    <input type="file" name="img[]" id="images" multiple>

                    <label for="specs">Specificaties:</label>
                    <div id="spec">

                    </div>

                    <button type="submit" name="artikelSubmit">Voeg een artikel toe</button>
                </form>
            </div>
        </div>

        <h2>Add admin user</h2>

        <div class="form">
            <form action="../includes/admin.inc.php" method="POST">
                <label for="naam">Volledige naam</label>
                <input type="text" name="naam" id="naam" placeholder="Volledige naam" require>

                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Username" require>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" require>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" require>

                <button type="submit" name="addAdminUser">Add admin user</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>

    <script src="../main.js"></script>
</body>

</html>