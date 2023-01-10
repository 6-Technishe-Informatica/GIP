<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../style/index.css">

    <title>Tech point</title>
</head>

<body>
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
    <main id="admin">
        <h2>Voeg artikel toe</h2>

        <div class="gridSignup">
            <form action="#">
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

                <input type="submit" name="artikelSubmit" value="Artikel toevoegen">
            </form>
        </div>
    </main>
    <footer>
        <?php include '../siteParts/contact.php'; ?>
    </footer>
</body>

</html>